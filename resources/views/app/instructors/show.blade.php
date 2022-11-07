@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('instructors.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.instructors.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.instructors.inputs.nome')</h5>
                    <span>{{ $instructor->nome ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.instructors.inputs.cpf')</h5>
                    <span>{{ $instructor->cpf ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.instructors.inputs.rg')</h5>
                    <span>{{ $instructor->rg ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.instructors.inputs.telefone')</h5>
                    <span>{{ $instructor->telefone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.instructors.inputs.celular')</h5>
                    <span>{{ $instructor->celular ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.instructors.inputs.credencial')</h5>
                    <span>{{ $instructor->credencial ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.instructors.inputs.email')</h5>
                    <span>{{ $instructor->email ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('instructors.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Instructor::class)
                <a
                    href="{{ route('instructors.create') }}"
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
