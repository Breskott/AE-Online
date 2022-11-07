<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProgressResource;
use App\Http\Resources\ProgressCollection;

class StudentProgressesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Student $student)
    {
        $this->authorize('view', $student);

        $search = $request->get('search', '');

        $progresses = $student
            ->progresses()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProgressCollection($progresses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        $this->authorize('create', Progress::class);

        $validated = $request->validate([
            'car_id' => ['required', 'exists:cars,id'],
            'instructor_id' => ['required', 'exists:instructors,id'],
            'abastecimento' => ['required', 'max:255', 'string'],
            'valor' => ['required', 'numeric'],
            'hora_ini' => ['required', 'max:255', 'string'],
            'hora_fim' => ['required', 'max:255', 'string'],
        ]);

        $progress = $student->progresses()->create($validated);

        return new ProgressResource($progress);
    }
}
