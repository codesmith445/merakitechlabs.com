<div>

<form wire:submit.prevent="store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" wire:model="category">
            <option value="php">PHP</option>
            <option value="laravel">Laravel</option>
            <option value="javascript">JavaScript</option>
            <option value="nodejs">NodeJs</option>
            <option value="python">Python</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" wire:model="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="goals">Goals</label>
        <textarea class="form-control" wire:model="goals" rows="5" placeholder="Enter Goals"></textarea>
        <small id="emailHelp" class="form-text text-muted">What are your goals for this project</small>
    </div>
    <div class="form-group">
        <label for="project_url">Project Url</label>
        <input type="url" class="form-control" wire:model="project_url" placeholder="Url">
    </div>
    <div class="form-group">
        <label for="project_detail">Project Details</label>
        <textarea class="form-control" wire:model="project_detail" rows="5" placeholder="Project Details"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" wire:model="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="source_code">Source Code</label>
        <textarea class="form-control" wire:model="source_code" rows="5" placeholder="Source Code"></textarea>
    </div>
    <div class="form-group">
        <label for="instructions">Instructions</label>
        <textarea class="form-control" wire:model="instructions" rows="5" placeholder="Instructions"></textarea>
    </div>
    <!-- Add Steps section -->
    <div id="steps-section">
            @foreach($steps as $index => $step)
                <div>
                <h4>Step {{ $step['step_number'] }}</h4>
                    <div class="form-group">
                        <label for="step_image">Step Image</label>
                        <input type="file" wire:model="steps.{{ $index }}.image" class="form-control">
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
    
    <button type="button" wire:click.prevent="addStep" class="btn btn-default" style="color: #fff; background-color: #333;" onmouseover="this.style.backgroundColor='#666'" onmouseout="this.style.backgroundColor='#333'" id="add-step">Add Step</button>
    <button type="submit" class="btn btn-default" style="color: #fff; background-color: #ffc107;" onmouseover="this.style.backgroundColor='#d9a600'" onmouseout="this.style.backgroundColor='#ffc107'">Submit</button>
</form>


<script>
    window.addEventListener('closeModal', event => {
        $('#createPostModal').modal('hide'); // Hide the modal using Bootstrap's hide method
        $('.modal-backdrop').remove(); // Remove the modal backdrop manually
    });
</script>