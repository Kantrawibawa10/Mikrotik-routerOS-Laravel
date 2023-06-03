<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('dashboard')) ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->is('pppoe/secret', 'pppoe/secret/*', 'hotspot/users', 'hotspot/users/*', 'report-traffic', 'report-traffic/*')) ? '' : 'collapsed' }}" data-bs-target="#mikrotik-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-router-fill"></i><span>API Mikrotik</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="mikrotik-nav" class="nav-content collapse {{ (request()->is('pppoe/secret', 'pppoe/secret/*', 'hotspot/users', 'hotspot/users/*', 'report-traffic', 'report-traffic/*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('pppoe.secret') }}" class="{{ (request()->is('pppoe/secret', 'pppoe/secret/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>PPPoE Secret</span>
            </a>
          </li>

          <li>
            <a href="{{ route('hotspot.users') }}" class="{{ (request()->is('hotspot/users', 'hotspot/users/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Hotspot Users</span>
            </a>
          </li>

          <li>
            <a href="{{ route('traffic.index') }}" class="{{ (request()->is('report-traffic', 'report-traffic/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Report Up</span>
            </a>
          </li>
        </ul>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ (request()->is('pppoe/secret', 'pppoe/secret/*', 'hotspot/users', 'hotspot/users/*', 'report-traffic', 'report-traffic/*')) ? '' : 'collapsed' }}" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="settings-nav" class="nav-content collapse {{ (request()->is('pppoe/secret', 'pppoe/secret/*', 'hotspot/users', 'hotspot/users/*', 'report-traffic', 'report-traffic/*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('pppoe.secret') }}" class="{{ (request()->is('pppoe/secret', 'pppoe/secret/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Pengaturan Umum</span>
            </a>
          </li>

          <li>
            <a href="{{ route('hotspot.users') }}" class="{{ (request()->is('hotspot/users', 'hotspot/users/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Logo Invoice</span>
            </a>
          </li>

          <li>
            <a href="{{ route('traffic.index') }}" class="{{ (request()->is('report-traffic', 'report-traffic/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Whatsapp API</span>
            </a>
          </li>

          <li>
            <a href="{{ route('traffic.index') }}" class="{{ (request()->is('report-traffic', 'report-traffic/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Google Maps API</span>
            </a>
          </li>

          <li>
            <a href="{{ route('traffic.index') }}" class="{{ (request()->is('report-traffic', 'report-traffic/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>DOKU API</span>
            </a>
          </li>
        </ul>
    </li>


    <li class="nav-item">
        <a class="nav-link {{ (request()->is('ODP-location', 'ODP-location/*', 'tiang-location', 'tiang-location/*')) ? '' : 'collapsed' }}" data-bs-target="#gudang-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-plugin"></i><span>Infrastruktur</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="gudang-nav" class="nav-content collapse {{ (request()->is('ODP-location', 'ODP-location/*', 'tiang-location', 'tiang-location/*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('ODP.index') }}" class="{{ (request()->is('ODP-location', 'ODP-location/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Kelola OPD|POP</span>
            </a>
          </li>

          <li>
            <a href="{{ route('tiang.index') }}" class="{{ (request()->is('tiang-location', 'tiang-location/*')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Kelola Tiang Internet</span>
            </a>
          </li>
        </ul>
    </li>
</ul>
