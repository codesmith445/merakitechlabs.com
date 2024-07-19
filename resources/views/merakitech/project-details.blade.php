@extends('layouts.layout')
<title>@yield('title', 'Project Details')</title>
@section('content')
<div class="container bootstrap snippets bootdey">
    
  <div class="row" >
        <!-- posts -->
    <div class="col-md-7" style="margin-top: 7rem;">
    <h4 style="font-weight: 300; font-size: 40px;">{{ $post->title }}</h4>
            <div class="panel blog-container">
              <div class="panel-body">
                <div class="image-wrapper">
                  @if($post->image)
                  <a class="image-wrapper image-zoom cboxElement" style="margin-bottom: 0.2rem;" href="#">
                    <img class="img-fluid" src="{{ asset('storage/' .$post->image) }}" alt="Photo of Project" style="max-width: 700px; max-height: 1000px; min-width: 700px; min-height: 250px;">
                  @endif
                    <!-- <div class="image-overlay"></div>  -->
                  </a>
                </div>
                <div style="width: 45rem;">
                <!-- <small class="text-muted" style="color: #333 !important; margin-top: 2rem !important;">Category <a href="#" style="color: #333; font-weight: 500; background-color: #ffc107;"><strong> {{ $post->category}}</strong></a> |  Project Url <a href="#" style="color: #333; font-weight: 500; background-color: #ffc107;"><strong> {{ $post->project_url}}</strong></a></small> -->
                <p class="m-top-sm m-bottom-sm" style="margin-bottom: 2rem; margin-top: 1rem; line-height: 32px;">
                {!! autoLinkUrls($post->project_detail) !!}
                </p>
                </div>
              </div>
            </div>  
            @foreach($post->steps as $step)
            <!-- <h4><i class="fa fa-angle-double-right"></i>Step: {{ $step->step_number }}</h4> -->
            <div class="panel blog-container">
              <div class="panel-body">
                <div class="image-wrapper">
                  <a class="image-wrapper image-zoom cboxElement" href="#">
                    @if($step->image)
                    <img class="img-fluid" src="{{ asset('storage/' .$step->image) }}" alt="Photo of Project" style="max-width: 700px; max-height: 1000px; min-width: 700px; min-height: 250px; border-radius: 4px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                    @endif
                    <!-- <div class="image-overlay"></div>  -->
                  </a>
                </div>
                
                
                <!-- <small class="text-muted">By <a href="#"><strong> John Doe</strong></a> |  Post on Jan 8, 2013  | 58 comments</small> -->
                
                <div style="width: 43.9rem; margin-bottom: 2rem; margin-top: 1rem;" >
                <p class="m-top-sm m-bottom-sm" style="line-height: 32px; font-weight: 700;">
                {!! autoLinkUrls($step->step_header) !!}
                </p>
                <p class="project-details-p" style="white-space: pre-wrap;">{!! autoLinkUrls(makeBold($step->instructions)) !!}</p>
                @if($step->source_code)
                  <pre style="background-color: #333;">
<code class='language-lua'>{{ $step->source_code }}</code></pre>
                @endif
                </div>
                
              </div>
            </div>    
            @endforeach   
    </div>
        
        @include('merakitech.recent-posts')
  </div>
</div>
@endsection

