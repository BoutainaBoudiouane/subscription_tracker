<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    public function index(): View
    {
        $subscriptions = auth()->user()->subscriptions()->latest()->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create(): View
    {
        return view('subscriptions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:monthly,yearly',
            'payment_date' => 'required|date',
            'note' => 'nullable|string',
            'payment' => 'required|numeric|min:0',
            'category' => 'required|string|max:255'
        ]);

        $validated['user_id'] = auth()->id();
        Subscription::create($validated);

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription created successfully.');
    }

    public function edit(Subscription $subscription): View
    {
        return view('subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, Subscription $subscription): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:monthly,yearly',
            'payment_date' => 'required|date',
            'note' => 'nullable|string',
            'payment' => 'required|numeric|min:0',
            'category' => 'required|string|max:255'
        ]);

        $subscription->update($validated);

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription updated successfully.');
    }

    public function destroy(Subscription $subscription): RedirectResponse
    {
        $subscription->delete();

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription deleted successfully.');
    }
}