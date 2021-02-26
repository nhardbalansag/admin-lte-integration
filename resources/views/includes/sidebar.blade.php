  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ env('APP_URL') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block text-capitalize">{{ auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview {{ $activePage === 'createCategory' ? 'menu-open' : ($activePage === 'categoryList' ? 'menu-open' : '') }}">
            <a href="#" class="nav-link {{ $activePage === 'createCategory' ? 'active' : ($activePage === 'categoryList' ? 'active' : '') }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/add-category" class="nav-link {{ $activePage === 'createCategory' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/category/view-all-publish" class="nav-link {{ $activePage === 'categoryList' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview {{ $activePage === 'createProduct' ? 'menu-open' : ($activePage === 'productList' ? 'menu-open' : ($activePage === 'dataTable' ? 'menu-open' : '')) }}">
              <a href="#" class="nav-link {{ $activePage === 'createProduct' ? 'active' : ($activePage === 'productList' ? 'active' : '') }}">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Products
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/product/index" class="nav-link {{ $activePage === 'createProduct' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/product/view-all-product" class="nav-link {{ $activePage === 'productList' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product List</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/tables/data/tables" class="nav-link {{ $activePage === 'dataTable' ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data tables</p>
                    </a>
                  </li>
              </ul>
            </li>
        </ul>

        {{-- charts --}}
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview {{ $activePage === 'chart' ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ $activePage === 'chart' ? 'active' : '' }}">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                    Charts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/charts/all-charts" class="nav-link {{ $activePage === 'chart' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Charts</p>
                  </a>
                </li>
              </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



