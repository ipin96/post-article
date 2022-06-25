<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    {{-- <li class="nav-item"><a class="nav-link" href="#">
        <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
        </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li> --}}
    <li class="nav-title">Data Article</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
        </svg> Posts</a>
        <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}"><span class="nav-icon"></span> All Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="#" onclick="tambah()"span class="nav-icon"></span> Add New</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('posts.preview') }}"><span class="nav-icon"></span> Preview</a></li>
        </ul>
    </li>
</ul>