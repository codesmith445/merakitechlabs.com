<style>
    .recent-post-p {
        text-decoration: none;
        color: #fff;
    }
    .recent-posts {
        background-color: #333;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }
</style>

<div class="col-md-5" style="margin-top: 5.5rem;">
            <h4 class="headline text-muted">
              RECENT POSTS
              <span class="line"></span>
            </h4>
            <div class="recent-articles" style="background-color: #333; padding-top: 10px;">
                <!-- <h5 class="text-light" style="padding-left: 15px;">Recent Articles</h5> -->
                <!-- Add your recent articles code here -->
                <ul class="list-group list-group-flush">
                    <!-- Example of a recent article item -->
                    @foreach($recentPosts as $post)
                    <div class="media popular-post pb-1" style="padding-left: 15px;">
                    <a class="pull-left"  href="{{ url('project-details', ['id' => $post->id]) }}">
                        <!-- Use an image for the post if available -->
                        <!-- <img src="{{ asset('storage/' . $post->image) }}" alt="Recent Post Image"> -->
                        <div class="image" style="background-color: #fff; border: 1px solid #fff;">
                        <img src="{{asset('storage/' . $post->image)}}" alt="..." class="img-responsive" style="max-width: 8rem; min-height: 3.3rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                        </div>
                    </a>
                    <div class="media-body" style="padding-left: 5px;">
                        <a style="color: #fff;" href="{{ url('project-details', ['id' => $post->id]) }}">{{ $post->title }}</a>
                        <a href="">
                        <p class="text-light">
                            <a class="recent-post-p" href="{{ url('project-details', ['id' => $post->id]) }}">{{ \Illuminate\Support\Str::limit($post->project_detail, 50) }}</a>
                          
                        </p>
                        </a>
                    </div>
                </div>  
                    @endforeach
                </ul>
            </div>
            <!-- <div class="media popular-post">
              <a class="pull-left" href="#">
                <img src="https://www.bootdey.com/image/60x60/4B0082/000000" alt="Popular Post">
              </a>
              <div class="media-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
              </div>
            </div>  
            <div class="media popular-post">
              <a class="pull-left" href="#">
                <img src="https://www.bootdey.com/image/60x60/E6E6FA/000000" alt="Popular Post">
              </a>
              <div class="media-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
              </div>
            </div>    
            <div class="media popular-post">
              <a class="pull-left" href="#">
                <img src="https://www.bootdey.com/image/60x60/FFFACD/000000" alt="Popular Post">
              </a>
              <div class="media-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
              </div>
            </div>    
            <div class="media popular-post">
              <a class="pull-left" href="#">
                <img src="https://www.bootdey.com/image/60x60/E0FFFF/000000" alt="Popular Post">
              </a>
              <div class="media-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
              </div>
            </div>             -->
        </div>