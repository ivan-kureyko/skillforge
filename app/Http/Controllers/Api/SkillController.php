<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    public function index(): JsonResponse
    {
        $skills = Skill::query()
            ->latest()
            ->get();

        return response()->json([
            'data' => $skills,
        ]);
    }

    public function store(StoreSkillRequest $request): JsonResponse
    {
        $skill = Skill::create($request->validated());

        return response()->json([
            'message' => 'Skill created successfully',
            'data' => $skill,
        ], 201);
    }

    public function show(Skill $skill): JsonResponse
    {
        return response()->json([
            'data' => $skill,
        ]);
    }

    public function update(UpdateSkillRequest $request, Skill $skill): JsonResponse
    {
        $skill->update($request->validated());

        return response()->json([
            'message' => 'Skill updated successfully',
            'data' => $skill->fresh(),
        ]);
    }

    public function destroy(Skill $skill): JsonResponse
    {
        $skill->delete();

        return response()->json([
            'message' => 'Skill deleted successfully',
        ]);
    }
}
