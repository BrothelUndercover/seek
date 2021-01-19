<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Topice;
use Carbon\Carbon;

class UpdateTopiceCreatedAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeks:update-topcie-created-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新随机帖子发帖时间';

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
    public function handle(Topice $topice)
    {
        $this->info('start');
        Topice::chunkById(100,function($topices){
                foreach ($topices as $key => $topice) {
                    $topice->created_at = Carbon::now()->toDateTimeString();
                    $topice->save();
                }
        });
        $this->info('end');
    }
}
