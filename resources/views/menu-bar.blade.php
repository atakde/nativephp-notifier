<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraJobs Menu Bar</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            const shell = require('electron').shell;
        </script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased bg-gradient-to-r from-gray-100 to-blue-100">
        <div class="m-4">
          <div class="flex items-center justify-between border-b border-slate-400/25 pb-4">
            <span class="font-semibold text-gray-600 text-sm">{{ $data->count() }} new job offers!</span>
            <img class="cursor-pointer" width="16" height="16" src="{{ asset('images/new-window.svg') }}" alt="logo" />
          </div>
          @foreach($data as $item)
          <div class="mt-0 divide-y divide-slate-400/25">
            <div class="flex flex-col gap-4 py-4">
              <div class="flex items-center gap-4">
                <div>
                  <img src="https://picsum.photos/32/32" alt="logo" />
                </div>
                <div>
                  <div>
                    <small class="text-gray-600">{{ $item->creator }}</small>
                    <h3 class="font-semibold">{{ $item->title }}</h3>
                  </div>
                  <div class="flex gap-4 text-sm text-gray-600">
                    <small>Full-time</small>
                    <div class="flex gap-1">
                      <img class="cursor-pointer" width="12" height="12" src="{{ asset('images/earth.svg') }}" />
                      <small>Ankara / Turkey</small>
                    </div>
                    <small>{{date('F, j Y', strtotime($item->pubDate)) }}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </body>
</html>
