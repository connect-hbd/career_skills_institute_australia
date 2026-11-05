@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold text-neutral-800 dark:text-white/90">Create Role</h3>
            <p class="text-sm text-neutral-500 dark:text-neutral-400">Roles are dynamic containers. Access is decided by permissions.</p>
        </div>

        <form method="POST" action="{{ role_route('role.roles-permissions.store') }}" class="space-y-6">
            @csrf
            @include('backend.pages.roles-permissions.partials.form', ['role' => null])
        </form>
    </div>
@endsection
