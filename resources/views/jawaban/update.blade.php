@extends('layouts.master')
@section('judul',' Jawaban')

{{-- @push('scripts')
<script src="https://cdn.tiny.cloud/1/pb39zbievsbpi66gbhsbo3z5qvbdwk91raxpxr8ck0n9kduq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
  });
</script>
@endpush --}}
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Halaman Edit Jawaban</h4>
        <p class="card-description">
            Edit Jawaban Untuk Pertanyaan <strong>{{$jawaban->pertanyaan->judul}}</strong> 
        </p>
    <form action="/jawaban/{{$jawaban->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" value="{{$jawaban->pertanyaan->id}}" name="pertanyaan_id" >
        <div class="form-group">
            <textarea type="text" class="form-control" name="jawaban" placeholder="Masukkan jawaban anda">{{old('jawaban', $jawaban->jawaban)}}</textarea>
            @error('jawaban')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Gambar</label>
            <input type="file" class="form-control" name="gambar" placeholder="Silakan pilih salah satu gambar">
        </div>
            @error('gambar')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        <button type="submit" class="btn btn-primary">Update Jawaban</button>
    </form>
</div>
    </div>
</div>
@endsection
