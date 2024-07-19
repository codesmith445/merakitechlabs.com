<div>
<form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                        <option value="php" {{ $article->category == 'ai' ? 'selected' : '' }}>AI</option>
                        <option value="php" {{ $article->category == 'blockchain' ? 'selected' : '' }}>BLOCKCHAIN</option>
                        <option value="php" {{ $article->category == 'business' ? 'selected' : '' }}>BUSINESS</option>
                        <option value="php" {{ $article->category == 'cybersecurity' ? 'selected' : '' }}>CYBERSECURITY</option>
                        <option value="php" {{ $article->category == 'datascience' ? 'selected' : '' }}>DATASCIENCE</option>
                        <option value="php" {{ $article->category == 'iot' ? 'selected' : '' }}>IOT</option>
                        <option value="php" {{ $article->category == 'remotework' ? 'selected' : '' }}>REMOTEWORK</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Title</label>
                        <input type="text"  wire:model="title" class="form-control" name="title" id="" aria-describedby="emailHelp" placeholder="Enter Title">
                     </div>
                     <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" class="form-control" wire:model="header" placeholder="header">
                     </div>
                     <div class="form-group">
                        <label for="paragraph">Paragraph</label>
                        <textarea class="form-control" wire:model="paragraph" rows="5" placeholder="Paragraph"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Image</label>
                        @if($article->image)
                        <img src="{{ asset('storage/' .$article->image)}}" class="img-fluid" alt="" srcset="">
                        @else
                        <p>No Image Available</p>
                        @endif
                        <input type="file" wire:model="imageFile" name="image" class="form-control">
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
                                            <label for="step_header">Step Header</label>
                                            <input type="text" wire:model="steps.{{ $index }}.step_header" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="step_instructions">Step Paragraph</label>
                                            <textarea class="form-control" wire:model="steps.{{ $index }}.paragraph" rows="5" placeholder="Paragraph"></textarea>
                                        </div>
                                        <button type="button" wire:click="removeStep({{ $index }})" class="btn btn-danger mb-2">Remove Step</button>
                                    </div>
                                @endforeach
                            </div>
                     <!-- End Add More Additional Steps -->
                     <button type="button" wire:click.prevent="addStep" class="btn btn-default" style="color: #fff; background-color: #333;" onmouseover="this.style.backgroundColor='#666'" onmouseout="this.style.backgroundColor='#333'" id="add-step">Add Step</button>
                     <button type="submit" class="btn btn-default" style="color: #fff; background-color: #ffc107;" onmouseover="this.style.backgroundColor='#d9a600'" onmouseout="this.style.backgroundColor='#ffc107'">Submit</button>
                  </form>
</div>
