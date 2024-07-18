@php
    $routeActive = Route::currentRouteName();
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'barbers.index' ? 'active' : '' }}" href="{{ route('barbers.index') }}">
        <i class="fas fa-users text-warning"></i>
        <span class="nav-link-text">Data Barber</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'services.index' ? 'active' : '' }}" href="{{ route('services.index') }}">
        <i class="fas fa-building text-dark"></i>
        <span class="nav-link-text">Data Layanan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
        <i class="fas fa-user-tie text-success"></i>
        <span class="nav-link-text">Profile</span>
    </a>
</li>
