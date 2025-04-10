<x-layouts>
    <div class="flex flex-col md:flex-row gap-6 p-6" id="aboutsetting">
        <div class="w-full h-full md:w-3/5 rounded-2xl p-6">
            <h5 class="text-2xl font-bold text-gray-700 mb-4">About</h5>
            <form action="{{ route('landingsetting.updatecontrollview') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <x-forms.text-input label="Hero Tagline" id="hero_tagline" name="hero_tagline" type="text" :value="old('hero_tagline', $landingcontrollview->hero_tagline ?? '')" required="" />
                <x-forms.text-input label="Hero Subtagline" id="hero_subtagline" name="hero_subtagline" type="text" :value="old('hero_subtagline', $landingcontrollview->hero_subtagline ?? '')" required="" />
                <x-forms.text-input label="Hero Button" id="hero_button" name="hero_button" type="text" :value="old('hero_button', $landingcontrollview->hero_button ?? '')" required="" />
                <x-forms.text-input label="Hero Image" id="hero_image" name="hero_image" type="file" :value="old('hero_image', $landingcontrollview->hero_image ?? '')" required="" />
                <div class="space-y-6">
                    <div>
                        <h6 class="font-semibold text-gray-600 mb-2">Preview Hero Image</h6>
                        @if (!empty($landingcontrollview->hero_image))
                            <img src="{{ asset('storage/' . $landingcontrollview->hero_image) }}" alt="Icon" class="object-cover ">
                        @else
                            <div class="w-40 h-40 flex items-center justify-center rounded-lg border border-gray-300 bg-gray-100">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif
                    </div>
                </div>
                <x-forms.text-input label="Proses Title" id="proses_title" name="proses_title" type="text" :value="old('proses_title', $landingcontrollview->proses_title ?? '')" required="" />
                <x-forms.text-input label="Proses Subtitle" id="proses_subtitle" name="proses_subtitle" type="text" :value="old('proses_subtitle', $landingcontrollview->proses_subtitle ?? '')" required="" />
                <x-forms.text-input label="Produk Title" id="produk_title" name="produk_title" type="text" :value="old('produk_title', $landingcontrollview->produk_title ?? '')" required="" />
                <x-forms.text-input label="Produk Subtitle" id="produk_subtitle" name="produk_subtitle" type="text" :value="old('produk_subtitle', $landingcontrollview->produk_subtitle ?? '')" required="" />
                <div class="mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts>
