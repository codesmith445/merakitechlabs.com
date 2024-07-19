<div>
   @if($posts)
   @foreach($posts as $post)
   <div class="row row-sm mg-b-20" >
      <div class="col-lg-12 ht-lg-100p">
         <div class="card card-dashboard-one">
            <div class="card-header">
               <h6 class="card-title" id="dataTitle">Category: {{ $post->category }}</h6>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <!-- Card with Image and Details -->
                     <div class="card">
                        <div class="row">
                           <div class="col-md-4">
                              <label for="">Image</label>
                              @if($post->image)
                              <img src="{{ asset('storage/' .$post->image)}}" class="img-thumbnail" alt="Image" srcset="">
                              @else
                              <p>No Image Available</p>
                              @endif
                           </div>
                           <div class="col-md-8">
                              <div class="card-body">
                                 <h5 class="card-title">{{ $post->title }}</h5>
                                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                 <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $post->project_url }}</li>
                                    <li class="list-group-item">{{ $post->goals }}</li>
                                    <li class="list-group-item"><button type="button" class="btn btn-sm" style="background-color: #ffc107;" onmouseover="this.style.backgroundColor='#d9a600'" onmouseout="this.style.backgroundColor='#ffc107'" data-toggle="modal" data-target="#postModal{{ $post->id }}">
                                       View More
                                       </button>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="postModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="postModalLabel{{ $post->id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="postModalLabel{{ $post->id }}">Edit Post</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
               <div class="modal-body">
                  <!-- Form fields for the modal -->
                  @livewire('update-and-delete-form', ['post' => $post], key($post->id))
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
   @if ($createdPostMessage)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ $createdPostMessage }}
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

