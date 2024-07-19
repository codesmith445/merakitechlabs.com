<div>
   @if($articles)
   @foreach($articles as $article)
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well blog">
            <h6>Category: {{ $article->category }}</h6>
            <a href="#">
                <div class="date primary" style="background-color: #ffc107;">
                    <span class="blog-date">{{ $article->created_at->format('M') }}</span>
                    <span class="blog-number">{{ $article->created_at->format('j') }}</span>
                </div>
                <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="image">
                            @if($article->image)
                            <img src="{{ asset('storage/' .$article->image)}}" alt="" class="img-responsive">
                            @else
                            <p>No Image Available</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 blog-details">
                        <h2>{{ $article->title }}</h2>
                        <p>
                        {{ $article->header }}
                        </p>
                        <p>
                        {{ \Illuminate\Support\Str::limit($article->paragraph, 458) }}
                        </p>
                        <button class="btn btn-md" style="color: #fff; background-color: #ffc107;" onmouseover="this.style.backgroundColor='#d9a600'" onmouseout="this.style.backgroundColor='#ffc107'" data-toggle="modal" data-target="#postModal{{ $article->id }}">edit</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteArticle({{ $article->id }})">Delete</button>
                    </div>
                </div>
            </a>
        </div>
    </div>
   <!-- Modal -->
   <div class="modal fade" id="postModal{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="postModalLabel{{ $article->id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="postModalLabel{{ $article->id }}">Edit Post</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
               <div class="modal-body">
                  <!-- Form fields for the modal -->
                  @livewire('update-article-form', ['article' => $article], key($article->id))
               </div>
         </div>
      </div>
   </div>
   @endforeach
   @else
   <p>No posts found for the selected category.</p>
   @endif
   @if(session('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   @if($deleteSuccessMessage)
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ $deleteSuccessMessage }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   @if ($createdArticleMessage)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ $createdArticleMessage }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
</div>
</div>
<script>
   // Function to open modal and fetch post data via AJAX
   function openModal(postId) {
       $.ajax({
           url: '/fetch-data/' + postId,
           type: 'GET',
           success: function(data) {
               $('#postModal' + postId + ' .modal-body').html(data); // Populate modal body
               $('#postModal' + postId).modal('show'); // Show modal
           },
           error: function(xhr, status, error) {
               console.error(xhr.responseText); // Log any errors to the console
           }
       });
   }
   
   window.addEventListener('closeModal', event => {
        $('#postModal').modal('hide'); // Hide the modal using Bootstrap's hide method
        $('.modal-backdrop').remove(); // Remove the modal backdrop manually
    });
    
</script>

