<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;

class CarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Car::class);

        $search = $request->get('search', '');

        $cars = Car::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.cars.index', compact('cars', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Car::class);

        $categories = Category::pluck('descricao', 'id');

        return view('app.cars.create', compact('categories'));
    }

    /**
     * @param \App\Http\Requests\CarStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        $this->authorize('create', Car::class);

        $validated = $request->validated();

        $car = Car::create($validated);

        return redirect()
            ->route('cars.edit', $car)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Car $car)
    {
        $this->authorize('view', $car);

        return view('app.cars.show', compact('car'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Car $car)
    {
        $this->authorize('update', $car);

        $categories = Category::pluck('descricao', 'id');

        return view('app.cars.edit', compact('car', 'categories'));
    }

    /**
     * @param \App\Http\Requests\CarUpdateRequest $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        $this->authorize('update', $car);

        $validated = $request->validated();

        $car->update($validated);

        return redirect()
            ->route('cars.edit', $car)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Car $car)
    {
        $this->authorize('delete', $car);

        $car->delete();

        return redirect()
            ->route('cars.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
