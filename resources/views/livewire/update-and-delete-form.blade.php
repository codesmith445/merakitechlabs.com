<div>
<form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                        <option value="php" {{ $post->category == 'php' ? 'selected' : '' }}>PHP</option>
                        <option value="javascript" {{ $post->category == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                        <option value="laravel" {{ $post->category == 'laravel' ? 'selected' : '' }}>Laravel</option>
                        <option value="nodejs" {{ $post->category == 'nodejs' ? 'selected' : '' }}>NodeJs</option>
                        <option value="python" {{ $post->category == 'python' ? 'selected' : '' }}>Python</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Title</label>
                        <input type="text"  wire:model="title" class="form-control" name="title" id="" aria-describedby="emailHelp" placeholder="Enter Title">
                     </div>
                     <div class="form-group">
                        <label for="">Goals</label>
                        <input type="text"  wire:model="goals" class="form-control" name="goals" id="" aria-describedby="emailHelp" placeholder="Enter Goals">
                        <small id="emailHelp" class="form-text text-muted">What are your goals for this project</small>
                     </div>
                     <!-- <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="project_date" id="" placeholder="Date">
                        </div> -->
                     <div class="form-group">
                        <label for="">Project Url</label>
                        <input type="url" wire:model="project_url" class="form-control" name="project_url" id="" placeholder="Url">
                     </div>
                     <div class="form-group">
                        <label for="">Project Details</label>
                        <textarea class="form-control" wire:model="project_detail" value="" name="project_detail" id="" cols="5" rows="5" placeholder="Project Details"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Image</label>
                        @if($post->image)
                        <img src="{{ asset('storage/' .$post->image)}}" class="img-fluid" alt="" srcset="">
                        @else
                        <p>No Image Available</p>
                        @endif
                        <input type="file" wire:model="imageFile" name="image" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Source Code</label>
                        <textarea class="form-control" value=""  name="source_code" id="" cols="5" rows="5" placeholder="Source Code" wire:model="source_code"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Instructions</label>
                        <textarea class="form-control" value="" name="instructions" id="" cols="5" rows="5" placeholder="Instructions" wire:model="instructions"></textarea>
                     </div>
                     <!-- Display and Add More Additional Steps -->
                     <!-- Add Steps section -->
                        <div id="steps-section">
                                @foreach($steps as $index => $step)
                                    <div>
                                    <h4>Step {{ $step['step_number'] }}</h4>
                                        <div class="form-group">
                                            <label for="step_image">Step Image</label>
                                            @if($step['image'])
                                            <img src="{{ asset('storage/' .$step['image'])}}" class="img-thumbnail" alt="Step Image">
                                            @else
                                            <p>No Image Available</p>
                                            @endif
                                            <input type="file" wire:model="stepImageFiles.{{ $index }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="step_image">Step Header</label>
                                            <input type="text" wire:model="steps.{{ $index }}.step_header" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="step_instructions">Step Instructions</label>
                                            <textarea class="form-control" wire:model="steps.{{ $index }}.instructions" rows="5" placeholder="Instructions"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="step_source_code">Step Source Code</label>
                                            <textarea class="form-control" wire:model="steps.{{ $index }}.source_code" rows="5" placeholder="Source Code"></textarea>
                                        </div>
                                        <button type="button" wire:click="removeStep({{ $index }})" class="btn btn-danger mb-2">Remove Step</button>
                                    </div>
                                @endforeach
                            </div>
                     <!-- End Add More Additional Steps -->
                     <button type="button" wire:click.prevent="addStep" class="btn btn-default" style="color: #fff; background-color: #333;" onmouseover="this.style.backgroundColor='#666'" onmouseout="this.style.backgroundColor='#333'" id="add-step">Add Step</button>
                     <button type="submit" class="btn btn-default" style="color: #fff; background-color: #ffc107;" onmouseover="this.style.backgroundColor='#d9a600'" onmouseout="this.style.backgroundColor='#ffc107'">Submit</button>
                     <button type="button" class="btn btn-danger" wire:click="deletePost({{ $post->id }})">Delete Post</button>
                  </form>
</div>
