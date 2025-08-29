<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header 
            :title="__('Profile Settings')" 
            :description="__('Update your personal information')" 
        />

        @if (session('success'))
            <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="flex flex-col gap-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <flux:input
                name="name"
                :label="__('Name')"
                type="text"
                required
                autofocus
                value="{{ old('name', auth()->user()->name) }}"
                :placeholder="__('Full name')"
            />

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Email address')"
                type="email"
                required
                value="{{ old('email', auth()->user()->email) }}"
                placeholder="email@example.com"
            />

            <!-- Date of Birth -->
            <flux:input
                name="date_of_birth"
                :label="__('Date of Birth')"
                type="date"
                required
                value="{{ old('date_of_birth', auth()->user()->date_of_birth?->format('Y-m-d')) }}"
                :hint="__('You must be 18 or older')"
            />

            <div class="flex items-center justify-between">
                <a href="{{ route('betting.index') }}" 
                   class="text-gray-600 hover:text-gray-900">
                    ← Back to Betting
                </a>
                <flux:button type="submit" variant="primary">
                    {{ __('Update Profile') }}
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts.auth>