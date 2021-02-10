<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Roumen\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function index(Sitemap $sitemap)
    {
        $sitemap->add(route('root'),null,'1.0','daily');
        return $sitemap->render('xml');
    }
}
