<a class="nav-link dropdown-toggle account-link-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Mi Cuenta
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Datos de tu cuenta</a></li>
        <li><a class="dropdown-item" href="#">Seguridad e inicio de sesion</a></li>
        <li><a class="dropdown-item" href="#">Pedidos y compras</a></li>
        <li><a class="dropdown-item" href="#">Direcciones</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item" href="{{ route('cerrarsesion') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>