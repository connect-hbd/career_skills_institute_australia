@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        @if (session('success'))
            <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
        @endif

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-white/90">Roles & Permissions</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Create database roles and attach permission containers.</p>
            </div>

            @can('role.create')
                <a href="{{ role_route('role.roles-permissions.create') }}"
                    class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                    Add Role
                </a>
            @endcan
        </div>

        <div class="overflow-hidden rounded-lg border border-neutral-200 bg-white dark:border-neutral-800 dark:bg-neutral-900">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-800">
                <thead class="bg-neutral-50 dark:bg-neutral-800">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-neutral-500">Role Id</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-neutral-500">Role</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase text-neutral-500">Permissions</th>
                        <th class="px-4 py-3 text-right text-xs font-medium uppercase text-neutral-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-100 dark:divide-neutral-800">
                    @foreach ($roles as $role)
                        <tr>
                            <td class="px-4 py-3 text-sm font-medium text-neutral-900 dark:text-white">{{ $role->id }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-neutral-900 dark:text-white">{{ $role->name }}</td>
                            <td class="px-4 py-3 text-sm text-neutral-500">{{ $role->permissions_count }}</td>
                            <td class="px-4 py-3 text-right text-sm">
                                @can('role.edit')
                                    <a href="{{ role_route('role.roles-permissions.edit', ['roles_permission' => $role]) }}"
                                        class="text-brand-600 hover:text-brand-700">Edit</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $roles->links() }}
    </div>
@endsection
