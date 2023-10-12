<!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
      <li class="nav-header"></li>
      <li class="nav-item">
        <a href="{{url('/dashboard')}}" class="nav-link @if(Request::is('dashboard')) active @endif">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-header"></li>
      <li class="nav-item @if(Request::is('master/*')) menu-is-opening menu-open @endif">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-server"></i>
          <p>
            Master Data
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ url('/master/bed') }}" class="nav-link @if(Request::is('master/bed')) active @endif">
              <i class="nav-icon fas fa-bed"></i>
              <p>Bed</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/master/penjamin') }}" class="nav-link @if(Request::is('master/penjamin')) active @endif">
              <i class="nav-icon fas fa-building"></i>
              <p>Penjamin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user')}}" class="nav-link @if(Request::is('master/user')) active @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/master/dokter') }}" class="nav-link @if(Request::is('master/dokter')) active @endif">
              <i class="nav-icon fas fa-user-md"></i>
              <p>Dokter</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/master/ppja') }}" class="nav-link @if(Request::is('master/ppja')) active @endif">
              <i class="nav-icon fas fa-female"></i>
              <p>PPJA</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-header"></li>
      <li class="nav-item">
        <a href="{{url('pendaftaran')}}" class="nav-link @if(Request::is('pendaftaran/*')) active @endif @if(Request::is('pendaftaran')) active @endif">
          <i class="nav-icon fas fa-home"></i>
          <p>PENDAFTARAN</p>
        </a>
      </li>
      <li class="nav-header"></li>
      <li class="nav-item">
        <a href="{{url('azalea')}}" class="nav-link @if(Request::is('azalea')) active @endif">
          <i class="nav-icon fas fa-bed"></i>
          <p>AZALEA</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/akasia')}}" class="nav-link @if(Request::is('akasia')) active @endif">
          <i class="nav-icon fas fa-bed"></i>
          <p>AKASIA</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/asoka')}}" class="nav-link @if(Request::is('asoka')) active @endif">
          <i class="nav-icon fas fa-bed"></i>
          <p>ASOKA</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/anthurium')}}" class="nav-link @if(Request::is('anthurium')) active @endif">
          <i class="nav-icon fas fa-bed"></i>
          <p>ANTHURIUM</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/perinatologi')}}" class="nav-link @if(Request::is('perinatologi/*')) active @endif">
          <i class="nav-icon fas fa-bed"></i>
          <p>PERINATOLOGI</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/intensifdewasa')}}" class="nav-link @if(Request::is('intensifdewasa/*')) active @endif">
          <i class="nav-icon fas fa-bed"></i>
          <p>INTENSIF DEWASA</p>
        </a>
      </li>
      {{-- <li class="nav-header">MULTI LEVEL EXAMPLE</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="fas fa-circle nav-icon"></i>
          <p>Level 1</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-circle"></i>
          <p>
            Level 1
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Level 2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Level 2
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Level 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Level 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Level 3</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li> --}}
    </ul>
  </nav>
<!-- /.sidebar-menu -->