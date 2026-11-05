@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Dashboard</h1>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Welcome back, here's what's happening today.
                </p>
            </div>
            <span
                class="rounded-lg bg-neutral-100 px-3 py-1 text-sm text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300">
                {{ now()->format('l, F j, Y') }}
            </span>
        </div>

        <!-- Summary Cards -->
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Students -->
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Total Students</p>
                        <p class="mt-1 text-2xl font-bold text-neutral-900 dark:text-white">00</p>
                    </div>
                    <div class="rounded-lg bg-blue-50 p-3 dark:bg-blue-900/20">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-center text-xs text-green-600">
                    <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    <span class="font-medium">+12%</span>
                    <span class="ml-1 text-neutral-500 dark:text-neutral-400">from last month</span>
                </div>
            </div>

            <!-- Total Courses -->
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Total Courses</p>
                        <p class="mt-1 text-2xl font-bold text-neutral-900 dark:text-white">00</p>
                    </div>
                    <div class="rounded-lg bg-purple-50 p-3 dark:bg-purple-900/20">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 text-xs text-neutral-500 dark:text-neutral-400">
                    <span class="font-medium text-neutral-900 dark:text-white">0</span> active this semester
                </div>
            </div>

            <!-- New Enrollments -->
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">New Enrollments</p>
                        <p class="mt-1 text-2xl font-bold text-neutral-900 dark:text-white">0</p>
                    </div>
                    <div class="rounded-lg bg-green-50 p-3 dark:bg-green-900/20">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 text-xs text-neutral-500 dark:text-neutral-400">
                    This week
                </div>
            </div>

            <!-- Pending Assignments -->
            <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Pending Grades</p>
                        <p class="mt-1 text-2xl font-bold text-neutral-900 dark:text-white">0</p>
                    </div>
                    <div class="rounded-lg bg-amber-50 p-3 dark:bg-amber-900/20">
                        <svg class="h-6 w-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-3 text-xs text-neutral-500 dark:text-neutral-400">
                    Needs attention
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid gap-6 lg:grid-cols-3">
            <!-- Recent Enrolled Students -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                    <div
                        class="flex items-center justify-between border-b border-neutral-100 px-6 py-4 dark:border-neutral-700">
                        <div class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">Recent Enrollments</h2>
                        </div>
                        <a href="#"
                            class="text-sm font-medium text-brand-600 hover:text-brand-700 dark:text-brand-400">
                            View All
                        </a>
                    </div>
                    <div class="w-full overflow-x-auto">
                        <table class="min-w-1 w-full text-left text-sm">
                            <thead
                                class="bg-neutral-50 text-xs uppercase text-neutral-500 dark:bg-neutral-700/50 dark:text-neutral-400">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium sm:px-6">
                                        Student
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium sm:px-6">
                                        Email
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium sm:px-6">
                                        Course
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium sm:px-6">
                                        Enrolled
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-neutral-100 dark:divide-neutral-700">
                                @forelse ($students ?? [] as $student)
                                    <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-700/50">

                                        {{-- Student --}}
                                        <td class="px-4 py-3 sm:px-6">
                                            <div class="flex min-w-[180px] items-center gap-3">
                                                <div
                                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-100 text-xs font-bold text-brand-700 dark:bg-brand-900/30 dark:text-brand-300">
                                                    {{ strtoupper(substr($student->user->name ?? 'S', 0, 1)) }}
                                                </div>

                                                <span
                                                    class="whitespace-nowrap font-medium text-neutral-900 dark:text-white">
                                                    {{ $student->user->name ?? 'Unknown' }}
                                                </span>
                                            </div>
                                        </td>

                                        {{-- Email --}}
                                        <td class="px-4 py-3 sm:px-6">
                                            <span class="whitespace-nowrap text-neutral-500 dark:text-neutral-400">
                                                {{ $student->user->email ?? '-' }}
                                            </span>
                                        </td>

                                        {{-- Course --}}
                                        <td class="px-4 py-3 sm:px-6">
                                            <span
                                                class="block max-w-[220px] truncate rounded-md bg-neutral-100 px-2 py-1 text-xs font-medium text-neutral-700 dark:bg-neutral-700 dark:text-neutral-300">
                                                {{ $student->courses->first()->name ?? 'N/A' }}
                                            </span>
                                        </td>

                                        {{-- Enrolled --}}
                                        <td
                                            class="whitespace-nowrap px-4 py-3 text-neutral-500 sm:px-6 dark:text-neutral-400">
                                            {{ $student->created_at?->diffForHumans() ?? '-' }}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-8 text-center text-neutral-500 dark:text-neutral-400">
                                            <svg class="mx-auto mb-2 h-8 w-8 text-neutral-300 dark:text-neutral-600"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>

                                            No recent enrollments
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Stats / Activity -->
            <div class="space-y-6">
                <!-- Course Distribution -->
                <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 text-sm font-semibold text-neutral-900 dark:text-white">Top Courses</h3>
                    <div class="space-y-3">
                        @forelse ($topCourses ?? [] as $course)
                            <div>
                                <div class="mb-1 flex items-center justify-between text-sm">
                                    <span class="text-neutral-700 dark:text-neutral-300">{{ $course->name }}</span>
                                    <span
                                        class="font-medium text-neutral-900 dark:text-white">{{ $course->students_count ?? 0 }}</span>
                                </div>
                                <div class="h-2 w-full rounded-full bg-neutral-100 dark:bg-neutral-700">
                                    <div class="h-2 rounded-full bg-brand-500"
                                        style="width: {{ min(($course->students_count / max($totalStudents, 1)) * 100, 100) }}%">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">No course data available</p>
                        @endforelse
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="rounded-xl border border-neutral-200 bg-white p-5 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-3 text-sm font-semibold text-neutral-900 dark:text-white">Quick Actions</h3>
                    <div class="space-y-2">
                        <a href="#"
                            class="flex items-center gap-3 rounded-lg border border-neutral-200 p-3 transition-colors hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700/50">
                            <div class="rounded-lg bg-blue-50 p-2 dark:bg-blue-900/20">
                                <svg class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Add New Student</span>
                        </a>
                        <a href="#"
                            class="flex items-center gap-3 rounded-lg border border-neutral-200 p-3 transition-colors hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700/50">
                            <div class="rounded-lg bg-purple-50 p-2 dark:bg-purple-900/20">
                                <svg class="h-4 w-4 text-purple-600 dark:text-purple-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-neutral-700 dark:text-neutral-300">Add New User</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
