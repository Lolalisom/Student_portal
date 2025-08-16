@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Your Results</h1>
<div class="grid md:grid-cols-2 gap-4">
  @forelse($results as $r)
  <div class="p-4 rounded-2xl bg-neon-panel neon-border">
    <p class="font-semibold">{{ $r->subject }} <span class="text-white/60">({{ $r->term ?? '—' }})</span></p>
    <p class="text-3xl mt-2 neon-text">{{ $r->score }}</p>
    <p class="text-white/60 mt-2">Published {{ $r->published_at->toDayDateTimeString() }}</p>
  </div>
  @empty
  <p class="text-white/70">No results yet.</p>
  @endforelse
</div>
@endsection
