<ul class="navbar-nav bg-green sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">KERJA PRAKTEK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard Operator -->
    @if (Auth::user()->level==0)
    <li class="nav-item {{set_active('operator')}} ">
        <a class="nav-link " href="{{route('operator')}}">
            <i class="fas fa-fw fa-home"></i>
            <span><b>Beranda</b></span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{set_active(['dospem.index','dospem.create','dospem.edit'])}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-graduate"></i>
            <span><b> Dosen</b></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="{{route('dospem.index')}}"><b>Data Dosen</b></a>
                <a class="collapse-item" href="{{route('dospem.create')}}"><b>Tambah Dosen</b></a>
            </div>
        </div>
    </li>
    @endif

    <!-- Nav Item - Dashboard mahasiswa -->
    @if (Auth::user()->level==2)
    <li class="nav-item {{set_active('mahasiswa')}} ">
        <a class="nav-link " href="index.html">
            <i class="fas fa-fw fa-home"></i>
            <span><b>Beranda</b></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-paste"></i>
            <span><b> Proposal</b></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="buttons.html"><b>Data Proposal</b></a>
                <a class="collapse-item" href="cards.html"><b>Pengajuan Proposal</b></a>
            </div>
        </div>
    </li>
    @endif
<!-- Nav Item - Dashboard Dosen -->
    @if (Auth::user()->level==1)
    <li class="nav-item {{set_active('dosen')}} ">
        <a class="nav-link " href="index.html">
            <i class="fas fa-fw fa-home"></i>
            <span><b>Beranda</b></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-paste"></i>
            <span><b> Proposal</b></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item" href="#"><b>Data Proposal</b></a>
                <a class="collapse-item" href="#"><b>Revisi Proposal</b></a>
                <a class="collapse-item" href="#"><b>Riwayat Proposal</b></a>
            </div>
        </div>
    </li>
    @endif

    

</ul>