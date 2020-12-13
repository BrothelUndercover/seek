<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use QL\QueryList;
use Illuminate\Support\Facades\DB;

class TopiceFormat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topice:format';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '帖子格式化';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ql = new QueryList;
        DB::table('topices')->where('format',false)->orderBy('id')->chunk(100,function($topices) use ($ql){
            foreach ($topices as $key => $topice) {
               $html = $ql->html($topice->body);
               $excerpt = $html->find('p:eq(0)')->text();
               $picNum = preg_match_all('/<img/', $html->find('p')->html());
               $images = [];
               if ($picNum >0) {
                   for ($i=0; $i <$picNum ; $i++) {
                       $images[$i] = $html->find('img')->eq($i)->src;
                   }
               }
               DB::table('topices')->where('id',$topice->id)->update(['excerpt' => $excerpt,'pictures' => $images,'format' => true]);
               unset($excerpt);
               unset($images);
               unset($picNum);
            }
        });
        $this->info('格式化完成');
    }
}
