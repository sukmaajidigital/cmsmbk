<x-guest>
    <div class="flex items-center justify-center min-h-screen bg-base-200">
        <div class="w-full max-w-md rounded-lg shadow-lg p-8 bg-base-100">
            <a href="" class="block text-center py-3 w-full">
                <img src="{{ asset('storage/' . \App\Models\Setting::value('logo')) }}" alt="" class="h-40 object-cover rounded-lg w-full">
            </a>
            <p class="text-center text-2xl font-bold  mt-4">{{ \App\Models\Setting::value('app_name') }}</p>
            <form method="POST" action="{{ route('login.post') }}" class="mt-6">
                @csrf
                <div class="mb-4">
                    <x-forms.text-input label="name" readonly="" placeholder="name" id="name" type="text" name="name" required="required" value="" />
                </div>
                <div class="mb-4">
                    <x-forms.text-input label="password" readonly="" placeholder="password" id="password" type="password" name="password" required="required" value="" />
                </div>
                <div class="mb-6">
                    <x-ui.checkbox>Remember this Device</x-ui.checkbox>
                </div>
                <div class="justify-end">
                    <x-button.signin> Sign In </x-button.signin>
                </div>
                <div class="flex items-center justify-center w-full">
                    {{-- <a href="{{ route('google.login') }}" class="btn btn-google w-full">
                        <i class="fab fa-google mr-2"></i> Login dengan Google
                    </a> --}}

                </div>
            </form>
        </div>
    </div>
    @push('script')
        {{-- <script>
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
                console.log('Name: ' + profile.getName());
                console.log('Image URL: ' + profile.getImageUrl());
                console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            }
        </script> --}}
    @endpush
</x-guest>
