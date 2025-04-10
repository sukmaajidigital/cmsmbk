<x-forms.text-input label="Judul" id="judul" name="judul" type="text" :value="old('judul', $landingproses->judul ?? '')" required="required" />
<x-forms.textarea-input required="" label="Deskripsi" id="deskripsi" name="deskripsi" :value="old('deskripsi', $landingproses->deskripsi ?? '')" />
<x-forms.text-input label="Gambar Proses" id="imageproses" name="imageproses" type="file" :value="old('imageproses', $landingproses->imageproses ?? '')" required="" />
