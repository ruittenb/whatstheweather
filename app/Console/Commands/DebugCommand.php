<?php

namespace App\Console\Commands;

use App\Models\Advice;
use App\Models\Forecast;
use Illuminate\Console\Command;

class DebugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:debug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the commands in Console\\Commands\\DebugCommand';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = Advice::where('sort_order', Advice::NO_ADVICE)->get();
        $data = Forecast::where('city', 'Paramaribo')->get();
        var_dump($data);
        return Command::SUCCESS;
    }
}
