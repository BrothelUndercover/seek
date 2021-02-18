<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravelium\Sitemap\Sitemap;
use Carbon\Carbon;
use App\Topice;

class SitemapController extends Controller
{
    public function index(Sitemap $sitemap,Topice $topice)
    {
        $sitemap->setCache('seek.sitemap', 3600);
        if (!$sitemap->isCached()) {
            $sitemap->add(route('pages.root'),null, '1.0', 'daily');
            // 话题数据
                $topice->orderBy('created_at', 'desc')->chunk(500, function($topices) use ($sitemap) {
                    foreach($topices as $topic) {
                        $sitemap->add($topic->link(), $topic->updated_at->toAtomString(), 0.8, 'daily');
                    }
                });
                $sitemap->render('xml');
            }
        }
}
