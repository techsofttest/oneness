@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $course->title }}</h4>
                </div>

                <div class="card-body">
                    @if($course->video)

                        @php
                            // Detect if the video is a YouTube/Vimeo link or local file
                            $isExternal = Str::contains($course->video, ['youtube.com', 'youtu.be', 'vimeo.com']);
                            $embedUrl = $course->video;

                            // Convert YouTube watch URL to embed format if needed
                            if (Str::contains($embedUrl, 'watch?v=')) {
                                $embedUrl = str_replace('watch?v=', 'embed/', $embedUrl);
                            }

                            // Convert youtu.be short URL to embed format
                            if (Str::contains($embedUrl, 'youtu.be/')) {
                                $videoId = last(explode('/', $embedUrl));
                                $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                            }
                        @endphp

                        @if($isExternal)
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ $embedUrl }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @else
                            <video width="100%" height="auto" controls>
                                <source src="{{ asset('uploads/course/' . $course->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif

                    @else
                        <p class="text-muted">No video available for this course.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
