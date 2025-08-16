@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Grade Submission</h1>
<div class="p-6 rounded-2xl bg-neon-panel neon-border">
  <p class="mb-2"><span class="text-white/60">Student:</span> {{ $submission->student->name }}</p>
  <p class="mb-4"><span class="text-white/60">Assignment:</span> {{ $submission->assignment->title }}</p>
  <form method="POST" action="{{ route('submissions.grade',$submission) }}" class="space-y-3">
    @csrf
    <input name="grade" class="w-full p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Grade (e.g., 85 or A)" required>
    <textarea name="feedback" class="w-full p-2 bg-black/40 rounded-xl border border-white/10" rows="4" placeholder="Feedback (optional)"></textarea>
    <button class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30 shadow-glow">Publish Grade</button>
  </form>
</div>
@endsection
