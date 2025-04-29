<link rel="stylesheet" href="{{ asset('plugins/richtexteditor/rte_theme_default.css') }}" />
<div class="grid grid-cols-2 gap-6">
    <div>
        {{-- Judul Blog --}}
        <x-forms.text-input required="required" label="Judul Blog" id="title" name="title" :value="old('title', $blog->title ?? '')" />

        {{-- Slug --}}
        <x-forms.text-input required="required" label="Slug" id="slug" name="slug" :value="old('slug', $blog->slug ?? '')" />

        {{-- Excerpt --}}
        <x-forms.textarea-input required="" label="Ringkasan (Excerpt)" id="excerpt" name="excerpt" :value="old('excerpt', $blog->excerpt ?? '')" />

        {{-- Gambar Utama --}}
        <x-forms.text-input required="" type="file" label="Gambar Utama" id="featured_image" name="featured_image" :value="old('featured_image', $blog->featured_image ?? '')" />

        {{-- Preview Gambar --}}
        <div class="mt-4">
            @if (old('featured_image') || ($blog->featured_image ?? false))
                <img id="image-preview" src="{{ old('featured_image') ? asset('storage/' . old('featured_image')) : asset('storage/' . $blog->featured_image) }}" alt="Preview Gambar" class="w-32 h-32 object-cover rounded">
            @else
                <img id="image-preview" src="#" alt="Preview Gambar" class="w-32 h-32 object-cover rounded hidden">
            @endif
        </div>

        <script>
            function previewImage(event) {
                const imagePreview = document.getElementById('image-preview');
                const file = event.target.files[0];
                if (file) {
                    imagePreview.src = URL.createObjectURL(file);
                    imagePreview.classList.remove('hidden');
                }
            }
            document.getElementById('featured_image').addEventListener('change', previewImage);
        </script>

        {{-- Alt Text Gambar --}}
        <x-forms.text-input required="" label="Alt Text Gambar" id="featured_image_alt" name="featured_image_alt" :value="old('featured_image_alt', $blog->featured_image_alt ?? '')" />

        {{-- SEO Fields --}}
        <x-forms.text-input required="" label="Meta Title" id="meta_title" name="meta_title" :value="old('meta_title', $blog->meta_title ?? '')" />
        <x-forms.textarea-input required="" label="Meta Description" id="meta_description" name="meta_description" :value="old('meta_description', $blog->meta_description ?? '')" />
        <x-forms.text-input required="" label="Meta Keywords" id="meta_keywords" name="meta_keywords" :value="old('meta_keywords', $blog->meta_keywords ?? '')" />
        <x-forms.text-input required="" label="Canonical URL" id="canonical_url" name="canonical_url" :value="old('canonical_url', $blog->canonical_url ?? '')" />
        <x-forms.text-input required="" label="OG Title" id="og_title" name="og_title" :value="old('og_title', $blog->og_title ?? '')" />
        <x-forms.textarea-input required="" label="OG Description" id="og_description" name="og_description" :value="old('og_description', $blog->og_description ?? '')" />
        <x-forms.text-input required="" type="file" label="OG Image" id="og_image" name="og_image" :value="old('og_image', $blog->og_image ?? '')" />
    </div>

    <div>
        {{-- Konten Blog --}}
        {{-- <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" id="text_editor" rows="10">{{ old('content', $blog->content ?? '') }}</textarea>
        </div> --}}
        <x-forms.textarea-input required="" label="Konten" id="text_editor" name="content" :value="old('content', $blog->content ?? '')" />

        {{-- Status Publish --}}
        <div class="mt-4">
            <label for="is_published" class="label label-text">Status Publikasi</label>
            <select name="is_published" id="is_published" class="select" required>
                <option value="1" {{ old('is_published', $blog->is_published ?? '') == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ old('is_published', $blog->is_published ?? '') == 0 ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        {{-- Published At (Optional) --}}
        <x-forms.text-input required="" type="datetime-local" label="Tanggal Publish" id="published_at" name="published_at" :value="old('published_at', isset($blog->published_at) ? $blog->published_at->format('Y-m-d\TH:i') : '')" />

    </div>
</div>
<script type="text/javascript" src="{{ asset('plugins/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/richtexteditor/plugins/all_plugins.js') }}"></script>
<script>
    var config = {};

    config.file_upload_handler = function(file, callback, optionalIndex, optionalFiles) {
        var uploadHandlerPath = "{{ route('image.upload') }}";

        function append(parent, tagname, csstext) {
            var tag = parent.ownerDocument.createElement(tagname);
            if (csstext) tag.style.cssText = csstext;
            parent.appendChild(tag);
            return tag;
        }

        var uploadCancelled = false;
        var dialogOuter = append(document.body, "div", "display:flex;align-items:center;justify-content:center;z-index:999999;position:fixed;left:0px;top:0px;width:100%;height:100%;background-color:rgba(128,128,128,0.5)");
        var dialogInner = append(dialogOuter, "div", "background-color:white;border:solid 1px gray;border-radius:15px;padding:15px;min-width:200px;box-shadow:2px 2px 6px #7777");

        var line1 = append(dialogInner, "div", "text-align:center;font-size:1.2em;margin:0.5em;");
        line1.innerText = "Uploading...";

        var line2 = append(dialogInner, "div", "text-align:center;font-size:1.0em;margin:0.5em;");
        line2.innerText = "0%";

        var progressbar = append(dialogInner, "div", "border:solid 1px gray;margin:0.5em;");
        var progressbg = append(progressbar, "div", "height:12px");

        var line3 = append(dialogInner, "div", "text-align:center;font-size:1.0em;margin:0.5em;");
        var btn = append(line3, "button");
        btn.className = "btn btn-primary";
        btn.innerText = "Cancel";
        btn.onclick = function() {
            uploadCancelled = true;
            xh.abort();
        }

        var xh = new XMLHttpRequest();
        var formData = new FormData();
        formData.append('image', file);
        formData.append('_token', "{{ csrf_token() }}");

        xh.open("POST", uploadHandlerPath, true);
        xh.onload = xh.onabort = xh.onerror = function(pe) {
            dialogOuter.parentNode.removeChild(dialogOuter);
            if (pe.type == "load") {
                if (xh.status != 200) {
                    callback(null, "http-error-" + xh.status);
                } else {
                    var response = JSON.parse(xh.responseText);
                    if (response.url) {
                        callback(response.url);
                    } else {
                        callback(null, "upload-failed");
                    }
                }
            } else if (uploadCancelled) {
                callback(null, "cancelled");
            } else {
                callback(null, pe.type);
            }
        };

        xh.upload.onprogress = function(pe) {
            var percent = Math.floor((pe.loaded / pe.total) * 100);
            line2.innerText = percent + "%";
            progressbg.style.cssText = `background-color:green;width:${percent}%;height:12px;`;
        };

        xh.send(formData);
    };

    var editor1 = new RichTextEditor("#text_editor", config);
</script>
