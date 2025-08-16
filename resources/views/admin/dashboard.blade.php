@extends('layouts.app')
@section('content')
<div class="grid lg:grid-cols-3 gap-6">
  <div class="lg:col-span-2 p-6 rounded-2xl bg-neon-panel neon-border">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-2xl font-semibold neon-text">Assignments</h2>
      <a href="{{ route('assignments.create') }}" class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">+ New</a>
    </div>
    <div class="space-y-3">
      @foreach($assignments as $a)
        <div class="p-4 rounded-xl bg-black/30 border border-white/10 flex items-center justify-between">
          <div>
            <p class="font-semibold">{{ $a->title }}</p>
            <p class="text-sm text-white/60">Submissions: {{ $a->submissions_count }}</p>
          </div>
          <a class="underline" href="{{ route('assignments.edit',$a) }}">Edit</a>
        </div>
      @endforeach
    </div>
  </div>
  <div class="p-6 rounded-2xl bg-neon-panel neon-border">
    <h3 class="text-xl font-semibold neon-text">Recent Submissions</h3>
    <div class="mt-3 space-y-3">
      @foreach($submissions as $s)
        <div class="p-3 rounded-xl bg-black/30 border border-white/10">
          <p class="font-semibold">{{ $s->student->name }} → {{ $s->assignment->title }}</p>
          <p class="text-sm text-white/60">{{ $s->created_at->diffForHumans() }}</p>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
