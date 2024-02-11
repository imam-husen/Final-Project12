@extends('layouts.master')

@section('judul','Detail Pertanyaan')
@section('content')
<div class="container-fluid pt-4 px-4">
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
    
</div>

 
    
@endsection