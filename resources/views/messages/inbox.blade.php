@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-semibold neon-text mb-4">Inbox</h1>
<a href="{{ route('messages.compose') }}" class="inline-block mb-4 px-4 py-2 rounded-xl bg-neon-cyan/20 hover:bg-neon-cyan/30">Compose</a>
<div class="grid gap-3">
  @foreach($msgs as $m)
    <div class="p-4 rounded-2xl bg-neon-panel neon-border">
      <p class="font-semibold">{{ $m->subject }}</p>
      <p class="text-white/60 text-sm">From: {{ $m->from->name }} · {{ $m->created_at->toDayDateTimeString() }}</p>
      <p class="mt-2">{{ $m->body }}</p>
      <form method="POST" action="{{ route('messages.reply',$m) }}" class="mt-3 grid gap-2">
        @csrf
        <textarea name="body" rows="2" class="p-2 bg-black/40 rounded-xl border border-white/10" placeholder="Reply..."></textarea>
        <button class="self-start px-3 py-1 rounded-xl bg-neon-pink/20 hover:bg-neon-pink/30">Send Reply</button>
      </form>
    </div>
  @endforeach
</div>
<div class="mt-4">{{ $msgs->links() }}</div>
@endsection
