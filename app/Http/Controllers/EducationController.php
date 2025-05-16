<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Education::with(['user'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:20',
            'user_id' => 'required|number',
        ]);

        return Education::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        return $education;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'sometimes|required|string|max:20',
            'user_id' => 'sometimes|required|number',
        ]);

        $education->update($validated);

        return $education;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();

        return response()->json(null, 204);
    }
}
