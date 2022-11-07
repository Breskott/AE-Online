@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('progresses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.progresses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.progresses.inputs.student_id')</h5>
                    <span>{{ optional($progress->student)->nome ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.progresses.inputs.car_id')</h5>
                    <span>{{ optional($progress->car)->placa ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.progresses.inputs.instructor_id')</h5>
                    <span
                        >{{ optional($progress->instructor)->nome ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.progresses.inputs.abastecimento')</h5>
                    <span>{{ $progress->abastecimento ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.progresses.inputs.valor')</h5>
                    <span>{{ $progress->valor ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.progresses.inputs.hora_ini')</h5>
                    <span>{{ $progress->hora_ini ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.progresses.inputs.hora_fim')</h5>
                    <span>{{ $progress->hora_fim ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('progresses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Progress::class)
                <a
                    href="{{ route('progresses.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
