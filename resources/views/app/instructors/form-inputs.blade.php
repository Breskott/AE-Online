@php $editing = isset($instructor) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nome"
            label="Nome"
            :value="old('nome', ($editing ? $instructor->nome : ''))"
            maxlength="255"
            placeholder="Nome"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="cpf"
            label="CPF"
            :value="old('cpf', ($editing ? $instructor->cpf : ''))"
            maxlength="14"
            placeholder="CPF"
            id="cpf"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="rg"
            label="RG"
            :value="old('rg', ($editing ? $instructor->rg : ''))"
            maxlength="12"
            placeholder="RG"
            id="rg"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="telefone"
            label="Telefone"
            :value="old('telefone', ($editing ? $instructor->telefone : ''))"
            maxlength="255"
            placeholder="Telefone"
            id="telefone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="celular"
            label="Celular"
            :value="old('celular', ($editing ? $instructor->celular : ''))"
            maxlength="255"
            placeholder="Celular"
            id="celular"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="credencial"
            label="Credencial"
            :value="old('credencial', ($editing ? $instructor->credencial : ''))"
            maxlength="255"
            placeholder="Credencial"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $instructor->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>
</div>

@section('script_inject')
    <script>
        $(document).ready(function ($) {
            $('#cpf').mask('999.999.999-99');
            $('#rg').mask('99.999.999-A');
            $('#celular').mask('(99) 99999-9999');
            $('#telefone').mask('(99) 9999-9999');
        });
    </script>
@endsection
