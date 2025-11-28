@extends('layouts.app')

@section('title', 'Llista de jocs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Jocs</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-3">
        @forelse($jocs as $joc)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100">
                    <img src="{{ $joc->fotografia ?: 'https://via.placeholder.com/640x360?text=No+Image' }}" class="card-img-top" alt="{{ $joc->nom }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Nom: {{ $joc->nom }}</h5>

                        <div class="mt-auto d-flex gap-2">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('jocs.show', $joc) }}">Veure</a>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('jocs.edit', $joc) }}">Editar</a>
                            <form action="{{ route('jocs.destroy', $joc) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Segur que vols esborrar aquest joc?')">Esborrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No hi ha jocs.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $jocs->links('pagination::bootstrap-5') }}
    </div>
@endsection
