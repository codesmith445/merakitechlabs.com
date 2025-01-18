<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextWidget;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function about(): View {
        $widget = TextWidget::query()
        ->where('key', '=', 'about-page')
        ->where('active', '=', true)
        ->first();

        if(!$widget) {
            throw new NotFoundHttpException();
        }

        return view('about', compact('widget'));
    }
}
