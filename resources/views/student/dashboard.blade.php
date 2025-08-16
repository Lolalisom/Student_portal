@extends('layouts.app')
@section('content')
<div class="grid md:grid-cols-3 gap-6">
  <div class="md:col-span-2 p-6 rounded-2xl bg-neon-panel neon-border">
    <h2 class="text-2xl font-semibold neon-text mb-4">Open Assignments</h2>
    <div class="space-y-3">
      @forelse($assignments as $a)
        <a href="{{ route('assignments.show.pub',$a) }}" class="block p-4 rounded-xl bg-black/30 hover:bg-black/40 border border-white/10">
          <div class="flex items-center justify-between">
            <div>
              <p class="font-semibold">{{ $a->title }}</p>
              <p class="text-sm text-white/60">Due: {{ optional($a->due_at)->format('M d, Y H:i') ?? '—' }}</p>
            </div>
            <span class="text-neon-cyan">View →</span>
          </div>
        </a>
      @empty
        <p class="text-white/70">No assignments yet.</p>
      @endforelse
    </div>
  </div>
  <div class="p-6 rounded-2xl bg-neon-panel neon-border">
    <h3 class="text-xl font-semibold neon-text">Your Stats</h3>
    <ul class="mt-3 space-y-2 text-white/80">
      <li>Submissions: {{ $submissions->count() }}</li>
      <li>Results: {{ $results->count() }}</li>
      <li>Unread Messages: {{ $unread }}</li>
    </ul>
  </div>
</div>
@endsection
