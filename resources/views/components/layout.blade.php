<!DOCTYPE html>
<html lang="en" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body class="bg-slate-950 text-white from-black to-slate-700 bg-gradient-to-r">
    <!-- header -->
    <div class="fixed z-50 w-full">
      <x-navbar />
    </div>

    <main class="pt-16 space-y-8">
      {{$slot}}
    </main>

    <x-footer />

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init(
        {
          delay: 50,
          duration: 1000,
          // easing: "ease-out"
        }
      );
    </script>
</body>
</html>