        <!-- Navigation -->
        <nav class="top-menu-container">
          <div class="logo-header">
              <a href="">
                  <img
                  src="/images/baby-elephant.png"
                  alt="Logo personal grupo Echoes"
                  title="Logo personal grupo Echoes"
                  />
              </a>
          </div>

          <ul>
              <li>
                  <a href="/"
                  class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
              </li>
              <li>
                <a href="/courses"
                class="{{ request()->is('courses/*') ? 'active' : '' }}">Courses</a>
              </li>

              <li>
                  <a href="/admins"
                  class="{{ request()->is('admins/*') ? 'active' : '' }}">Panel Administracion</a>
              </li>
              <li>
                  <a href="contact"
                  class="{{ request()->is('contact') ? 'active' : '' }}">Expediente</a>
              </li>

              <li>
                <a href="contact"
                class="{{ request()->is('contact') ? 'active' : '' }}">Perfil</a>
            </li>
          </ul>
      </nav>