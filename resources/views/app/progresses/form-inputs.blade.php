@php $editing = isset($progress) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="student_id" label="Aluno" required>
            @php $selected = old('student_id', ($editing ? $progress->student_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione o Aluno da Aula</option>
            @foreach($students as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="car_id" label="Carro a Usar" required>
            @php $selected = old('car_id', ($editing ? $progress->car_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione o carro a usar</option>
            @foreach($cars as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="instructor_id" label="Instrutor" required>
            @php $selected = old('instructor_id', ($editing ? $progress->instructor_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Selecione o Instrutor da Aula</option>
            @foreach($instructors as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="abastecimento" label="Abastecimento">
            @php $selected = old('abastecimento', ($editing ? $progress->abastecimento : '')) @endphp
            <option value="S" {{ $selected == 'S' ? 'selected' : '' }} >Sim</option>
            <option value="N" {{ $selected == 'N' ? 'selected' : '' }} >Nao</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="valor"
            label="Valor do Abastecimento"
            :value="old('valor', ($editing ? $progress->valor : ''))"
            max="255"
            step="1"
            placeholder="Valor do Abastecimento"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="hora_ini"
            label="Hora Inicial Aula"
            :value="old('hora_ini', ($editing ? $progress->hora_ini : ''))"
            maxlength="255"
            placeholder="Hora Inicial Aula"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="hora_fim"
            label="Hora Final Aula"
            :value="old('hora_fim', ($editing ? $progress->hora_fim : ''))"
            maxlength="255"
            placeholder="Hora Final Aula"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
