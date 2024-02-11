@extends('layouts.master')
@section('judul','Update Categories')

@section('content')

<form action="/categories/{{ $categoriesbyId->id }}" method="POST">
    @method('put')
  @csrf
    <div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $categoriesbyId->nama}}">
      @error('nama')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
      
    </div>
    <button type="submit" class="btn btn-primary my-3">Submit</button>
</form>


@endsection