<?php

namespace App\Http\Controllers;

use App\Domains\Plans\Models\Plan;
use App\Domains\Plans\Requests\PlanStoreRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PlanController extends Controller
{
    use AuthorizesRequests;
    public function index() { return Plan::all(); }
    public function store(PlanStoreRequest  $request) {
        $this->authorize('create', Plan::class);
        $data = $request->validated();
        $plan = Plan::create($data);
        return response()->json($plan, 201);
    }
    public function show($id) { return Plan::findOrFail($id); }
    public function update(PlanStoreRequest  $request, $id) {
        $plan = Plan::findOrFail($id);
        $plan->update($request->all());
        return response()->json($plan);
    }
    public function destroy($id) {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return response()->json(null, 204);
    }
}
