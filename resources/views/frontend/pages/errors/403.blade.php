@extends('frontend.layouts.app')

@section('content')
<main class="flex flex-1 items-center justify-center p-6 sm:p-10">
    <section class="w-full max-w-xl" aria-labelledby="error-title">
      <div class="rounded-xl border border-border bg-card p-8 text-center shadow-md sm:p-12">
        <div class="mx-auto mb-7 flex h-16 w-16 items-center justify-center rounded-full bg-warning-500">
          <iconify-icon icon="lucide:shield-alert" class="text-3xl text-white"></iconify-icon>
        </div>
        <p class="font-mono text-sm font-semibold tracking-[0.2em] text-white">ACCESS RESTRICTED</p>
        <h1 id="error-title" class="mt-3 font-heading text-6xl font-bold tracking-tight text-foreground sm:text-7xl">403</h1>
        <h2 class="mt-6 font-heading text-2xl font-bold text-foreground text-balance">Your account is not active</h2>
        <p class="mx-auto mt-3 max-w-md text-pretty text-base leading-7 text-neutral-500">You don’t currently have access to this area. Please contact support to reactivate your account or check your account status.</p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">
          <button type="button" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-lg bg-brand-500 px-5 py-3 text-sm font-semibold text-white shadow-md">
            <iconify-icon icon="lucide:message-circle" class="text-lg"></iconify-icon>
            Contact support
          </button>
          <button type="button" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-lg border border-border bg-card px-5 py-3 text-sm font-semibold text-brand-500">
            <iconify-icon icon="lucide:log-out" class="text-lg text-neutral-500"></iconify-icon>
            Sign out
          </button>
        </div>
      </div>
      <p class="mt-6 text-center text-sm text-neutral-500">Need help right away? Our support team is here to help restore your access.</p>
    </section>
  </main>
@endsection
