<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-neon-panel card neon-border shadow-glow">
            <div class="mb-8 text-center">
                <span class="neon-text text-3xl font-bold tracking-wide">🎓 Student Portal</span>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-neon-cyan" />
                    <x-text-input id="name" class="block mt-1 w-full bg-gray-900 border-neon-cyan text-white focus:ring-neon-cyan focus:border-neon-cyan" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-neon-cyan" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-900 border-neon-cyan text-white focus:ring-neon-cyan focus:border-neon-cyan" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-neon-cyan" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-900 border-neon-cyan text-white focus:ring-neon-cyan focus:border-neon-cyan" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-neon-cyan" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-900 border-neon-cyan text-white focus:ring-neon-cyan focus:border-neon-cyan" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between">
                    <a class="underline text-sm text-neon-cyan hover:text-neon-lime transition" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <button type="submit" class="px-6 py-2 rounded-xl bg-neon-cyan text-gray-900 font-bold neon-border shadow-glow hover:bg-neon-lime transition">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
