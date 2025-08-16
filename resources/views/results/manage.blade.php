@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Publish Results</h1>
<div class="p-6 rounded-2xl bg-neon-panel neon-border max-w-xl">
  <form method="POST" action="{{ route('results.store') }}" class="grid gap-3">
    @csrf
    <label class="text-sm text-white/70">Student</label>
    <select name="student_id" class="p-2 bg-black/40 rounded-xl border border-white/10" required>
      @foreach($students as $s)
        <option value="{{ $s->id }}">{{ $s->name }} - {{ $s->email }}</option>
      @endforeach
    </select>
    <input name="subject" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Subject" required>
    <input name="score" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Score/Grade" required>
    <input name="term" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Term (optional)">
    <button class="px-4 py-2 rounded-xl bg-neon-lime/20 hover:bg-neon-lime/30">Publish</button>
  </form>
</div>
@endsection
