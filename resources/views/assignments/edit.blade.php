@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Edit Assignment</h1>
<form method="POST" action="{{ route('assignments.update',$assignment) }}" enctype="multipart/form-data" class="grid gap-3 max-w-2xl">
  @csrf @method('PUT')
  <input name="title" value="{{ $assignment->title }}" class="p-2 bg-black/40 rounded-xl border border-white/10" required>
  <textarea name="description" class="p-2 bg-black/40 rounded-xl border border-white/10" rows="6" required>{{ $assignment->description }}</textarea>
  <input type="datetime-local" name="due_at" value="{{ optional($assignment->due_at)->format('Y-m-d\TH:i') }}" class="p-2 bg-black/40 rounded-xl border border-white/10">
  <input type="file" name="attachment" class="p-2 bg-black/40 rounded-xl border border-white/10">
  <button class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">Update</button>
</form>
@endsection
