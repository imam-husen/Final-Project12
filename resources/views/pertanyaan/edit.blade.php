@extends('layouts.master')
@section('Judul','Edit Pertanyaan')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-7">
        <div class="col-sm-19 col-xl-9">
            <div class="bg-light rounded h-100 p-4">


<form action="/pertanyaan/{{ $pertanyaanbyId->id }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('put')
    <div class="form-group">
      <label>Judul Pertanyaan</label><br>
      <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ $pertanyaanbyId->judul }}"><br>
      @error('judul')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
      
    </div>
    <div class="form-group">
      <label>Content Pertanyaan</label><br>
      <textarea class="form-control @error('content') is-invalid @enderror" name="content">{{ $pertanyaanbyId->content }}</textarea><br>
      @error('content')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
    </div>


  <div class="form-group">
  <label>Kategori Pertanyaan</label><br>
  <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
    <option value="">--Pilih Kategori</option>
    @forelse ($category as $item)
    @if ($item->id === $pertanyaanbyId->category_id)
    <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
    @else
    <option value="{{ $item->id }}">{{ $item->nama }}</option>
    @endif
        
    @empty
    
    @endforelse

  </select><br>
  
    @error('category_id')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
 </div>


   <div class="form-group">
      <label>Gambar Pertanyaan</label><br>
      <input type="file" class="form-control @error('gambar') is-invalid @enderror"  name="gambar" >
      @error('gambar')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary my-3">Submit</button>
  </form>

            </div>
        </div>
    </div>
</div>

    
@endsection
    
