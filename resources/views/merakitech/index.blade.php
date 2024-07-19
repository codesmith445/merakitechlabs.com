@extends('layouts.layout')
@section('content')

<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Data Filters -->
        <div class="container text-center mt-4" style="display: flex; justify-content: center;">
        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all"><kbd>All</kbd></button>
            <button class="btn btn-default filter-button" data-filter="php"><kbd>PHP</kbd></button>
            <button class="btn btn-default filter-button" data-filter="laravel"><kbd>Laravel</kbd></button>
            <button class="btn btn-default filter-button" data-filter="javascript"><kbd>Javascript</kbd></button>
            <button class="btn btn-default filter-button" data-filter="nodejs"><kbd>NodeJs</kbd></button>
            <button class="btn btn-default filter-button" data-filter="python"><kbd>Python</kbd></button>
        </div>
            <!-- Add more categories as needed -->
        </div>

        <!-- End Data Filters -->
        <!-- Portfolio Section Heading-->
        <h2 class="text-center text-secondary mb-5 mt-2">Explore Latest Projects</h2>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center portfolio-container">
            <!-- Portfolio Item 1-->
            
            <div class="container bootstrap snippets project-lists-bootdey">
                <div class="row">
                <!-- PHP Posts -->
                 @foreach($phpPosts as $post)
                    <div class="col-sm-4 portfolio-item filter php">
                        <div class="widget single-news" data-bs-toggle="modal" data-bs-target="#portfolioModal2{{$post->id}}">
                            <div class="image">
                                <img src="{{asset('storage/' . $post->image)}}" alt="..." class="img-responsive">
                                <span class="gradient"></span>
                            </div>
                            <div class="details">
                                <div class="category"><a href="">{{ $post->category }}</a></div>
                                <h3><a href="{{ url('project-details', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                                <time>{{ $post->created_at->format('l, j F Y \a\t H:i') }}</time>
                            </div>
                        </div>
                    </div>
                    <!-- portfolio modal -->
                <div class="portfolio-modal modal fade" id="portfolioModal2{{$post->id}}" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$post->title}}</h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-file-code"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Portfolio Modal - Image-->
                                        <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="..." />
                                        <!-- Portfolio Modal - Text-->
                                        <p class="mb-3 mt-3" style="font-size: 1.3rem !important; font-weight: 200;">{{ \Illuminate\Support\Str::limit($post->project_detail, 300) }}</p>
                                        <a href="{{ url('project-details', ['id' => $post->id]) }}" class="btn btn-md portfolio-modal-view-btn">
                                            <i class="fas fa-angle-double-down fa-fw"></i>
                                            View More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End portfolio modal -->
                @endforeach
                <!-- End PHP Posts -->
                
                <!-- Javascript Posts -->
                 @foreach($javascriptPosts as $post)
                    <div class="col-sm-4 portfolio-item filter javascript">
                        <div class="widget single-news" data-bs-toggle="modal" data-bs-target="#portfolioModal2{{$post->id}}">
                            <div class="image">
                                <img src="{{asset('storage/' . $post->image)}}" alt="..." class="img-responsive">
                                <span class="gradient"></span>
                            </div>
                            <div class="details">
                                <div class="category"><a href="">{{ $post->category }}</a></div>
                                <h3><a href="{{ url('project-details', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                                <time>{{ $post->created_at->format('l, j F Y \a\t H:i') }}</time>
                            </div>
                        </div>
                    </div>
                    <!-- portfolio modal -->
                <div class="portfolio-modal modal fade" id="portfolioModal2{{$post->id}}" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$post->title}}</h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-file-code"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Portfolio Modal - Image-->
                                        <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="..." />
                                        <!-- Portfolio Modal - Text-->
                                        <p class="mb-3 mt-3">{{ $post->project_detail}}</p>
                                        <a href="{{ url('project-details', ['id' => $post->id]) }}" class="btn btn-md portfolio-modal-view-btn">
                                            <i class="fas fa-angle-double-down fa-fw"></i>
                                            View More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End portfolio modal -->
                @endforeach
            <!-- End Javascript Posts -->

                <!-- Laravel Posts -->
                 @foreach($laravelPosts as $post)
                    <div class="col-sm-4 portfolio-item filter laravel">
                        <div class="widget single-news" data-bs-toggle="modal" data-bs-target="#portfolioModal2{{$post->id}}">
                            <div class="image">
                                <img src="{{asset('storage/' . $post->image)}}" alt="..." class="img-responsive">
                                <span class="gradient"></span>
                            </div>
                            <div class="details">
                                <div class="category"><a href="">{{ $post->category }}</a></div>
                                <h3><a href="{{ url('project-details', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                                <time>{{ $post->created_at->format('l, j F Y \a\t H:i') }}</time>
                            </div>
                        </div>
                    </div>
                    <!-- portfolio modal -->
                <div class="portfolio-modal modal fade" id="portfolioModal2{{$post->id}}" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$post->title}}</h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-file-code"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Portfolio Modal - Image-->
                                        <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="..." />
                                        <!-- Portfolio Modal - Text-->
                                        <p class="mb-3 mt-3">{{ $post->project_detail}}</p>
                                        <a href="{{ url('project-details', ['id' => $post->id]) }}" class="btn btn-md portfolio-modal-view-btn">
                                            <i class="fas fa-angle-double-down fa-fw"></i>
                                            View More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End portfolio modal -->
                @endforeach
            <!-- End Laravel Posts -->

                <!-- NodeJs Posts -->
                 @foreach($nodejsPosts as $post)
                    <div class="col-sm-4 portfolio-item filter nodejs">
                        <div class="widget single-news" data-bs-toggle="modal" data-bs-target="#portfolioModal2{{$post->id}}">
                            <div class="image">
                                <img src="{{asset('storage/' . $post->image)}}" alt="..." class="img-responsive">
                                <span class="gradient"></span>
                            </div>
                            <div class="details">
                                <div class="category"><a href="">{{ $post->category }}</a></div>
                                <h3><a href="{{ url('project-details', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                                <time>{{ $post->created_at->format('l, j F Y \a\t H:i') }}</time>
                            </div>
                        </div>
                    </div>
                    <!-- portfolio modal -->
                <div class="portfolio-modal modal fade" id="portfolioModal2{{$post->id}}" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$post->title}}</h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-file-code"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Portfolio Modal - Image-->
                                        <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="..." />
                                        <!-- Portfolio Modal - Text-->
                                        <p class="mb-3 mt-3">{{ $post->project_detail}}</p>
                                        <a href="{{ url('project-details', ['id' => $post->id]) }}" class="btn btn-md portfolio-modal-view-btn">
                                            <i class="fas fa-angle-double-down fa-fw"></i>
                                            View More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End portfolio modal -->
                @endforeach
            <!-- End NodeJs Posts -->
                <!-- Python Posts -->
                 @foreach($pythonPosts as $post)
                    <div class="col-sm-4 portfolio-item filter python">
                        <div class="widget single-news" data-bs-toggle="modal" data-bs-target="#portfolioModal2{{$post->id}}">
                            <div class="image">
                                <img src="{{asset('storage/' . $post->image)}}" alt="..." class="img-responsive">
                                <span class="gradient"></span>
                            </div>
                            <div class="details">
                                <div class="category"><a href="">{{ $post->category }}</a></div>
                                <h3><a href="{{ url('project-details', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                                <time>{{ $post->created_at->format('l, j F Y \a\t H:i') }}</time>
                            </div>
                        </div>
                    </div>
                    <!-- portfolio modal -->
                <div class="portfolio-modal modal fade" id="portfolioModal2{{$post->id}}" tabindex="-1" aria-labelledby="portfolioModal2" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body text-center pb-5">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Portfolio Modal - Title-->
                                        <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">{{$post->title}}</h2>
                                        <!-- Icon Divider-->
                                        <div class="divider-custom">
                                            <div class="divider-custom-line"></div>
                                            <div class="divider-custom-icon"><i class="fas fa-file-code"></i></div>
                                            <div class="divider-custom-line"></div>
                                        </div>
                                        <!-- Portfolio Modal - Image-->
                                        <img class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="..." />
                                        <!-- Portfolio Modal - Text-->
                                        <p class="mb-3 mt-3">{{ $post->project_detail}}</p>
                                        <a href="{{ url('project-details', ['id' => $post->id]) }}" class="btn btn-md portfolio-modal-view-btn">
                                            <i class="fas fa-angle-double-down fa-fw"></i>
                                            View More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End portfolio modal -->
                @endforeach
            <!-- End Python Posts -->
                </div>
                <!-- View Links -->
                <div class="text-center portfolio-item filter all" id="view-all">
                    <a href="{{ url('allproject-lists') }}" class="btn viewpost-links">View All</a>
                </div>
                <div class="text-center portfolio-item filter php" id="view-php" style="display: none;">
                    <a href="{{ url('project-lists/php') }}" class="btn viewpost-links">View PHP</a>
                </div>
                <div class="text-center portfolio-item filter javascript" id="view-javascript" style="display: none;">
                    <a href="{{ url('project-lists/javascript') }}" class="btn viewpost-links">View Javascript</a>
                </div>
                <div class="text-center portfolio-item filter laravel" id="view-laravel" style="display: none;">
                    <a href="{{ url('project-lists/laravel') }}" class="btn viewpost-links">View Laravel</a>
                </div>
                <div class="text-center portfolio-item filter nodejs" id="view-nodejs" style="display: none;">
                    <a href="{{ url('project-lists/nodejs') }}" class="btn viewpost-links">View Nodejs</a>
                </div>
                <div class="text-center portfolio-item filter python" id="view-python" style="display: none;">
                    <a href="{{ url('project-lists/python') }}" class="btn viewpost-links">View Python</a>
                </div>
                <!-- End View Links -->
            </div>
            
            <!-- Portfolio Item 4-->
            <!-- <div class="col-md-3 col-lg-3 mb-5">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100"></div>
                    <img class="img-fluid" src="{{ asset('assets/asset/img/portfolio/game.png') }}" alt="..." />
                </div>
            </div> -->
            <!-- Portfolio Item 5-->
            <!-- <div class="col-md-3 col-lg-3 mb-5">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal5">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100"></div>
                    <img class="img-fluid" src="{{ asset('assets/asset/img/portfolio/safe.png') }}" alt="..." />
                </div>
            </div> -->
            <!-- Portfolio Item 6-->
            <!-- <div class="col-md-3 col-lg-3 mb-5">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal6">
                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100"></div>
                    <img class="img-fluid" src="{{ asset('assets/asset/img/portfolio/submarine.png') }}" alt="..." />
                </div>
            </div> -->
            <!-- View Links -->
        </div>
    </div>
</section>
<!-- Portfolio Modals-->

        <!-- Portfolio Modal 2-->
        
        <!-- Portfolio Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" aria-labelledby="portfolioModal3" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Circus Tent</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/circus.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" aria-labelledby="portfolioModal4" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/game.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" aria-labelledby="portfolioModal5" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/safe.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" aria-labelledby="portfolioModal6" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/submarine.png" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Close Window
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection





