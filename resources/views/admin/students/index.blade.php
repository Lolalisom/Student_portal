@extends('layouts.app')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold neon-text">Students</h1>
  <a href="{{ route('admin.students.create') }}" class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">+ New</a>
</div>
<div class="grid gap-3">
  @foreach($students as $s)
  <div class="p-4 rounded-2xl bg-neon-panel neon-border flex items-center justify-between">
    <div>
      <p class="font-semibold">{{ $s->name }}</p>
      <p class="text-white/60 text-sm">{{ $s->email }}</p>
    </div>
    <div class="flex gap-2">
      <a href="{{ route('admin.students.edit',$s) }}" class="px-3 py-1 rounded-xl bg-neon-pink/20 hover:bg-neon-pink/30">Edit</a>
      <form method="POST" action="{{ route('admin.students.destroy',$s) }}">@csrf @method('DELETE')
        <button class="px-3 py-1 rounded-xl bg-red-500/30 hover:bg-red-500/40">Delete</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
<div class="mt-4">{{ $students->links() }}</div>
@endsection
