<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" class="h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name','Student Portal') }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-neon-bg text-white font-inter">
  <div class="border-b border-white/10 bg-neon-panel/60 backdrop-blur sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
      <a href="{{ route('dashboard') }}" class="font-bold text-xl neon-text">🎓 Student Portal</a>
      <nav class="flex items-center gap-4">
        @auth
          <a href="{{ route('assignments.index') }}" class="hover:text-neon-cyan">Assignments</a>
          <a href="{{ route('results.index') }}" class="hover:text-neon-cyan">Results</a>
          <a href="{{ route('messages.inbox') }}" class="hover:text-neon-cyan">Messages</a>
          <form method="POST" action="{{ route('logout') }}">@csrf
            <button class="px-3 py-1 rounded-xl bg-neon-purple/20 hover:bg-neon-purple/30 neon-border">Logout</button>
          </form>
        @endauth
      </nav>
    </div>
  </div>
  <main class="max-w-7xl mx-auto px-4 py-8">
    @if(session('success'))
      <div class="mb-4 p-3 rounded-xl bg-green-500/20 border border-green-400/40 shadow-glow">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="mb-4 p-3 rounded-xl bg-red-500/20 border border-red-400/40">
        <ul class="list-disc ml-5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif
    {{ $slot ?? '' }}
    @yield('content')
  </main>
  <footer class="mt-12 border-t border-white/10 py-6 text-center text-white/70">© {{ date('Y') }} Student Portal</footer>
</body>
</html>
