@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">All Submissions</h1>
<div class="grid gap-4">
  @foreach($subs as $s)
    <div class="p-4 rounded-xl bg-neon-panel neon-border flex items-center justify-between">
      <div>
        <p class="font-semibold">{{ $s->student->name }} — {{ $s->assignment->title }}</p>
        <p class="text-sm text-white/60">Status: {{ ucfirst($s->status) }} | {{ $s->created_at->toDayDateTimeString() }}</p>
      </div>
      <div class="flex items-center gap-3">
        <a class="underline" href="{{ Storage::url($s->file_path) }}" target="_blank">Download</a>
        <a class="px-3 py-1 rounded-xl bg-neon-pink/20 hover:bg-neon-pink/30" href="{{ route('submissions.grade.form',$s) }}">Grade</a>
      </div>
    </div>
  @endforeach
</div>
<div class="mt-4">{{ $subs->links() }}</div>
@endsection
