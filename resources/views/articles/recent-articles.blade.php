<style>
    .recent-article-p {
        text-decoration: none;
        color: #fff;
    }
    .recent-articles {
        background-color: #333;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }
</style>
<div class="recent-articles" style="background-color: #333; padding-top: 10px;">
                <h5 class="text-light" style="padding-left: 15px;">Recent Articles</h5>
                <!-- Add your recent articles code here -->
                <ul class="list-group list-group-flush">
                    <!-- Example of a recent article item -->
                    @foreach($recentArticles as $recentArticle)
                    <div class="media popular-post pb-1" style="padding-left: 15px;">
                    <a class="pull-left"  href="{{ url('article-content-details', ['id' => $recentArticle->id]) }}">
                        <!-- Use an image for the post if available -->
                        <!-- <img src="{{ asset('storage/' . $recentArticle->image) }}" alt="Recent Post Image"> -->
                        <div class="image" style="background-color: #fff; border: 1px solid #fff;">
                        <img src="{{asset('storage/' . $recentArticle->image)}}" alt="..." class="img-responsive" style="max-width: 8rem; min-height: 3.3rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                        </div>
                    </a>
                    <div class="media-body" style="padding-left: 5px;">
                        <a style="color: #fff;" href="{{ url('article-content-details', ['id' => $recentArticle->id]) }}">{{ $recentArticle->title }}</a>
                        <a href="">
                        <p class="text-light">
                            <a class="recent-article-p" href="{{ url('article-content-details', ['id' => $recentArticle->id]) }}">{{ \Illuminate\Support\Str::limit($recentArticle->paragraph, 50) }}</a>
                          
                        </p>
                        </a>
                    </div>
                </div>  
                    @endforeach
                </ul>
            </div>