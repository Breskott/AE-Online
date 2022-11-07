<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProgressResource;
use App\Http\Resources\ProgressCollection;

class CarProgressesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Car $car)
    {
        $this->authorize('view', $car);

        $search = $request->get('search', '');

        $progresses = $car
            ->progresses()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProgressCollection($progresses);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Car $car)
    {
        $this->authorize('create', Progress::class);

        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'instructor_id' => ['required', 'exists:instructors,id'],
            'abastecimento' => ['required', 'max:255', 'string'],
            'valor' => ['required', 'numeric'],
            'hora_ini' => ['required', 'max:255', 'string'],
            'hora_fim' => ['required', 'max:255', 'string'],
        ]);

        $progress = $car->progresses()->create($validated);

        return new ProgressResource($progress);
    }
}
