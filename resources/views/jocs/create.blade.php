@extends('layouts.app')

@section('title', 'Crear joc')

@section('content')
    <h1 class="h3 mb-3">Crear nou joc</h1>

    <form method="POST" action="{{ route('jocs.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}">
            @error('nom')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="estudi" class="form-label">Estudi</label>
            @php($estudis = ['Ubisoft','FromSoftware','Electronic Arts','Square Enix','Capcom','Valve','Bethesda','CD Projekt'])
            <select class="form-select" name="estudi" id="estudi" required>
                <option value="" disabled {{ old('estudi') ? '' : 'selected' }}>-- Selecciona un estudi --</option>
                @foreach($estudis as $est)
                    <option value="{{ $est }}" {{ old('estudi') === $est ? 'selected' : '' }}>{{ $est }}</option>
                @endforeach
            </select>
            @error('estudi')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="data_publicacio" class="form-label">Data publicació</label>
            <input type="date" class="form-control" name="data_publicacio" id="data_publicacio" value="{{ old('data_publicacio') }}">
            @error('data_publicacio')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="genere" class="form-label">Gènere</label>
            @php($generes = ['Acció','Aventura','RPG','Esports','Simulació','Terror','Puzzle'])
            <select class="form-select" name="genere" id="genere" required>
                <option value="" disabled {{ old('genere') ? '' : 'selected' }}>-- Selecciona un gènere --</option>
                @foreach($generes as $gen)
                    <option value="{{ $gen }}" {{ old('genere') === $gen ? 'selected' : '' }}>{{ $gen }}</option>
                @endforeach
            </select>
            @error('genere')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="puntuacio" class="form-label">Puntuació</label>
            <input type="number" step="0.1" min="0" max="10" class="form-control" name="puntuacio" id="puntuacio" value="{{ old('puntuacio') }}">
            @error('puntuacio')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="fotografia" class="form-label">Fotografia (URL)</label>
            <input type="url" class="form-control" name="fotografia" id="fotografia" value="{{ old('fotografia') }}">
            @error('fotografia')<div class="text-danger mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Crear</button>
            <a class="btn btn-secondary" href="{{ route('jocs.index') }}">Cancel·lar</a>
        </div>
    </form>
@endsection
