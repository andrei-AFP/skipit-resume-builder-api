<?php

namespace App\Http\Controllers;

use App\Models\SkillType;
use Illuminate\Http\Request;

class SkillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SkillType::with('skills')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        return SkillType::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(SkillType $skillType)
    {
        return $skillType;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkillType $skillType)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:20',
        ]);

        $skillType->update($validated);

        return $skillType;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillType $skillType)
    {
        $skillType->delete();

        return response()->json(null, 204);
    }
}
