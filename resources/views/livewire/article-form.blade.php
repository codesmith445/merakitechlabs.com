<div>

<form wire:submit.prevent="store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" wire:model="category">
            <option value="ai">Artificial Intilegence</option>
            <option value="blockchain">BlockChain</option>
            <option value="business">Business</option>
            <option value="cybersecurity">Cyber Security</option>
            <option value="datascience">Data Science</option>
            <option value="iot">IoT: The Internet of Things</option>
            <option value="remotework">Remote Work</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" wire:model="title" placeholder="Enter Title">
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
        <label for="image">Image</label>
        <input type="file" wire:model="image" class="form-control">
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
                        <label for="step_header">Step Header</label>
                        <input type="text" wire:model="steps.{{ $index }}.step_header" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="paragraph">Step Paragraph</label>
                        <textarea class="form-control" wire:model="steps.{{ $index }}.paragraph" rows="5" placeholder="Paragraph"></textarea>
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
        $('#createArticleModal').modal('hide'); // Hide the modal using Bootstrap's hide method
        $('.modal-backdrop').remove(); // Remove the modal backdrop manually
    });
</script>