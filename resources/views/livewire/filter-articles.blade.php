<div class="dropdown d-inline">
    <a class="nav-link dropdown-toggle" onmouseover="this.style.color='#ffc107'" onmouseout="this.style.color='black'" href="#" role="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
    </a>
    <div class="dropdown-menu" aria-labelledby="categoryDropdown">
        <a wire:click="filterArticles('AI')" class="dropdown-item">AI</a>
        <a wire:click="filterArticles('BLOCKCHAIN')" class="dropdown-item">BLOCKCHAIN</a>
        <a wire:click="filterArticles('BUSINESS')" class="dropdown-item">BUSINESS</a>
        <a wire:click="filterArticles('CYBERSECURITY')" class="dropdown-item">CYBERSECURITY</a>
        <a wire:click="filterArticles('DATASCIENCE')" class="dropdown-item">DATASCIENCE</a>
        <a wire:click="filterArticles('IOT')" class="dropdown-item">IOT</a>
        <a wire:click="filterArticles('REMOTEWORK')" class="dropdown-item">REMOTEWORK</a>
    </div>
</div>