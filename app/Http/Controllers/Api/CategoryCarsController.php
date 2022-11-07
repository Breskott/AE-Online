<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarCollection;

class CategoryCarsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $this->authorize('view', $category);

        $search = $request->get('search', '');

        $cars = $category
            ->cars()
            ->search($search)
            ->latest()
            ->paginate();

        return new CarCollection($cars);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $this->authorize('create', Car::class);

        $validated = $request->validate([
            'placa' => ['required', 'max:255', 'string'],
            'km' => ['required', 'numeric'],
            'cor' => ['required', 'max:255', 'string'],
            'marca' => ['required', 'max:255', 'string'],
            'modelo' => ['required', 'max:255', 'string'],
            'ano' => ['required', 'numeric', 'max:4'],
        ]);

        $car = $category->cars()->create($validated);

        return new CarResource($car);
    }
}
