<x-layouts>
    <div class="flex flex-col md:flex-row gap-6 p-6">
        <!-- Form Setting -->
        <div class="w-full md:w-3/5  rounded-2xl p-6">
            <h5 class="text-2xl font-bold text-gray-700 mb-4">Main Setting</h5>
            <form action="{{ route('landingsetting.updatemain') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <x-forms.text-input label="Nama Website Singkat" id="shortname" name="shortname" type="text" :value="old('shortname', $landingmain->shortname ?? '')" required="" />
                <x-forms.text-input label="Nama Website Panjang" id="longname" name="longname" type="text" :value="old('longname', $landingmain->longname ?? '')" required="" />
                <x-forms.select-input label="Tema Tampilan" id="theme-selector" name="data_theme" :selected="old('data_theme', $landingmain->data_theme ?? '')" required="" />
                <x-forms.text-input label="Logo" id="logo" name="logo" type="file" :value="old('logo', $landingmain->logo ?? '')" required="" />
                <x-forms.text-input label="Icon" id="icon" name="icon" type="file" :value="old('icon', $landingmain->icon ?? '')" required="" />
                <div class="mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update</button>
                </div>
            </form>
        </div>

        <!-- Tampilan Foto -->
        <div class="w-full md:w-2/5  rounded-2xl p-6">
            <h5 class="text-2xl font-bold text-gray-700 mb-4">Preview</h5>
            <div class="space-y-6">
                <div>
                    <h6 class="font-semibold text-gray-600 mb-2">Icon Image</h6>
                    @if (!empty($landingmain->icon))
                        <img src="{{ asset('storage/' . $landingmain->icon) }}" alt="Icon" class="object-cover ">
                    @else
                        <div class="w-40 h-40 flex items-center justify-center rounded-lg border border-gray-300 bg-gray-100">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                </div>
                <div>
                    <h6 class="font-semibold text-gray-600 mb-2">Logo Image</h6>
                    @if (!empty($landingmain->logo))
                        <img src="{{ asset('storage/' . $landingmain->logo) }}" alt="Logo" class="object-cover ">
                    @else
                        <div class="w-40 h-40 flex items-center justify-center rounded-lg border border-gray-300 bg-gray-100">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    {{-- <div class="flex flex-col md:flex-row gap-6 p-6">
        <div class="w-full md:w-2/5  rounded-2xl p-6">
            <div class="mockup-phone-display rounded-lg overflow-hidden border border-gray-300">
                <iframe src="{{ route('landing.homepage') }}" class="w-full h-[500px] border-none"></iframe>
            </div>
        </div>
        <div class="w-full md:w-3/5  rounded-2xl p-6">
            <div class="mockup-browser border border-gray-300 rounded-lg overflow-hidden">
                <div class="mockup-browser-toolbar bg-gray-200 p-2 text-gray-600 text-sm font-medium">
                    https://{{ $landingmain->shortname }}.com
                </div>
                <iframe src="{{ route('landing.homepage') }}" class="w-full h-[500px] border-none"></iframe>
            </div>
        </div>
    </div> --}}


    @push('script')
        <script type="text/javascript" src="{{ asset('custom/theme.js') }}"></script>
    @endpush
</x-layouts>
