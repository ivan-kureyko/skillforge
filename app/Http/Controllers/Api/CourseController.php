<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Controllers\Controller;

/**
 * @group Courses
 *
 * Endpoints for managing user courses.
 */
class CourseController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Course::query()
            ->with(['author', 'skills'])
            ->latest()
            ->get();

        return response()->json([
            'data' => $courses,
        ]);
    }

    public function store(StoreCourseRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $course = Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'author_id' => $request->user()->id,
        ]);

        $course->skills()->sync($validated['skill_ids']);

        $course->load(['author', 'skills']);

        return response()->json([
            'message' => 'Course created successfully',
            'data' => $course,
        ], 201);
    }

    public function show(Course $course): JsonResponse
    {
        $course->load(['author', 'skills']);

        return response()->json([
            'data' => $course,
        ]);
    }

    public function update(UpdateCourseRequest $request, Course $course): JsonResponse
    {
        $validated = $request->validated();

        $course->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
        ]);

        $course->skills()->sync($validated['skill_ids']);

        $course->load(['author', 'skills']);

        return response()->json([
            'message' => 'Course updated successfully',
            'data' => $course,
        ]);
    }

    public function destroy(Course $course): JsonResponse
    {
        $course->delete();

        return response()->json([
            'message' => 'Course deleted successfully',
        ]);
    }
}
