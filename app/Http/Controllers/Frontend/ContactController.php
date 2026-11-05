<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
        $request->user()->can('contact.list') || abort(403);

        $contacts = Contacts::query()
            ->select([
                'id',
                'name',
                'email',
                'phone',
                'message',
                'form_type',
            ])
            ->latest()
            ->get();

        return view(
            'backend.pages.contacts.index',
            compact('contacts')
        );
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string'],
            'form_type' => ['required', 'string'],
        ]);

        Contacts::create($data);

        return redirect()
            ->back()
            ->with('success', 'Your inquiry has been submitted successfully.');
    }

   public function destroy(Request $request, string $role,Contacts $contact): RedirectResponse
    {
        $request->user()->can('contact.delete') || abort(403);
        $contact->delete();

        return back()->with(
            'success',
            'Contact deleted successfully.'
        );
    }
}
