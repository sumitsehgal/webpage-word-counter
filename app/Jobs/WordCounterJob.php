<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\UrlInfoService;
use App\Models\WebRecord;

class WordCounterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $webRecordId;

    public function __construct($webRecordId)
    {
        $this->webRecordId = $webRecordId;
    }


    public function handle(UrlInfoService $urlInfoService)
    {
        $webRecord = WebRecord::find($this->webRecordId);

        if (!$webRecord) {
            // Handle the case where the WebRecord is not found
            return;
        }

        try {
            $info = $urlInfoService->fetchInfo($webRecord->url);

            // Update the WebRecord model with the fetched information
            $webRecord->update([
                'title' => $info['pageTitle'],
                'word_count' => $info['uniqueWords'],
                'status' => 'completed',
            ]);

        } catch (\Exception $e) {
            // Handle the exception (e.g., URL not accessible)
            $webRecord->update(['status' => 'failed']);
            // Log the error or take appropriate action
        }
    }
}
