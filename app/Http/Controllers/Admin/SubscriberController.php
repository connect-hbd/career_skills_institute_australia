<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{

    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('backend.pages.subscribers.index', compact('subscribers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        Subscriber::firstOrCreate(
            ['email' => $request->email],
            [
                'unsubscribe_token' => Str::random(64)
            ]
        );

        return back()->with('success', 'Subscribed Successfully');
    }

    public function destroy(Request $request, string $role, Subscriber $subscriber): RedirectResponse
    {
        $request->user()->can('subscriber.delete') || abort(403);
        $subscriber->delete();

        return back()->with(
            'success',
            'Subscriber deleted successfully.'
        );
    }
}
