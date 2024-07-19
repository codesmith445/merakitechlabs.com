<div class="az-dashboard-nav"> 
<nav class="nav">
    <!-- <a wire:click.prevent="loadRelatedPosts('PHP')">PHP</a>
    <a wire:click="loadRelatedPosts('LARAVEL')">LARAVEL</a>
    <a wire:click="loadRelatedPosts('JavaScript')">JavaScript</a>
    <a wire:click="loadRelatedPosts('NODE JS')">NODE JS</a> -->
    @livewire('filter-posts')
</nav>



            <nav class="nav">
              <a class="nav-link" href="{{ route('articles.index') }}" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="far fa-save"></i> Articles</a>
              <a class="nav-link" href="#" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="far fa-file-pdf"></i> Tutorials</a>
              <a class="nav-link" href="#" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="far fa-envelope"></i>Send to Email</a>
              <a class="nav-link" href="#" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.removeProperty('color')"><i class="fas fa-ellipsis-h"></i></a>
            </nav>
          </div>

          