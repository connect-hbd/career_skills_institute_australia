@extends('backend.layouts.app')

@section('content')
    <div class="">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-white/90">Subcribers Management</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Manage students.
                </p>
            </div>           
        </div>
       @include('backend.pages.subscribers.table', ['items' => $subscribers])
    </div>
@endsection
