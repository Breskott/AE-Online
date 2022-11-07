@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} - AE Online</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bem vindo(a) ao sistema AE Online, sistema desenvolvido para sua Auto Escola!') }}<br>
                    {{ __('Projeto PI 2022 - Univesp') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
