@extends('layouts.app')

@section('title', 'Editar joc #'.$joc->id)

@section('content')
    <h1 class="h3 mb-3">Editar joc #{{ $joc->id }}</h1>

    <form method="POST" action="{{ route('jocs.update', $joc) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom', $joc->nom ?? '') }}">
            @error('nom')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="estudi" class="form-label">Estudi</label>
            @php($estudis = ['Nintendo','Ubisoft','FromSoftware','Electronic Arts','Square Enix','Capcom','Valve','Bethesda','CD Projekt'])
            <select class="form-select" name="estudi" id="estudi" required>
                <option value="" disabled>-- Selecciona un estudi --</option>
                @foreach($estudis as $est)
                    <option value="{{ $est }}" {{ (old('estudi', $joc->estudi ?? '') === $est) ? 'selected' : '' }}>{{ $est }}</option>
                @endforeach
            </select>
            @error('estudi')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="data_publicacio" class="form-label">Data publicació</label>
            <input type="date" class="form-control" name="data_publicacio" id="data_publicacio" value="{{ old('data_publicacio', optional($joc->data_publicacio)->format('Y-m-d')) }}">
            @error('data_publicacio')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="genere" class="form-label">Gènere</label>
            @php($generes = ['Acció','Aventura','RPG','Esports','Simulació','Terror','Puzzle'])
            <select class="form-select" name="genere" id="genere" required>
                <option value="" disabled>-- Selecciona un gènere --</option>
                @foreach($generes as $gen)
                    <option value="{{ $gen }}" {{ (old('genere', $joc->genere ?? '') === $gen) ? 'selected' : '' }}>{{ $gen }}</option>
                @endforeach
            </select>
            @error('genere')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="puntuacio" class="form-label">Puntuació</label>
            <input type="number" step="0.1" min="0" max="10" class="form-control" name="puntuacio" id="puntuacio" value="{{ old('puntuacio', $joc->puntuacio ?? '') }}">
            @error('puntuacio')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="fotografia" class="form-label">Fotografia (URL)</label>
            <input type="url" class="form-control" name="fotografia" id="fotografia" value="{{ old('fotografia', $joc->fotografia ?? '') }}">
            @error('fotografia')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('jocs.show', $joc) }}">Cancel·lar</a>
        </div>
    </form>

    <p class="mt-3"><a href="{{ route('jocs.index') }}" class="btn btn-outline-secondary">Tornar al llistat</a></p>
@endsection
