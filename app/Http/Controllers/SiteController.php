<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextWidget;
use Illuminate\View\View;
use Artesaos\SEOTools\Facades\OpenGraph;

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
        
        // SEO and OpenGraph
        OpenGraph::setTitle('merakitechlabs - about us')
              ->setDescription('merakitechlabs is commited to excelence, we dedicate to ensure the best quality of education as possible. We work towards the improvement of our community and make impact to lives of people through our educational tutorials.')
              ->setUrl('about-us')
              ->addImage(asset('images/01JCA8BRH04JHS2PE5FPA7S24N.png')); // Provide the path to your default image
        // End for SEO Purposes

        return view('about', compact('widget'));
    }

    public function contactUs(): View {
        // SEO and OpenGraph
        OpenGraph::setTitle('merakitechlabs - contact-us')
              ->setDescription('merakitechlabs is commited to excelence, we dedicate to ensure the best quality of education as possible. We work towards the improvement of our community and make impact to lives of people through our educational tutorials.')
              ->setUrl('contact-us')
              ->addImage(asset('images/01JCA8BRH04JHS2PE5FPA7S24N.png')); // Provide the path to your default image
        // End for SEO Purposes
        return view('contact-us');
    }

    public function privacyPolicy(): View {
        // SEO and OpenGraph
        OpenGraph::setTitle('merakitechlabs - privacy-policy')
              ->setDescription('merakitechlabs is commited to excelence, we dedicate to ensure the best quality of education as possible. We work towards the improvement of our community and make impact to lives of people through our educational tutorials.')
              ->setUrl('privacy-policy')
              ->addImage(asset('images/01JCA8BRH04JHS2PE5FPA7S24N.png')); // Provide the path to your default image
        // End for SEO Purposes
        return view('privacy-policy');
    }

    public function termsAndConditions(): View {
        // SEO and OpenGraph
        OpenGraph::setTitle('merakitechlabs - terms-and-conditions')
              ->setDescription('merakitechlabs is commited to excelence, we dedicate to ensure the best quality of education as possible. We work towards the improvement of our community and make impact to lives of people through our educational tutorials.')
              ->setUrl('terms-and-conditions')
              ->addImage(asset('images/01JCA8BRH04JHS2PE5FPA7S24N.png')); // Provide the path to your default image
        // End for SEO Purposes
        return view('terms-and-conditions');
    }
}
