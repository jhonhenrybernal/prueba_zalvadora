<?php

namespace App\Http\Controllers;

use App\Domains\Companies\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        return Company::all();
    }

    public function store(Request $request) {
        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    public function show($id) {
        return Company::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return response()->json($company);
    }

    public function destroy($id) {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json(null, 204);
    }
}
