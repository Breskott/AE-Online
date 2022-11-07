<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Student;
use App\Models\Progress;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Requests\ProgressStoreRequest;
use App\Http\Requests\ProgressUpdateRequest;

class ProgressController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Progress::class);

        $search = $request->get('search', '');

        $progresses = Progress::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.progresses.index', compact('progresses', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Progress::class);

        $students = Student::pluck('nome', 'id');
        $cars = Car::pluck('placa', 'id');
        $instructors = Instructor::pluck('nome', 'id');

        return view(
            'app.progresses.create',
            compact('students', 'cars', 'instructors')
        );
    }

    /**
     * @param \App\Http\Requests\ProgressStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgressStoreRequest $request)
    {
        $this->authorize('create', Progress::class);

        $validated = $request->validated();

        $progress = Progress::create($validated);

        return redirect()
            ->route('progresses.edit', $progress)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Progress $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Progress $progress)
    {
        $this->authorize('view', $progress);

        return view('app.progresses.show', compact('progress'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Progress $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Progress $progress)
    {
        $this->authorize('update', $progress);

        $students = Student::pluck('nome', 'id');
        $cars = Car::pluck('placa', 'id');
        $instructors = Instructor::pluck('nome', 'id');

        return view(
            'app.progresses.edit',
            compact('progress', 'students', 'cars', 'instructors')
        );
    }

    /**
     * @param \App\Http\Requests\ProgressUpdateRequest $request
     * @param \App\Models\Progress $progress
     * @return \Illuminate\Http\Response
     */
    public function update(ProgressUpdateRequest $request, Progress $progress)
    {
        $this->authorize('update', $progress);

        $validated = $request->validated();

        $progress->update($validated);

        return redirect()
            ->route('progresses.edit', $progress)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Progress $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Progress $progress)
    {
        $this->authorize('delete', $progress);

        $progress->delete();

        return redirect()
            ->route('progresses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
