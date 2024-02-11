@extends('layouts.master')
@section('judul','Tambah Categories')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-7">
      <div class="col-sm-19 col-xl-9">
          <div class="bg-light rounded h-100 p-4">
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
          </div>
      </div>
  </div>
</div>


@endsection