<?php

namespace App\Http\Controllers\Api;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InstructorResource;
use App\Http\Resources\InstructorCollection;
use App\Http\Requests\InstructorStoreRequest;
use App\Http\Requests\InstructorUpdateRequest;

class InstructorController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Instructor::class);

        $search = $request->get('search', '');

        $instructors = Instructor::search($search)
            ->latest()
            ->paginate();

        return new InstructorCollection($instructors);
    }

    /**
     * @param \App\Http\Requests\InstructorStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructorStoreRequest $request)
    {
        $this->authorize('create', Instructor::class);

        $validated = $request->validated();

        $instructor = Instructor::create($validated);

        return new InstructorResource($instructor);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Instructor $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Instructor $instructor)
    {
        $this->authorize('view', $instructor);

        return new InstructorResource($instructor);
    }

    /**
     * @param \App\Http\Requests\InstructorUpdateRequest $request
     * @param \App\Models\Instructor $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(
        InstructorUpdateRequest $request,
        Instructor $instructor
    ) {
        $this->authorize('update', $instructor);

        $validated = $request->validated();

        $instructor->update($validated);

        return new InstructorResource($instructor);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Instructor $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Instructor $instructor)
    {
        $this->authorize('delete', $instructor);

        $instructor->delete();

        return response()->noContent();
    }
}
