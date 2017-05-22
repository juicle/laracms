<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RoleCommand extends Command implements SelfHandling, ShouldBeQueued
{

    use InteractsWithQueue, SerializesModels;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->bar = Bar::find($id);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
