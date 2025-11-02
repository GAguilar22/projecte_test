@extends('layouts.app')

@section('title', $joc->nom)

@section('content')
    <div class="d-flex justify-content-between align-items-start mb-3">
        <h1 class="h3">{{ $joc->nom }}</h1>
        <div>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('jocs.edit', $joc) }}">Editar</a>
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('jocs.index') }}">Tornar a la llista</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="{{ $joc->fotografia ?: 'https://via.placeholder.com/640x360?text=No+Image' }}" class="img-fluid rounded-start" alt="{{ $joc->nom }}" style="width: 100%; height: auto; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <p class="card-text"><strong>Estudi:</strong> {{ $joc->estudi }}</p>
                    <p class="card-text"><strong>Data publicació:</strong> {{ \Carbon\Carbon::parse($joc->data_publicacio)->format('d/m/Y') }}</p>
                    <p class="card-text"><strong>Gènere:</strong> {{ $joc->genere }}</p>
                    <p class="card-text"><strong>Puntuació:</strong> {{ $joc->puntuacio }}</p>
                    <p class="card-text"><strong>URL de la imatge:</strong><br>
                        <a href="{{ $joc->fotografia }}" target="_blank" rel="noopener" class="text-break">{{ $joc->fotografia }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
