<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogs extends Command
{
    protected $signature = 'logs:clear';
    protected $description = 'Clear all log files';

    public function handle()
    {
        $logFiles = glob(storage_path('logs/*.log'));
        foreach ($logFiles as $file) {
            unlink($file);
        }

        $this->info('Log files cleared successfully.');
    }
}
