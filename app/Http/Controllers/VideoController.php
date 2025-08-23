<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class VideoController extends Controller
{
    /* For straming from local
    public function stream($courseId, $videoFile, Request $request)
    {
        // 1. Verify that the logged-in user purchased the course
        $course = DB::table('course_bookings')
        ->join('coursesnews', 'course_bookings.course_id', '=', 'coursesnews.id')
        ->where('course_bookings.user_id', auth()->id())
        ->where('course_id', $courseId)
        ->where('status','active')
        ->select('coursesnews.*', 'course_bookings.status', 'course_bookings.created_at as purchased_at')
        ->first();


        if (!$course) {
            abort(403, 'Not authorized to view this video.');
        }

        $filePath = storage_path('app/private/'.$videoFile);

        //echo $filePath;

        if (!file_exists($filePath)) {
            abort(404, 'Video not found.');
        }

     // 3. File details
    $size   = filesize($filePath);
    $start  = 0;
    $end    = $size - 1;
    $length = $size;

    // 4. Handle Range header
    if ($request->headers->has('Range')) {
        $range = $request->header('Range');
        if (preg_match('/bytes=(\d+)-(\d*)/', $range, $matches)) {
            $start = intval($matches[1]);
            if (!empty($matches[2])) {
                $end = intval($matches[2]);
            }
        }
        $length = $end - $start + 1;
    }

    // 5. Headers
    $headers = [
        'Content-Type'   => 'video/mp4',
        'Accept-Ranges'  => 'bytes',
        'Content-Length' => $length,
        'Cache-Control'  => 'no-cache, no-store, must-revalidate',
        'Pragma'         => 'no-cache',
        'Expires'        => '0',
    ];

    if ($request->headers->has('Range')) {
        $headers['Content-Range'] = "bytes {$start}-{$end}/{$size}";
        $statusCode = 206;
    } else {
        $statusCode = 200;
    }

    // 6. Stream video
    return response()->stream(function () use ($filePath, $start, $end) {
        @ob_end_clean(); // Disable Laravel's output buffering
        $handle = fopen($filePath, 'rb');
        fseek($handle, $start);
        $chunkSize = 8192;

        while (!feof($handle) && ($pos = ftell($handle)) <= $end) {
            if ($pos + $chunkSize > $end) {
                $chunkSize = $end - $pos + 1;
            }
            echo fread($handle, $chunkSize);
            flush();
        }
        fclose($handle);
    }, $statusCode, $headers);

    }
    */



     public function stream($courseId, $vimeo_id, Request $request)
    {
        // 1. Verify that the logged-in user purchased the course
        $course = DB::table('course_bookings')
        ->join('coursesnews', 'course_bookings.course_id', '=', 'coursesnews.id')
        ->where('course_bookings.user_id', auth()->id())
        ->where('course_id', $courseId)
        ->where('status','active')
        ->select('coursesnews.*', 'course_bookings.status', 'course_bookings.created_at as purchased_at')
        ->first();


        if (!$course) {
            abort(403, 'Not authorized to view this video.');
        }

        $client = new Vimeo(
            config('services.vimeo.client'),
            config('services.vimeo.secret'),
            config('services.vimeo.token')
        );

        // Fetch private video by ID
        $response = $client->request("/videos/", [], 'GET');




    }





}
