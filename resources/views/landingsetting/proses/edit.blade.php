<form class="" action="{{ route('landingsetting.updateproses', $landingproses->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('landingsetting.proses.form')
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
