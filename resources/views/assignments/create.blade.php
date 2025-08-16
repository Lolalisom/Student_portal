@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Create Assignment</h1>
<form method="POST" action="{{ route('assignments.store') }}" enctype="multipart/form-data" class="grid gap-3 max-w-2xl">
  @csrf
  <input name="title" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Title" required>
  <textarea name="description" class="p-2 bg-black/40 rounded-xl border border-white/10" rows="6" placeholder="Description" required></textarea>
  <input type="datetime-local" name="due_at" class="p-2 bg-black/40 rounded-xl border border-white/10">
  <input type="file" name="attachment" class="p-2 bg-black/40 rounded-xl border border-white/10">
  <button class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">Create</button>
</form>
@endsection
