<ul class="navbar-nav bg-green sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-microscope"></i>
        </div>
        <div class="sidebar-brand-text mx-1">KERJA PRAKTEK</div>
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
            <span class="pl-1">Dosen</span>
        </a>
        <div id="collapseTwo" class="collapse {{set_show(['dospem.index','dospem.create','dospem.edit'])}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item {{set_active(['dospem.index','dospem.edit'])}}" href="{{route('dospem.index')}}">Data Dosen</a>
                <a class="collapse-item {{set_active('dospem.create')}}" href="{{route('dospem.create')}}">Tambah Dosen</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{set_active(['konsentrasi.index','konsentrasi.create','konsentrasi.edit'])}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#konsentrasi"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-list"></i>
            <span class="pl-1">Konsentrasi</span>
        </a>
        <div id="konsentrasi" class="collapse {{set_show(['konsentrasi.index','konsentrasi.create','konsentrasi.edit'])}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item {{set_active(['konsentrasi.index','konsentrasi.edit'])}}" href="{{route('konsentrasi.index')}}">Data Konsentrasi</a>
                <a class="collapse-item {{set_active(['konsentrasi.create'])}}" href="{{route('konsentrasi.create')}}">Tambah Konsentrasi</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{set_active(['data-mahasiswa','edit-mahasiswa'])}} ">
        <a class="nav-link " href="{{route('data-mahasiswa')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Mahasiswa</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    
    @endif

    <!-- Nav Item - Dashboard mahasiswa -->
    @if (Auth::user()->level==2)
    <li class="nav-item {{set_active('mahasiswa')}} ">
        <a class="nav-link " href="index.html">
            <i class="fas fa-fw fa-home"></i>
            <span><b>Beranda</b></span></a>
    </li>

    <li class="nav-item {{set_active(['proposal.index','proposal.create','proposal.edit'])}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-paste"></i>
            <span><b> Proposal</b></span>
        </a>
        <div id="collapseTwo" class="collapse {{set_show(['proposal.index','proposal.create','proposal.edit'])}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu:</h6>
                <a class="collapse-item {{set_active('proposal.index')}}" href="buttons.html"><b>Data Proposal</b></a>
                <a class="collapse-item {{set_active('proposal.create')}}" href="{{route('proposal.create')}}"><b>Pengajuan Proposal</b></a>
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