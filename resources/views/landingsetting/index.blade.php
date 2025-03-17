<x-layouts>
    <div class="flex flex-col md:flex-row gap-6 p-6">
        <!-- Card Kiri (Form Setting) -->
        <div class="w-full md:w-3/5 rounded-2xl p-6">
            <h5 class="text-xl font-semibold mb-4">Landing Setting</h5>
            <form action="{{ route('landingsetting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-forms.text-input required="required" label="Nama Website Singkat" id="shortname" name="shortname" type="text" :value="old('shortname', $landingmain->shortname ?? '')" />
                <x-forms.text-input required="required" label="Nama Website Panjang" id="longname" name="longname" type="text" :value="old('longname', $landingmain->longname ?? '')" />
                <x-forms.select-input required="required" label="Tema Tampilan" id="theme-selector" name="data_theme" :selected="old('data_theme', $landingmain->data_theme ?? '')" />
                <x-forms.text-input required="" label="Logo" id="logo" name="logo" type="file" :value="old('logo', $landingmain->logo ?? '')" />
                <x-forms.text-input required="" label="Icon" id="icon" name="icon" type="file" :value="old('icon', $landingmain->icon ?? '')" />
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

        <!-- Card Kanan (Tampilan Foto) -->
        <div class="w-full md:w-2/5 rounded-2xl p-6 flex flex-col">
            <h5 class="text-xl font-semibold mb-4">Icon Image</h5>
            @if (!empty($landingmain->icon))
                <img src="{{ asset('storage/' . $landingmain->icon) }}" alt="" class="object-cover rounded-lg ">
            @else
                <div class="w-40 h-40 flex items-center justify-center  rounded-lg border">
                    <span class="text-secondary">No Image</span>
                </div>
            @endif
            <h5 class="text-xl font-semibold mb-4">Logo Image</h5>
            @if (!empty($landingmain->icon))
                <img src="{{ asset('storage/' . $landingmain->logo) }}" alt="" class="object-cover rounded-lg ">
            @else
                <div class="w-40 h-40 flex items-center justify-center  rounded-lg border">
                    <span class="text-secondary">No Image</span>
                </div>
            @endif
        </div>
    </div>

    @push('script')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const themes = ["light", "dark", "gourmet", "corporate", "luxury", "soft", "my"];
                const themeSelector = document.getElementById("theme-selector");
                const rootElement = document.documentElement;

                // Load theme from localStorage
                const savedTheme = localStorage.getItem("selected-theme");
                if (savedTheme && themes.includes(savedTheme)) {
                    rootElement.setAttribute("data-theme", savedTheme);
                }

                // Populate dropdown
                themes.forEach(theme => {
                    const option = document.createElement("option");
                    option.value = theme;
                    option.textContent = theme.charAt(0).toUpperCase() + theme.slice(1);
                    if (theme === rootElement.getAttribute("data-theme")) {
                        option.selected = true;
                    }
                    themeSelector.appendChild(option);
                });

                // // Change theme on selection
                // themeSelector.addEventListener("change", function() {
                //     const selectedTheme = this.value;
                //     rootElement.setAttribute("data-theme", selectedTheme);
                //     localStorage.setItem("selected-theme", selectedTheme);
                // });
            });
        </script>
    @endpush
</x-layouts>
