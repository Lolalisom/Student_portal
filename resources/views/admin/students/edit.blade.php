@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Edit Student</h1>
<form method="POST" action="{{ route('admin.students.update',$student) }}" class="grid gap-3 max-w-xl">
  @csrf @method('PUT')
  <input name="name" value="{{ $student->name }}" class="p-2 bg-black/40 rounded-xl border border-white/10" required>
  <input name="email" value="{{ $student->email }}" class="p-2 bg-black/40 rounded-xl border border-white/10" required>
  <input name="phone" value="{{ $student->phone }}" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Phone">
  <textarea name="bio" rows="4" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Bio">{{ $student->bio }}</textarea>
  <button class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">Save</button>
</form>
@endsection
