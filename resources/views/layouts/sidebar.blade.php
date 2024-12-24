<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    @if (auth()->user()->role == 'Karyawan' || auth()->user()->role == 'Admin')
      <!-- Dashboard Nav -->
      <li class="nav-item">
        <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    @endif

    @if (auth()->check() && auth()->user()->role == 'Admin')
    <!-- Nav -->
    <li class="nav-item">
        <a href="{{ url('/data-staff') }}" class="nav-link {{ Request::is('data-staff*') ? '' : 'collapsed' }}">
            <i class="bi bi-people-fill"></i>
            <span>Data Karyawan</span>
        </a>
    </li><!-- End Nav -->
    @endif
    
    
        <!-- Nav -->
        <li class="nav-item">
          <a href="{{ url('/data-anggota') }}" class="nav-link {{ Request::is('data-anggota*') ? '' : 'collapsed' }}">
            <i class="bi bi-person-heart"></i>
            <span> Member </span>
          </a>
        </li><!-- End Nav -->
    
        @if (auth()->check() && auth()->user()->role == 'Admin')
        <!-- Nav -->
        <li class="nav-item">
          <a href="{{ url('/data-kategori') }}" class="nav-link {{ Request::is('data-kategori*') ? '' : 'collapsed' }}">
            <i class="bi bi-grid"></i>
            <span> Kategori </span>
          </a>
        </li><!-- End Nav -->
        

        <!-- Nav -->
        <li class="nav-item">
          <a href="{{ url('/data-penulis') }}" class="nav-link {{ Request::is('data-penulis*')  ? '' : 'collapsed' }}">
            <i class="bi bi-person-square"></i>
            <span> Penulis </span>
          </a>
        </li><!-- End Nav -->
    
        <!-- Nav -->
        <li class="nav-item">
          <a href="{{ url('/data-buku') }}" class="nav-link {{ Request::is('data-buku*') ? '' : 'collapsed' }}">
            <i class="bi bi-book"></i>
            <span> Buku </span>
          </a>
        </li><!-- End Nav -->
        @endif

  
        <!-- Nav -->
        <li class="nav-item">
          <a href="{{ url('/data-peminjam') }}" class="nav-link {{ Request::is('data-peminjam*') ? '' : 'collapsed' }}">
            <i class="bi bi-person"></i>
            <span> Peminjam </span>
          </a>
        </li><!-- End Nav -->
   


    <!-- Logout Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="/logout">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Logout Nav -->

  </ul>

</aside><!-- End Sidebar -->
