@extends('layouts.master')
@section('judul','Tanya')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-7">
        <div class="col-sm-19 col-xl-9">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Basic Form</h6>

                @auth
                <p>Sedang login sebagai: {{ auth()->user()->name }}</p>
                @endauth
               
<form action="/pertanyaan" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label style="mb-3">Judul Pertanyaan</label><br>
      <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"><br>
      @error('judul')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
      
    </div>
    <div class="form-group">
      <label>Content</label><br>
      <textarea cols="30" rows="10" type="text" class="form-control @error('content') is-invalid @enderror"  name="content" id="ckeditor"></textarea><br>
      @error('content')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
    </div>


  <div class="form-group">
  <label>Kategori Pertanyaan</label><br>
  <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
    <option value="">--Pilih Kategori</option>
    @forelse ($category as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
    @empty
        <option value="">Tidak Ada Kategori</option>
    @endforelse

  </select><br>
  
    @error('category_id')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
 </div>


   <div class="form-group">
      <label>Gambar</label><br>
      <input type="file" class="form-control @error('gambar') is-invalid @enderror"  name="gambar" ><br>
      @error('gambar')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
    </div>
    
    
    <button type="submit" class="btn btn-primary my-3">Submit</button><br>
  </form>

            </div>
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
    
