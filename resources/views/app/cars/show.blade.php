@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('cars.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cars.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.category_id')</h5>
                    <span
                        >{{ optional($car->category)->descricao ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.placa')</h5>
                    <span>{{ $car->placa ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.km')</h5>
                    <span>{{ $car->km ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.cor')</h5>
                    <span>{{ $car->cor ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.marca')</h5>
                    <span>{{ $car->marca ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.modelo')</h5>
                    <span>{{ $car->modelo ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.ano')</h5>
                    <span>{{ $car->ano ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('cars.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Car::class)
                <a href="{{ route('cars.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
