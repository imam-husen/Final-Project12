@extends('layouts.master')

@section('judul','Detail Pertanyaan')





@section('content')
{{-- <div class="container-fluid pt-4 px-4">
    <div class="row g-7">
        <div class="col-sm-19 col-xl-20">
            <div class="bg-light rounded h-100 p-4">
<h6>{{ $pertanyaanbyId->judul }}</h6>
 <img src="{{asset('/image/' .$pertanyaanbyId->gambar) }}" alt="" srcset="" class="rounded mx-auto d-block my-3" style="height:200px" class="card-img-top">
 <p>{{ $pertanyaanbyId->content }}</p>
 

    <hr>
    <h4>List Jawaban</h4>

    <hr>

    <form action="/jawaban" method="post">
        @csrf
        <textarea name="jawaban"  cols="30" rows="10" class="form-control my-3" placeholder="isi komentar"></textarea>
        @error('jawaban')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        <input type="submit"  class="btn btn-success btn-sm" value="jawaban">

    </form>
    <div class="d-grid gap-2">
        <a href="/pertanyaan" class="btn btn-info btn-sm btn-block my-4">Kembali</a>
      </div>
    

    
            </div>
            
        </div>
    </div>
    
</div> --}}

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$pertanyaanbyId->judul}}</h4>
        <h6 class="card-text">Ditulis oleh : {{$pertanyaanbyId->user->name}}</h6>
        <p class="card-text"><small class="text-muted">{{$pertanyaanbyId->created_at->diffForHumans()}}</small></p>
        <img src="{{asset('/image/' .$pertanyaanbyId->gambar) }}" alt="" srcset="" class="rounded mx-auto d-block my-3" style="height:200px" class="card-img-top">
        <p class="card-description">
            {!!$pertanyaanbyId->content!!}
        </p><br><br>

<a href="/pertanyaan" class="btn btn-secondary btn-sm">Kembali</a>
      </div>
    </div>
</div>

<h3 class="m-4">Jawaban</h3>
@forelse ($pertanyaanbyId->jawaban as $item)
    <div class="col-lg-12 stretch-card my-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title d-inline-block">{{$item->user->name}}</h4>
            
        <p class="card-text"><small class="text-muted">{{$item->created_at->diffForHumans()}}</small></p>
        <p class="card-description">
            {!!Str::limit($item->jawaban, 700)!!}
        </p>
        @if ($item->gambar !== null)
        <img src="{{asset('images/jawaban/'. $item->gambar)}}" style="height: 100px" alt=""><br>
        @endif
        
        
        
        @auth
        <div class="row my-4">
          <div class="col-auto">
              <a href="/jawaban/{{$item->id}}" class="btn btn-info">Detail</a>
          </div>
            @if(auth()->user()->id === $item->users_id)
                    <div class="col-auto">
                        <a href="/jawaban/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
                    </div>
                    <div class="col-auto">
                        <form action="/jawaban/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-info">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @endauth
            
        
        
      </div>
    </div>
</div>
    
@empty
<h4 class="m-4 text-muted">Belum Ada Jawaban</h4>
@endforelse

<hr>
@auth
    <h3 class="m-4">Beri Jawaban</h3>
    <form action="/jawaban" method="POST" enctype="multipart/form-data" class="m-4">
        @csrf
        <input type="hidden" value="{{$pertanyaanbyId->id}}" name="pertanyaan_id" >
        <div class="form-group">
            <textarea type="text"  class="form-control" name="jawaban" id="ckeditor" placeholder="Masukkan jawaban anda"></textarea>
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
        <button type="submit" class="btn btn-primary my-3">Tambah Jawaban</button>

        
    </form>

@endauth
    
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
