@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('categories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.categories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.categories.inputs.descricao')</h5>
                    <span>{{ $category->descricao ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.categories.inputs.ativo')</h5>
                    @if ($category->ativo == "S")
                        <span>SIM</span>
                    @else
                        <span>NÃO</span>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Category::class)
                <a
                    href="{{ route('categories.create') }}"
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
