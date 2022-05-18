        <!-- Navigation -->
        <nav class="top-menu-container">
            <div class="logo-header">
                <a href="">
                    <img src="/images/baby-elephant.png" alt="Logo personal grupo Echoes"
                        title="Logo personal grupo Echoes" />
                </a>
            </div>

            <ul>
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>


                @auth
                    <li>
                        <a href="/admins" class="{{ request()->is('admins/*') ? 'active' : '' }}">Panel Administracion</a>
                    </li>
                @endauth

                @auth
                    <li>
                        <a href="/users/expediente" class="{{ request()->is('contact') ? 'active' : '' }}">Expediente</a>
                    </li>
                @endauth

                @auth
                    <li>
                        <a href="/users/index" class="{{ request()->is('users/*') ? 'active' : '' }}">Perfil</a>
                    </li>
                @endauth
            </ul>
        </nav>
