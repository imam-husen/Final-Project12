@extends('layouts.master')
@section('judul',' Jawaban')

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
            <textarea type="text" class="form-control" name="jawaban" id="ckeditor" placeholder="Masukkan jawaban anda">{{old('jawaban', $jawaban->jawaban)}}</textarea>
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

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('#ckeditor'), {
        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'indent',
            'outdent',
            '|',
            'undo',
            'redo',
            '|',
            'fontSize',
            'fontFamily',
            'fontColor',
            'fontBackgroundColor',
            '|',
            'alignment',
            'insertTable',
            'mediaEmbed',
            'blockQuote',
            'codeBlock',
            'horizontalLine',
            '|',
            'removeFormat',
            'htmlEmbed',
            'undo',
            'redo'
          ]
        },
        language: 'en',
        image: {
          toolbar: [
            'imageTextAlternative',
            '|',
            'imageStyle:full',
            'imageStyle:alignLeft',
            'imageStyle:alignCenter',
            'imageStyle:alignRight'
          ],
          styles: [
            'full',
            'alignLeft',
            'alignCenter',
            'alignRight'
          ]
        },
        table: {
          contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells',
            'tableCellProperties',
            'tableProperties'
          ]
        },
        licenseKey: '',
      })
      .catch(error => {
        console.error(error);
      });
  </script>
@endpush
