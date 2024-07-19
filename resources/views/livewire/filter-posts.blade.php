<div class="dropdown d-inline">
    <a class="nav-link dropdown-toggle" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.color='black'" href="#" role="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
    </a>
    <div class="dropdown-menu" aria-labelledby="categoryDropdown">
        <a wire:click="filterPosts('PHP')" class="dropdown-item">PHP</a>
        <a wire:click="filterPosts('LARAVEL')" class="dropdown-item">LARAVEL</a>
        <a wire:click="filterPosts('JAVASCRIPT')" class="dropdown-item">JAVASCRIPT</a>
        <a wire:click="filterPosts('NODEJS')" class="dropdown-item">NODEJS</a>
        <a wire:click="filterPosts('PYTHON')" class="dropdown-item">PYTHON</a>
    </div>
</div>