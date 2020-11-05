<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="/dashboard" class="collapsed"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        @if(auth()->user()->role == 'admin')
        <li>
        <a href="#subPages" data-toggle="collapse" class="collapsed" aria-expanded="false"><i class="lnr lnr-file-empty"></i> <span>Manajemen Pengguna</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages" class="collapse ">
								<ul class="nav">
                  <li><a href="/pengelola" class=""><i class="lnr lnr-user"></i> <span>Pengelola</span></a></li>
                  <li><a href="/wisatawan" class=""><i class="lnr lnr-user"></i> <span>Wisatawan</span></a></li>
                  <!-- <li><a href="/akun" class=""><i class="lnr lnr-user"></i> <span>Akun</span></a></li Tidak diimplementasikan -->
								</ul>
				</div>
        </li>
        <li><a href="/wisata" class="collapsed"><i class="lnr lnr-book"></i> <span>Data Wisata</span></a></li>
        @endif
        @if(auth()->user()->role == 'pengelola')
        @if(auth()->user()->wisata == null)
        <li><a href="/daftarwisata" class="collapsed"><i class="lnr lnr-pencil"></i> <span>Informasi Wisata</span></a></li>
        @elseif(auth()->user()->wisata != null)
        <li><a href="/datawisata" class="collapsed"><i class="lnr lnr-pencil"></i> <span>Informasi Wisata</span></a></li>
        @endif
        @endif
        @if(auth()->user()->role == 'wisatawan')
        <li><a href="/wisatatersedia" class="collapsed"><i class="lnr lnr-book"></i> <span>Informasi Wisata</span></a></li>
        @endif
      </ul>
    </nav>
  </div>
</div>
