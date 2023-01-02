<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{asset('admin/img/admin-logo3.png')}}" class="img-fluid icon-circle" alt="VacciNation">
        </div>
        <div class="sidebar-brand-text mx-2 ">
            <span>VacciNation</span>
        </div>
    </a>

        @if(auth()->user()->role=='SuperAdmin')
                <!-- Nav Item - Dashboard -->
                    <li class="nav-item {{ Request::is('super-admin/home') ? 'active' : '' }}">
                        <a href="{{route('super-admin.home')}}" class="nav-link ">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <!-- Nav Item -->
                    <li class="nav-item {{ Request::is('healthcare') ||Request::is('healthcare/*') ? 'active' : '' }}">
                        <a class="nav-link "
                           href="{{route('healthcare.index')}}">
                            <i class="fas fa-hospital-alt"></i>
                            <span>{{__('add-healthcare')}}</span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item {{ Request::is('vaccine') ||Request::is('vaccine/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('vaccine.index')}}">
                            <i class="fas fa-file-medical"></i>
                            <span>{{__('add-vaccine')}}</span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item {{ Request::is('admin-healthcare') ||Request::is('admin-healthcare/*') ? 'active' : '' }}">
                        <a class="nav-link " href="{{route('admin-healthcare.index')}}">
                            <i class="fas fa-hospital-user"></i>
                            <span>{{__('regis-healthcare')}}</span></a>
                    </li>

                    <!-- Nav Item - Tables -->
                    <li class="nav-item {{ Request::is('vaccination-history')  ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('vaccinationHistory.index')}}">
                            <i class="fas fa-file-medical-alt"></i>
                            <span>{{__('vaccine-history')}}</span></a>
                    </li>
        @elseif(auth()->user()->role == 'HealthcareAdmin')
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item {{ Request::is('healthcare-admin/home')  ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('healthcare-admin.home')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Nav Item -->
                    <li class="nav-item {{ Request::is('batches')  ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('batches.index')}}">
                            <i class="fas fa-file-medical"></i>
                            <span>{{__('record-vaccine')}}</span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item {{ Request::is('manage-vaccination') || Request::is('confirm-vaccinations/*')
                      || Request::is('reject-vaccinations/*') || Request::is('administered-vaccinations/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('manage-vaccination.index')}}">
                            <i class="fas fa-file-alt"></i>
                            <span>{{__('vaccine-info')}}</span></a>
                    </li>

        @elseif(auth()->user()->role=='Patient')
                <!-- Nav Item - Dashboard -->
                    <li class="nav-item {{ Request::is('patient/home')  ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('patient.home')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <li class="nav-item {{ Request::is('vaccinations')  ? 'active' : '' }} " >
                        <a class="nav-link active" href="{{route('vaccinations.index')}}">
                            <i class="fas fa-file-medical"></i>
                            <span>{{__('request-vaccination')}}</span></a>
                    </li>

    {{--                <!-- Nav Item -->--}}
                    <li class="nav-item {{ Request::is('')  ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('vaccination-status.show', Auth::user()->id)}}">
                            <i class="fas fa-file-alt"></i>
                            <span>{{__('view-status')}}</span></a>
                    </li>

                    <!-- Nav Item -->
                    <li class="nav-item {{ Request::is('')  ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('queues.index')}}">
                            <i class="fas fa-file-alt"></i>
                            <span>{{__('view-queue')}}</span></a>
                    </li>
            @endif
{{--    @endguest--}}
<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
