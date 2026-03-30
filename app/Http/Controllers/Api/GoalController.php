<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use App\Models\Goal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $goals = Goal::with(['course', 'progressEntries'])
            ->where('user_id', $request->user()->id)
            ->get();

        return response()->json($goals);
    }

    public function store(StoreGoalRequest $request): JsonResponse
    {
        $goal = Goal::create([
            'user_id' => $request->user()->id,
            'course_id' => $request->course_id,
            'deadline' => $request->deadline,
            'status' => Goal::STATUS_NEW,
        ]);

        return response()->json($goal, 201);
    }

    public function show(Goal $goal): JsonResponse
    {
        $this->authorizeGoal($goal);

        return response()->json(
            $goal->load(['course', 'progressEntries'])
        );
    }

    public function update(UpdateGoalRequest $request, Goal $goal): JsonResponse
    {
        $this->authorizeGoal($goal);

        $goal->update($request->validated());

        return response()->json($goal);
    }

    public function destroy(Goal $goal): JsonResponse
    {
        $this->authorizeGoal($goal);

        $goal->delete();

        return response()->json([
            'message' => 'Goal deleted',
        ]);
    }

    private function authorizeGoal(Goal $goal): void
    {
        if ($goal->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }
}
