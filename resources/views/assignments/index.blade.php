@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Assignments</h1>
<div class="space-y-3">
@foreach($assignments as $a)
  <a href="{{ route('assignments.show.pub',$a) }}" class="block p-4 rounded-xl bg-neon-panel neon-border">
    <p class="font-semibold">{{ $a->title }}</p>
    <p class="text-white/60 text-sm">Due: {{ optional($a->due_at)->format('M d, Y H:i') ?? '—' }}</p>
  </a>
@endforeach
</div>
<div class="mt-4">{{ $assignments->links() }}</div>
@endsection
