<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
        aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/">Home </a>
            </li>
            <li @if($current=="produtos") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/produtos">Produtos</a>
            </li>
            <li @if($current=="categorias") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/categorias">Categorias</a>
                </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Categorias-Drop
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Colocar Cat1</a>
                    <a class="dropdown-item" href="#">Colocar Cat2</a>
            </li>
        </ul>
        </div>
</nav>
