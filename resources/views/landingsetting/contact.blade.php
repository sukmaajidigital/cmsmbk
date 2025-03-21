<x-layouts>
    <div class="flex flex-col md:flex-row gap-6 p-6" id="contactsetting">
        <div class="w-full md:w-3/5  rounded-2xl p-6">
            <h5 class="text-2xl font-bold text-gray-700 mb-4">Contact</h5>
            <form action="{{ route('landingsetting.updatecontact') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <x-forms.textarea-input required="" label="Alamat" id="alamat" name="alamat" :value="old('alamat', $landingcontact->alamat ?? '')" />
                <x-forms.text-input label="Telepon" id="telepon" name="telepon" type="text" :value="old('telepon', $landingcontact->telepon ?? '')" required="required" />
                <x-forms.text-input label="Email" id="email" name="email" type="text" :value="old('email', $landingcontact->email ?? '')" required="required" />
                <x-forms.text-input label="Embeded Maps" id="maps" name="maps" type="text" :value="old('maps', $landingcontact->maps ?? '')" required="required" />
                <div class="mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update</button>
                </div>
            </form>
        </div>
        <div class="w-full md:w-2/5 rounded-2xl p-6">
            <h5 class="text-2xl font-bold text-gray-700 mb-4">
                Preview maps:
            </h5>
            <div class="space-y-6">
                <div>
                    <iframe src="{{ $landingcontact->maps ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2355.8021108984944!2d110.83611818174082!3d-6.773371828319484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db15bce5f05d%3A0x3c2a617369092d32!2sMuria%20Batik%20Kudus!5e0!3m2!1sen!2sid!4v1742521990212!5m2!1sen!2sid' }}" class="w-full h-screen" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
</x-layouts>
