{{-- 
    Phoenix Theme for Pterodactyl
    Copyright (c) 2024 GusmanikCraft
    All rights reserved.
--}}
@section('navigation')
<div class="navigation-wrapper bg-neutral-800">
    <div class="navigation-menu">
        <div class="menu-item {{ request()->routeIs('index') ? 'active' : '' }}">
            <a href="{{ route('index') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </div>
        
        <div class="menu-item {{ request()->routeIs('server.console') ? 'active' : '' }}">
            <a href="{{ route('server.console') }}">
                <i class="fas fa-terminal"></i>
                <span>Console</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.files') ? 'active' : '' }}">
            <a href="{{ route('server.files') }}">
                <i class="fas fa-folder"></i>
                <span>Files</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.databases') ? 'active' : '' }}">
            <a href="{{ route('server.databases') }}">
                <i class="fas fa-database"></i>
                <span>Databases</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.schedules') ? 'active' : '' }}">
            <a href="{{ route('server.schedules') }}">
                <i class="fas fa-clock"></i>
                <span>Schedules</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.users') ? 'active' : '' }}">
            <a href="{{ route('server.users') }}">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.backups') ? 'active' : '' }}">
            <a href="{{ route('server.backups') }}">
                <i class="fas fa-save"></i>
                <span>Backups</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.network') ? 'active' : '' }}">
            <a href="{{ route('server.network') }}">
                <i class="fas fa-network-wired"></i>
                <span>Network</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.startup') ? 'active' : '' }}">
            <a href="{{ route('server.startup') }}">
                <i class="fas fa-rocket"></i>
                <span>Startup</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.settings') ? 'active' : '' }}">
            <a href="{{ route('server.settings') }}">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.activity') ? 'active' : '' }}">
            <a href="{{ route('server.activity') }}">
                <i class="fas fa-chart-area"></i>
                <span>Activity</span>
            </a>
        </div>
    </div>

    <div class="navigation-submenu">
        <div class="submenu-title">Minecraft Management</div>
        <div class="menu-item {{ request()->routeIs('server.minecraft.core') ? 'active' : '' }}">
            <a href="{{ route('server.minecraft.core') }}">
                <i class="fas fa-cube"></i>
                <span>Core</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.minecraft.plugins') ? 'active' : '' }}">
            <a href="{{ route('server.minecraft.plugins') }}">
                <i class="fas fa-puzzle-piece"></i>
                <span>Plugins</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.minecraft.modpacks') ? 'active' : '' }}">
            <a href="{{ route('server.minecraft.modpacks') }}">
                <i class="fas fa-box"></i>
                <span>Modpacks</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.minecraft.versions') ? 'active' : '' }}">
            <a href="{{ route('server.minecraft.versions') }}">
                <i class="fas fa-code-branch"></i>
                <span>Versions</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.minecraft.players') ? 'active' : '' }}">
            <a href="{{ route('server.minecraft.players') }}">
                <i class="fas fa-users"></i>
                <span>Players</span>
            </a>
        </div>

        <div class="menu-item {{ request()->routeIs('server.minecraft.properties') ? 'active' : '' }}">
            <a href="{{ route('server.minecraft.properties') }}">
                <i class="fas fa-sliders-h"></i>
                <span>Properties</span>
            </a>
        </div>
    </div>

    <div class="copyright-notice">
        <p>Phoenix Theme by GusmanikCraft</p>
        <p>© 2024 All rights reserved</p>
    </div>
</div>
@endsection 