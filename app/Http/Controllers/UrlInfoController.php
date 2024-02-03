<?php
namespace App\Http\Controllers;

use App\Jobs\WordCounterJob;
use App\Models\WebRecord;
use Illuminate\Http\Request;


class UrlInfoController extends Controller
{
    public function fetchInfo(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $url = $request->post('url');

        $webRecord = WebRecord::where("url", $url)->first();

        if(!$webRecord) {
            // Create a new WebRecord
            $webRecord = WebRecord::create([
                'url' => $url,
                'user_id' => auth()->id(), // Assuming you have authentication set up
            ]);

            // Dispatch the job with the WebRecord ID
            WordCounterJob::dispatch($webRecord->id);
        }

        return response()->json($webRecord);
    }

    public function getWebrecord($id) {
        $webRecord = WebRecord::find($id);
        return response()->json($webRecord);

    }
}

?>
