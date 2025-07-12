<?php

namespace App\Http\Controllers;

use App\Domains\Subscriptions\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index() { return Subscription::all(); }
    public function store(Request $request) {
        $subscription = Subscription::create($request->all());
        return response()->json($subscription, 201);
    }
    public function show($id) { return Subscription::findOrFail($id); }
    public function update(Request $request, $id) {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return response()->json($subscription);
    }
    public function destroy($id) {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return response()->json(null, 204);
    }
}
