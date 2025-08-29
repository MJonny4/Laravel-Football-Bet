<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header 
            :title="__('Age Verification Required')" 
            :description="__('You must be 18 or older to access this betting platform')" 
        />

        <div class="text-center">
            <div class="text-6xl mb-4">🔞</div>
            <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-red-800 mb-2">Access Restricted</h3>
                <p class="text-red-700 mb-4">
                    This is a betting platform restricted to adults 18 years and older. 
                    Please verify your date of birth in your profile settings.
                </p>
                
                <div class="space-y-3">
                    <a href="{{ route('profile.index') }}" 
                       class="inline-block bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        Update Profile
                    </a>
                    
                    <div class="text-sm text-gray-600">
                        Or <a href="{{ route('logout') }}" 
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                              class="text-blue-500 hover:underline">
                            sign out
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</x-layouts.auth>