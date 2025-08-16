<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-neon-panel card neon-border shadow-glow">
            <div class="mb-8 text-center">
                <span class="neon-text text-3xl font-bold tracking-wide">🎓 Student Portal</span>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-neon-cyan" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-900 border-neon-cyan text-white focus:ring-neon-cyan focus:border-neon-cyan" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-neon-cyan" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-900 border-neon-cyan text-white focus:ring-neon-cyan focus:border-neon-cyan" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-neon-cyan text-neon-cyan shadow-sm focus:ring-neon-cyan" name="remember">
                    <label for="remember_me" class="ms-2 text-sm text-neon-cyan">{{ __('Remember me') }}</label>
                </div>
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-neon-cyan hover:text-neon-lime transition" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <button type="submit" class="px-6 py-2 rounded-xl bg-neon-cyan text-gray-900 font-bold neon-border shadow-glow hover:bg-neon-lime transition">Log in</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
