@extends('layouts.app')
@section('content')
<div class="grid md:grid-cols-3 gap-6">
  <div class="md:col-span-2 p-6 rounded-2xl bg-neon-panel neon-border">
    <h1 class="text-3xl font-bold neon-text">{{ $assignment->title }}</h1>
    <p class="mt-3 text-white/80">{!! nl2br(e($assignment->description)) !!}</p>
    @if($assignment->attachment_path)
      <a class="mt-4 inline-block underline" href="{{ Storage::url($assignment->attachment_path) }}" target="_blank">Download Attachment</a>
    @endif
  </div>
  @if(auth()->user()->isStudent())
  <div class="p-6 rounded-2xl bg-neon-panel neon-border">
    <h3 class="text-xl font-semibold mb-4">Submit</h3>
    <form method="POST" action="{{ route('submissions.store',$assignment) }}" enctype="multipart/form-data" class="space-y-3">
      @csrf
      <input name="title" class="w-full p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Submission title" required>
      <textarea name="message" class="w-full p-2 bg-black/40 rounded-xl border border-white/10" rows="4" placeholder="Message (optional)"></textarea>
      <input type="file" name="file" class="w-full" required>
      <button class="w-full py-2 rounded-xl bg-neon-lime/20 hover:bg-neon-lime/30 shadow-glow">Upload</button>
    </form>
  </div>
  @endif
</div>
@endsection
