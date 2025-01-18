<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\PostView;
use App\Models\UpvoteDownvote;
use Illuminate\Database\Eloquent\Model;


class PostOverview extends Widget
{   
    protected int | string | array $columnSpan = 3;
    
    public ?Model $record = null;
    protected function getViewData(): array
    {   
        if ($this->record === null) {
            return [
                'viewCount' => 0,
                'upvotes' => 0,
                'downvotes' => 0,
            ];
        }
        
        return [
            'viewCount' => PostView::where('post_id', '=', $this->record->id)
                           ->count(),
            'upvotes' => UpvoteDownvote::where('post_id', '=', $this->record->id)
                           ->where('is_upvote', '=', true)
                           ->count(),
            'downvotes' => UpvoteDownvote::where('post_id', '=', $this->record->id)
                           ->where('is_upvote', '=', false)
                           ->count(),
        ];
    }
    protected static string $view = 'filament.widgets.post-overview';
}
