<nav class="navbar navbar-expand-lg fixed-top" id="mainNav" style="background-color: #333; padding: 0.5rem;">
    <div class="container">
        <a class="navbar-brand" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.color='#fff'" href="{{ url('/') }}" style="font-size: 1.6rem;">MerakitechLabs</a>
        <button class="navbar-toggler font-weight-bold text-white rounded" type="button" style="background-color: #ffc107" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/') }}">Home&nbsp;<i class="fas fa-home"></i></a></li>
                
                <!-- Project Drop down -->
                <li class="nav-item dropdown mx-0 mx-lg-1">
                    <a class="nav-link dropdown-toggle py-3 px-0 px-lg-3 rounded" href="#" id="projectsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Projects<i class="fas fa-angle-double-down fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="projectsDropdown">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ url('project-lists', ['category' => $category->category]) }}">{{ $category->category }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <!-- End Project Drop down -->

                <!-- Tutorial Drop down -->
                <!-- <li class="nav-item dropdown mx-0 mx-lg-1">
                    <a class="nav-link dropdown-toggle py-3 px-0 px-lg-3 rounded" href="#" id="tutorialsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tutorials<i class="fas fa-angle-double-down fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="tutorialsDropdown">
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">PHP</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">PHP Tutorial 1</a></li>
                                <li><a class="dropdown-item" href="#">PHP Tutorial 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">JavaScript</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">JavaScript Tutorial 1</a></li>
                                <li><a class="dropdown-item" href="#">JavaScript Tutorial 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Laravel</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Laravel Tutorial 1</a></li>
                                <li><a class="dropdown-item" href="#">Laravel Tutorial 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- End Tutorial Drop down -->

                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('articles.article-user-view') }}">Articles&nbsp;<i class="fas fa-file-alt"></i></a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('merakitech.about') }}">About</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact&nbsp;<i class="fas fa-envelope"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

@livewire('contact-form')