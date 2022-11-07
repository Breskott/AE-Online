@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('students.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.students.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.nome')</h5>
                    <span>{{ $student->nome ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.cpf')</h5>
                    <span>{{ $student->cpf ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.rg')</h5>
                    <span>{{ $student->rg ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.telefone')</h5>
                    <span>{{ $student->telefone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.celular')</h5>
                    <span>{{ $student->celular ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.rua')</h5>
                    <span>{{ $student->rua ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.numero')</h5>
                    <span>{{ $student->numero ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.bairro')</h5>
                    <span>{{ $student->bairro ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.cidade')</h5>
                    <span>{{ $student->cidade ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.students.inputs.status_aula')</h5>
                    <span>{{ $student->status_aula ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('students.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Student::class)
                <a href="{{ route('students.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
