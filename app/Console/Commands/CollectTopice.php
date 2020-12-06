<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use QL\QueryList;

class CollectTopice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collect:topice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '采集帖子';

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
       $ql = QueryList::post('http://xxxx.com/login',[
           'username' => 'admin',
           'password' => '123456'
       ])->get('http://xxx.com/admin');


       dump($userName);
    }
}
