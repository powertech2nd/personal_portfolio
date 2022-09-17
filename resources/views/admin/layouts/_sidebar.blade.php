<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('admin-core-ui/assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('admin-core-ui/assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-title">Master Data</li>
        <li class="nav-item">
            <a class="nav-link {{request()->routeIs('educations.*') ? 'active' : ''}}" href="{{ route('educations.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin-core-ui/vendors/@coreui/icons/svg/free.svg#cil-education') }}">
                    </use>
                </svg> 
                Educations
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->routeIs('workplaces.*') ? 'active' : ''}}" href="{{ route('workplaces.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin-core-ui/vendors/@coreui/icons/svg/free.svg#cil-house') }}">
                    </use>
                </svg> 
                Workplaces
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->routeIs('projects.*') ? 'active' : ''}}" href="{{ route('projects.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin-core-ui/vendors/@coreui/icons/svg/free.svg#cil-file') }}">
                    </use>
                </svg> 
                Projects
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->routeIs('techStacks.*') ? 'active' : ''}}" href="{{ route('techStacks.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin-core-ui/vendors/@coreui/icons/svg/free.svg#cil-tag') }}">
                    </use>
                </svg> 
                Tech Stacks
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->routeIs('techStackTypes.*') ? 'active' : ''}}" href="{{ route('techStackTypes.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin-core-ui/vendors/@coreui/icons/svg/free.svg#cil-tags') }}">
                    </use>
                </svg> 
                Tech Stack Type
            </a>
        </li> 
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
