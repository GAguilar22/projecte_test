<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('jocs.index') }}">
      <i class="fas fa-gamepad me-2"></i>Projecte Jocs
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-success me-2" href="{{ route('jocs.create') }}">
            <i class="fas fa-plus me-1"></i> Crear Joc
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>