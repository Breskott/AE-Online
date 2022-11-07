<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.instructors.index', compact('instructors', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Instructor::class);

        return view('app.instructors.create');
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

        return redirect()
            ->route('instructors.edit', $instructor)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Instructor $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Instructor $instructor)
    {
        $this->authorize('view', $instructor);

        return view('app.instructors.show', compact('instructor'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Instructor $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Instructor $instructor)
    {
        $this->authorize('update', $instructor);

        return view('app.instructors.edit', compact('instructor'));
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

        return redirect()
            ->route('instructors.edit', $instructor)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('instructors.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
