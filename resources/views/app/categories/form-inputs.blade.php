@php $editing = isset($category) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-8">
        <x-inputs.text
            name="descricao"
            label="Tipo Veículo"
            :value="old('descricao', ($editing ? $category->descricao : ''))"
            maxlength="255"
            placeholder="Tipo Veículo"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.select name="ativo" label="Ativo">
            @php $selected = old('ativo', ($editing ? $category->ativo : '')) @endphp
            <option value="S" {{ $selected == 'S' ? 'selected' : '' }} >Sim</option>
            <option value="N" {{ $selected == 'N' ? 'selected' : '' }} >Nao</option>
        </x-inputs.select>
    </x-inputs.group>
</div>
