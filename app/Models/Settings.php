<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'enable_auto_expiry',
        'expiry_duration',
        'expiry_notification',
        'enabled_menus',
        'max_ram',
        'max_disk',
        'max_cpu',
    ];

    protected $casts = [
        'enable_auto_expiry' => 'boolean',
        'expiry_duration' => 'integer',
        'expiry_notification' => 'integer',
        'max_ram' => 'integer',
        'max_disk' => 'integer',
        'max_cpu' => 'integer',
    ];
} 