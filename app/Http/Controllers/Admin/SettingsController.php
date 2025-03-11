<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\MenuItem;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        $menuItems = MenuItem::all();
        $enabledMenus = json_decode($settings->enabled_menus ?? '[]');

        return view('admin.control', compact('settings', 'menuItems', 'enabledMenus'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'enable_auto_expiry' => 'required|boolean',
            'expiry_duration' => 'required|integer|min:1|max:365',
            'expiry_notification' => 'required|integer|min:1|max:30',
            'menu_access' => 'array',
            'max_ram' => 'required|integer|min:256',
            'max_disk' => 'required|integer|min:1024',
            'max_cpu' => 'required|integer|min:10|max:100',
        ]);

        $settings = Settings::first() ?? new Settings();
        
        $settings->enable_auto_expiry = $request->enable_auto_expiry;
        $settings->expiry_duration = $request->expiry_duration;
        $settings->expiry_notification = $request->expiry_notification;
        $settings->enabled_menus = json_encode($request->menu_access ?? []);
        $settings->max_ram = $request->max_ram;
        $settings->max_disk = $request->max_disk;
        $settings->max_cpu = $request->max_cpu;
        
        $settings->save();

        // Update server expiry dates if auto-expiry is enabled
        if ($request->enable_auto_expiry) {
            $this->updateServerExpiryDates($request->expiry_duration);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan');
    }

    private function updateServerExpiryDates($duration)
    {
        $servers = \Pterodactyl\Models\Server::whereNull('expiry_date')->get();
        
        foreach ($servers as $server) {
            $server->expiry_date = Carbon::now()->addDays($duration);
            $server->save();
        }
    }

    public function checkExpiry()
    {
        $settings = Settings::first();
        
        if (!$settings || !$settings->enable_auto_expiry) {
            return;
        }

        $notificationDays = $settings->expiry_notification;
        $expiringServers = \Pterodactyl\Models\Server::where('expiry_date', '<=', Carbon::now()->addDays($notificationDays))
            ->where('expiry_date', '>', Carbon::now())
            ->get();

        foreach ($expiringServers as $server) {
            // Send notification to server owner
            event(new \App\Events\ServerExpiryNotification($server));
        }

        // Suspend expired servers
        $expiredServers = \Pterodactyl\Models\Server::where('expiry_date', '<=', Carbon::now())->get();
        foreach ($expiredServers as $server) {
            $server->suspended = true;
            $server->save();
            
            // Send notification about suspension
            event(new \App\Events\ServerSuspended($server));
        }
    }
} 