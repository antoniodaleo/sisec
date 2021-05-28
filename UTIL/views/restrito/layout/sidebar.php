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
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Widgets</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
              </ul>
            </li>

            <li class="dropdown <?php echo $this->router->fetch_class() == 'usuario' && $this->router->fetch_method() == 'index' ? 'active' : '' ?>">
              <a href="<?php echo base_url('restrito/usuario');  ?>" class="nav-link "><i data-feather="users"></i><span>Usuario</span></a>
            </li>
            <li class="dropdown <?php echo $this->router->fetch_class() == 'marcas' && $this->router->fetch_method() == 'index' ? 'active' : '' ?>">
              <a href="<?php echo base_url('restrito/marcas');  ?>" class="nav-link "><i data-feather="layers"></i><span>Marcas</span></a>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="package"></i><span>Categorias</span></a>

              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('restrito/master');  ?>">Categorias pai</a></li>
              </ul>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('restrito/categorias');  ?>">Categorias filhas</a></li>
              </ul>

            </li>
            <li class="dropdown <?php echo $this->router->fetch_class() == 'produtos' && $this->router->fetch_method() == 'index' ? 'active' : '' ?>">
              <a href="<?php echo base_url('restrito/produtos');  ?>" class="nav-link "><i data-feather="archive"></i><span>Produtos</span></a>
            </li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="settings"></i><span>Configurações</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url('restrito/sistema');  ?>">Sistema</a></li>
                <li><a class="nav-link" href="<?php echo base_url('restrito/sistema/correios');  ?>">Correio</a></li>

              </ul>
            </li>

           
          </ul>
        </aside>
      </div>
