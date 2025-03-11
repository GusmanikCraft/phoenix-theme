{{-- 
    Phoenix Theme for Pterodactyl
    Copyright (c) 2024 GusmanikCraft
    All rights reserved.
--}}
@extends('layouts.admin')

@section('title')
    Phoenix Admin Control Panel
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="card">
        <div class="card-header">
            <h3>Server Settings</h3>
            <div class="copyright-text">Phoenix Theme by GusmanikCraft</div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                
                <!-- Auto Expiry Settings -->
                <div class="form-group">
                    <label for="enable_auto_expiry">Enable Auto Expiry</label>
                    <select name="enable_auto_expiry" id="enable_auto_expiry" class="form-control">
                        <option value="1" {{ $settings->enable_auto_expiry ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$settings->enable_auto_expiry ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="expiry_duration">Expiry Duration (days)</label>
                    <input type="number" name="expiry_duration" id="expiry_duration" 
                           class="form-control" value="{{ $settings->expiry_duration }}"
                           min="1" max="365">
                </div>

                <div class="form-group">
                    <label for="expiry_notification">Expiry Notification (days before)</label>
                    <input type="number" name="expiry_notification" id="expiry_notification" 
                           class="form-control" value="{{ $settings->expiry_notification }}"
                           min="1" max="30">
                </div>

                <!-- Menu Access Control -->
                <div class="mt-6">
                    <h4 class="text-lg font-semibold mb-4">Menu Access Control</h4>
                    
                    @foreach($menuItems as $menu)
                    <div class="form-group">
                        <label class="flex items-center">
                            <input type="checkbox" name="menu_access[]" 
                                   value="{{ $menu->id }}"
                                   {{ in_array($menu->id, $enabledMenus) ? 'checked' : '' }}
                                   class="form-checkbox">
                            <span class="ml-2">{{ $menu->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>

                <!-- Server Resource Limits -->
                <div class="mt-6">
                    <h4 class="text-lg font-semibold mb-4">Server Resource Limits</h4>
                    
                    <div class="form-group">
                        <label for="max_ram">Maximum RAM (MB)</label>
                        <input type="number" name="max_ram" id="max_ram" 
                               class="form-control" value="{{ $settings->max_ram }}"
                               min="256">
                    </div>

                    <div class="form-group">
                        <label for="max_disk">Maximum Disk Space (MB)</label>
                        <input type="number" name="max_disk" id="max_disk" 
                               class="form-control" value="{{ $settings->max_disk }}"
                               min="1024">
                    </div>

                    <div class="form-group">
                        <label for="max_cpu">CPU Limit (%)</label>
                        <input type="number" name="max_cpu" id="max_cpu" 
                               class="form-control" value="{{ $settings->max_cpu }}"
                               min="10" max="100">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn btn-primary">
                        Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="copyright-footer mt-8 text-center text-sm text-gray-600">
        <p>Phoenix Theme for Pterodactyl Panel</p>
        <p>© 2024 GusmanikCraft. All rights reserved.</p>
        <p>Unauthorized reproduction or distribution is strictly prohibited.</p>
    </div>
</div>
@endsection 