@php $editing = isset($student) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nome"
            label="Nome"
            :value="old('nome', ($editing ? $student->nome : ''))"
            maxlength="255"
            placeholder="Nome"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="cpf"
            label="CPF"
            :value="old('cpf', ($editing ? $student->cpf : ''))"
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
            :value="old('rg', ($editing ? $student->rg : ''))"
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
            :value="old('telefone', ($editing ? $student->telefone : ''))"
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
            :value="old('celular', ($editing ? $student->celular : ''))"
            maxlength="255"
            placeholder="Celular"
            id="celular"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-9">
        <x-inputs.text
            name="rua"
            label="Rua"
            :value="old('rua', ($editing ? $student->rua : ''))"
            maxlength="255"
            placeholder="Rua"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-3">
        <x-inputs.text
            name="numero"
            label="Numero"
            :value="old('numero', ($editing ? $student->numero : ''))"
            maxlength="255"
            placeholder="Numero"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="bairro"
            label="Bairro"
            :value="old('bairro', ($editing ? $student->bairro : ''))"
            maxlength="255"
            placeholder="Bairro"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="cidade"
            label="Cidade"
            :value="old('cidade', ($editing ? $student->cidade : ''))"
            maxlength="255"
            placeholder="Cidade"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="status_aula" label="Status Aula">
            @php $selected = old('status_aula', ($editing ? $student->status_aula : '')) @endphp
            <option value="ANDAMENTO" {{ $selected == 'ANDAMENTO' ? 'selected' : '' }} >EM ANDAMENTO</option>
            <option value="APROVADO" {{ $selected == 'APROVADO' ? 'selected' : '' }} >APROVADO</option>
            <option value="REPROVADO" {{ $selected == 'REPROVADO' ? 'selected' : '' }} >REPROVADO</option>
            <option value="DESISTIU" {{ $selected == 'DESISTIU' ? 'selected' : '' }} >DESISTIU</option>
        </x-inputs.select>
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
