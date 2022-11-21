@php $editing = isset($car) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="category_id" label="Tipo Veículo" required>
            @php $selected = old('category_id', ($editing ? $car->category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione o Tipo de Veículo</option>
            @foreach($categories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="placa"
            label="Placa"
            :value="old('placa', ($editing ? $car->placa : ''))"
            maxlength="255"
            placeholder="Placa"
            id="placa"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="km"
            label="Km"
            :value="old('km', ($editing ? $car->km : ''))"
            placeholder="Km"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="cor"
            label="Cor"
            :value="old('cor', ($editing ? $car->cor : ''))"
            maxlength="255"
            placeholder="Cor"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="marca"
            label="Marca"
            :value="old('marca', ($editing ? $car->marca : ''))"
            maxlength="255"
            placeholder="Marca"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="modelo"
            label="Modelo"
            :value="old('modelo', ($editing ? $car->modelo : ''))"
            maxlength="255"
            placeholder="Modelo"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="ano"
            label="Ano"
            :value="old('ano', ($editing ? $car->ano : ''))"
            placeholder="Ano"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>

@section('script_inject')
    <script>
        $(document).ready(function ($) {
            $('#placa').mask('AAA-9A99');
        });
    </script>
@endsection
