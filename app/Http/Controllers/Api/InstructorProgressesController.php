<?php

namespace App\Http\Controllers\Api;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProgressResource;
use App\Http\Resources\ProgressCollection;

class InstructorProgressesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Instructor $instructor
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Instructor $instructor)
    {
        $this->authorize('view', $instructor);

        $search = $request->get('search', '');

        $progresses = $instructor
            ->progresses()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProgressCollection($progresses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Instructor $instructor
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Instructor $instructor)
    {
        $this->authorize('create', Progress::class);

        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'car_id' => ['required', 'exists:cars,id'],
            'abastecimento' => ['required', 'max:255', 'string'],
            'valor' => ['required', 'numeric'],
            'hora_ini' => ['required', 'max:255', 'string'],
            'hora_fim' => ['required', 'max:255', 'string'],
        ]);

        $progress = $instructor->progresses()->create($validated);

        return new ProgressResource($progress);
    }
}
