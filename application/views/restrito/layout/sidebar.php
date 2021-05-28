<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown <?php echo $this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'index' ? 'active' : '' ?>">
              <a href="<?php echo base_url('restrito/home');  ?>" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown <?php echo $this->router->fetch_class() == 'usuario' && $this->router->fetch_method() == 'index' ? 'active' : '' ?>">
              <a href="<?php echo base_url('restrito/usuario');  ?>" class="nav-link "><i data-feather="users"></i><span>Usuario</span></a>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="package"></i><span>Categorias</span></a>

              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('restrito/categorias');  ?>">Categorias post</a></li>
              </ul>

            </li>
            <li class="dropdown">
              <a href="<?php echo base_url('restrito/post');  ?>" class="nav-link "><i data-feather="archive"></i><span>Post</span></a>
            </li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="settings"></i><span>Configurações</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('restrito/sistema');  ?>">Sistema</a></li>

              </ul>
            </li>

           
          </ul>
        </aside>
      </div>
