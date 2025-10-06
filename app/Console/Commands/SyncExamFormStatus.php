<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncExamFormStatus extends Command
{
    protected $signature = 'exam-forms:sync-status';
    protected $description = 'Sync exam form status based on start/end datetimes';

    public function handle(): int
    {
        // Adjust table name & column names if different
        $table = 'tbl_exam';

        // Use DB::raw for fast bulk updates (3 simple queries).
        // 1) Upcoming: now < start
        $upcoming = DB::table($table)
            ->whereNotNull('form_start_at')
            ->where('form_start_at', '>', now())
            ->where('status', '!=', 'draft')
            ->update(['status' => 'draft', 'updated_at' => now()]);

        // 2) Active: start <= now <= end
        $active = DB::table($table)
            ->whereNotNull('form_start_at')
            ->whereNotNull('form_end_at')
            ->where('form_start_at', '<=', now())
            ->where('form_end_at', '>=', now())
            ->where('status', '!=', 'published')
            ->update(['status' => 'published', 'updated_at' => now()]);

        // 3) Closed: now > end
        $closed = DB::table($table)
            ->whereNotNull('form_end_at')
            ->where('form_end_at', '<', now())
            ->where('status', '!=', 'closed')
            ->update(['status' => 'closed', 'updated_at' => now()]);

        $this->info("Synced statuses — Upcoming: {$upcoming}, Active: {$active}, Closed: {$closed}");

        return self::SUCCESS;
    }
}
