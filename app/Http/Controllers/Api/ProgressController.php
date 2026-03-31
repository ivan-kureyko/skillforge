<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use App\Models\Progress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Progress
 *
 * Endpoints for tracking goal progress.
 */
class ProgressController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Progress::class);

        $progressEntries = Progress::query()
            ->with(['goal.course'])
            ->whereHas('goal', function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })
            ->latest()
            ->get();

        return response()->json([
            'data' => $progressEntries,
        ]);
    }

    public function store(StoreProgressRequest $request): JsonResponse
    {
        $this->authorize('create', Progress::class);

        $data = $request->validated();

        $progress = Progress::create([
            'goal_id' => $data['goal_id'],
            'percent' => $data['percent'],
            'note' => $data['note'] ?? null,
        ]);

        $progress->load(['goal.course']);

        return response()->json([
            'message' => 'Progress created successfully',
            'data' => $progress,
        ], 201);
    }

    public function show(Progress $progress): JsonResponse
    {
        $this->authorize('view', $progress);

        $progress->load(['goal.course']);

        return response()->json([
            'data' => $progress,
        ]);
    }

    public function update(UpdateProgressRequest $request, Progress $progress): JsonResponse
    {
        $this->authorize('update', $progress);

        $progress->update($request->validated());
        $progress->load(['goal.course']);

        return response()->json([
            'message' => 'Progress updated successfully',
            'data' => $progress,
        ]);
    }

    public function destroy(Progress $progress): JsonResponse
    {
        $this->authorize('delete', $progress);

        $progress->delete();

        return response()->json([
            'message' => 'Progress deleted successfully',
        ]);
    }
}
