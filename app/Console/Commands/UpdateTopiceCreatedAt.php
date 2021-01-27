<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Topice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
    public function handle()
    {
        $this->info('start');
        // Db::table('topices')->orderBy('id')->chunk(300,function($topices){
        //         foreach ($topices as $key => $topice) {
        //             DB::table('topices')->update(['created_at'=> Carbon::now()->toDateTimeString()]);
        //         }
        // });
        $topices = DB::table('topices')->inRandomOrder()->take(300)->get();
            foreach ($topices as $key => $topice) {
                DB::table('topices')->update(['created_at'=> Carbon::now()->toDateTimeString()]);
        }
        $this->info('end');
    }
}
