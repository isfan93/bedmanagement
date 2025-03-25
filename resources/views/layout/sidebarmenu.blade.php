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

      @if (Auth::user()->master == 'on')
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
      @endif

      @if (Auth::user()->pendaftaran == 'on')
        <li class="nav-header"></li>
        <li class="nav-item">
          <a href="{{url('pendaftaran')}}" class="nav-link @if(Request::is('pendaftaran')) active @endif">
            <i class="nav-icon fas fa-home"></i>
            <p>PENDAFTARAN</p>
          </a>
        </li>
      @endif

      @if (Auth::user()->azalea == 'on')
        <li class="nav-header"></li>
        <li class="nav-item">
          <a href="{{url('azalea')}}" class="nav-link @if(Request::is('azalea')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>AZALEA</p>
          </a>
        </li>
      @endif

      @if (Auth::user()->akasia == 'on')
        <li class="nav-item">
          <a href="{{url('akasia')}}" class="nav-link @if(Request::is('akasia')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>AKASIA</p>
          </a>
        </li>
      @endif

      @if (Auth::user()->asoka == 'on')
        <li class="nav-item">
          <a href="{{url('/asoka')}}" class="nav-link @if(Request::is('asoka')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>ASOKA</p>
          </a>
        </li>
      @endif

      @if (Auth::user()->anthurium == 'on')
        <li class="nav-item">
          <a href="{{ url('anthurium') }}" class="nav-link @if(Request::is('anthurium')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>ANTHURIUM</p>
          </a>
        </li>
      @endif
      
      @if (Auth::user()->allysum == 'on')
        <li class="nav-item">
          <a href="{{ route('allysum.index') }}" class="nav-link @if(Request::is('allysum')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>ALYSSUM</p>
          </a>
        </li>
      @endif
      
      @if (Auth::user()->alamanda == 'on')
        <li class="nav-item">
          <a href="{{ route('alamanda.index') }}" class="nav-link @if(Request::is('alamanda')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>ALAMANDA</p>
          </a>
        </li>
      @endif

      @if (Auth::user()->perinatologi == 'on')
        <li class="nav-item">
          <a href="{{url('perinatologi')}}" class="nav-link @if(Request::is('perinatologi')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>PERINATOLOGI</p>
          </a>
        </li>
      @endif

      @if (Auth::user()->hcu == 'on')
        <li class="nav-item">
          <a href="{{url('intensifdewasa')}}" class="nav-link @if(Request::is('intensifdewasa')) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>INTENSIF DEWASA</p>
          </a>
        </li>
      @endif
      
      @if (Auth::user()->master == 'on')
        <li class="nav-item">
          <a href="{{url('laporan/index')}}" class="nav-link @if(Request::is('laporan/index')) active @endif">
            <ifolder class="nav-icon fas fa-folder"></ifolder>
            <p>LAP. KEPERAWATAN</p>
          </a>
        </li>
      @endif

    </ul>

  </nav>

<!-- /.sidebar-menu -->