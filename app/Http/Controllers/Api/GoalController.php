<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Models\Goal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Goals
 *
 * Endpoints for managing user goals.
 */
class GoalController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Goal::class);

        $goals = Goal::query()
            ->with(['course', 'progressEntries'])
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'data' => $goals,
        ]);
    }

    public function store(StoreGoalRequest $request): JsonResponse
    {
        $this->authorize('create', Goal::class);

        $goal = Goal::create([
            'user_id' => $request->user()->id,
            'course_id' => $request->validated()['course_id'],
            'deadline' => $request->validated()['deadline'],
            'status' => Goal::STATUS_NEW,
        ]);

        $goal->load(['course', 'progressEntries']);

        return response()->json([
            'message' => 'Goal created successfully',
            'data' => $goal,
        ], 201);
    }

    public function show(Goal $goal): JsonResponse
    {
        $this->authorize('view', $goal);

        $goal->load(['course', 'progressEntries']);

        return response()->json([
            'data' => $goal,
        ]);
    }

    public function update(UpdateGoalRequest $request, Goal $goal): JsonResponse
    {
        $this->authorize('update', $goal);

        $goal->update($request->validated());
        $goal->load(['course', 'progressEntries']);

        return response()->json([
            'message' => 'Goal updated successfully',
            'data' => $goal,
        ]);
    }

    public function destroy(Goal $goal): JsonResponse
    {
        $this->authorize('delete', $goal);

        $goal->delete();

        return response()->json([
            'message' => 'Goal deleted successfully',
        ]);
    }
}
