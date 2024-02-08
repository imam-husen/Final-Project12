@extends('layouts.master')
@section('judul','Tambah Categories')

@section('content')
<form action="/categories" method="POST">
  @csrf
    <div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama">
      @error('nama')
      <div class="alert alert-danger">{{ $message }} </div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary my-3">Submit</button>

</form>

@endsection