@extends('layouts.layout')
@section('content')
<style>
    .pagination .page-item.active .page-link {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #fff;
}
.pagination .page-item .page-link:hover {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #fff;
}
</style>
<div class="container bootstrap snippets project-lists-bootdey">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 d-flex ">
                        <a href="{{ url('/') }}" type="button" class="btn btn-lg back-button">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <h2 style="margin-bottom: 1.5rem;"><kbd>Category:&nbsp;{{ $category }}</kbd></h2>
                    </div>
                </div>
            </div>
    <div class="row">
    @foreach($posts as $post)
    <div class="col-sm-4">
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
    </div>
    <div class="d-start justify-content-center mt-3">
        {{ $posts->links() }}
    </div>
    
</div>
@endsection