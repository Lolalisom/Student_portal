@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Compose Message</h1>
<form method="POST" action="{{ route('messages.send') }}" class="grid gap-3 max-w-xl">
  @csrf
  <select name="to_user_id" class="p-2 bg-black/40 rounded-xl border border-white/10" required>
    @foreach($recipients as $r)
      <option value="{{ $r->id }}">{{ $r->name }} ({{ $r->email }})</option>
    @endforeach
  </select>
  <input name="subject" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Subject" required>
  <textarea name="body" rows="6" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Message..." required></textarea>
  <button class="px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">Send</button>
</form>
@endsection
