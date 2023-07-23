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
    <body class="antialiased">
        <div class="m-4">
          <div class="flex items-center justify-between">
            <span class="font-semibold text-gray-600">3 new job offers!</span>
            <img class="cursor-pointer" width="16" height="16" src="https://www.svgrepo.com/show/335437/new-window.svg" alt="logo" />
          </div>
          <div class="mt-2 divide-y">
            <div class="flex flex-col gap-4 py-4">
              <div class="flex items-center gap-4">
                <div>
                  <img src="https://picsum.photos/32/32" alt="logo" />
                </div>
                <div>
                  <div>
                    <small>Cloudways</small>
                    <h3 class="font-semibold">Laravel And Vue.js Developer</h3>
                  </div>
                  <div class="flex gap-4 text-sm">
                    <small>Full-time</small>
                    <div class="flex gap-1">
                      <img class="cursor-pointer" width="12" height="12" src="https://www.svgrepo.com/show/480834/earth-8.svg" />
                      <small>Ankara / Turkey</small>
                    </div>
                    <small>2 days ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-4 py-4">
              <div class="flex items-center gap-4">
                <div>
                  <img src="https://picsum.photos/32/32" alt="logo" />
                </div>
                <div>
                  <div>
                    <small>Cloudways</small>
                    <h3 class="font-semibold">Laravel And Vue.js Developer</h3>
                  </div>
                  <div class="flex gap-4 text-sm">
                    <small>Full-time</small>
                    <div class="flex gap-1">
                      <img class="cursor-pointer" width="12" height="12" src="https://www.svgrepo.com/show/480834/earth-8.svg" />
                      <small>Ankara / Turkey</small>
                    </div>
                    <small>2 days ago</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
