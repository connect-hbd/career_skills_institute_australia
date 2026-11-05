@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-white/90">{{ $user->name }}</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">{{ $user->email }}</p>
            </div>

            @can('user.edit')
                <a href="{{ role_route('role.users.edit', ['user' => $user]) }}"
                    class="inline-flex items-center rounded-lg bg-brand-600 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                    Edit User
                </a>
            @endcan
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-5 dark:border-neutral-800 dark:bg-neutral-900">
            <dl class="grid gap-4 sm:grid-cols-2">
                <div>
                    <dt class="text-sm text-neutral-500">Status</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ ucfirst($user->status) }}</dd>
                </div>
                <div>
                    <dt class="text-sm text-neutral-500">Primary Role</dt>
                    <dd class="text-sm font-medium text-neutral-900 dark:text-white">{{ $user->primaryRole?->name ?? '-' }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-sm text-neutral-500">Assigned Roles</dt>
                    <dd class="mt-2 flex flex-wrap gap-2">
                        @foreach ($user->roles as $role)
                            <span class="rounded border border-neutral-200 px-3 py-1 text-sm text-neutral-700 dark:border-neutral-800 dark:text-neutral-300">{{ $role->name }}</span>
                        @endforeach
                    </dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
