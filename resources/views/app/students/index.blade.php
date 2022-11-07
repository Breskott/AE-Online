@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Student::class)
                <a
                    href="{{ route('students.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.students.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.students.inputs.nome')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.cpf')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.rg')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.telefone')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.celular')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.rua')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.numero')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.bairro')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.cidade')
                            </th>
                            <th class="text-left">
                                @lang('crud.students.inputs.status_aula')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            <td>{{ $student->nome ?? '-' }}</td>
                            <td>{{ $student->cpf ?? '-' }}</td>
                            <td>{{ $student->rg ?? '-' }}</td>
                            <td>{{ $student->telefone ?? '-' }}</td>
                            <td>{{ $student->celular ?? '-' }}</td>
                            <td>{{ $student->rua ?? '-' }}</td>
                            <td>{{ $student->numero ?? '-' }}</td>
                            <td>{{ $student->bairro ?? '-' }}</td>
                            <td>{{ $student->cidade ?? '-' }}</td>
                            <td>{{ $student->status_aula ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $student)
                                    <a
                                        href="{{ route('students.edit', $student) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $student)
                                    <a
                                        href="{{ route('students.show', $student) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $student)
                                    <form
                                        action="{{ route('students.destroy', $student) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">{!! $students->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection