<?php

namespace App\Commands\Make;

use App\services\Boilerplate\MakeBoilerplate;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class MakePackageCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'make:parcel';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command to generate laravel package boilerplate';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $vendorName = $this->ask("Input vendor name");
        $parcelName = $this->ask("Package Name");
        $authorName = $this->ask("Input author name");
        $authorEmail = $this->ask("Input author email");
        $description = $this->ask("Input package description");

        (new MakeBoilerplate(
            $vendorName,
            $parcelName,
            $authorName,
            $authorEmail,
            $description,
            $this
        ))->makeParcel();
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
