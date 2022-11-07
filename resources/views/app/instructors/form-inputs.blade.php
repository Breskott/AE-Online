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
            maxlength="11"
            placeholder="CPF"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="rg"
            label="RG"
            :value="old('rg', ($editing ? $instructor->rg : ''))"
            maxlength="9"
            placeholder="RG"
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
