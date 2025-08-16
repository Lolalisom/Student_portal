@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Create Student</h1>
<form method="POST" action="{{ route('admin.students.store') }}" class="grid gap-3 max-w-xl">
  @csrf
  <input name="name" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Name" required>
  <input name="email" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Email" required>
  <input type="password" name="password" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Password" required>
  <button class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">Create</button>
</form>
@endsection
