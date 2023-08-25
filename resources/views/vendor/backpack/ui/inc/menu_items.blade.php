{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item">
<a class="nav-link" href="{{ route('dashboard') }}">
<i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ backpack_url('user') }}">
<i class="la la-user nav-icon"></i> Users
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ backpack_url('role') }}">
<i class="la la-group"></i> Roles
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ backpack_url('permission') }}">
<i class="la la-key"></i> Permissions
</a>
</li>

{{-- 
<x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="Authentication" />
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>
--}}