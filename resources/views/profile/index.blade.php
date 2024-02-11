@extends('layouts.master')
@section('judul','Update Profil')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-7">
      <div class="col-sm-19 col-xl-9">
          <div class="bg-light rounded h-100 p-4">

            <form action="/profile/{{ $detailprofile->id }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" class="form-control"disabled  value="{{ $detailprofile->user->name }}">
                
                </div>

                <div class="form-group">
                  <label>Email User</label>
                  <input type="text" class="form-control"disabled  value="{{ $detailprofile->user->email }}">
                
                </div>
                  
                
                <div class="form-group">
                    <label>Bioadata</label>
                    <textarea type="text" class="form-control @error('bidata') is-invalid @enderror" name="biodata">{{ $detailprofile->biodata }}</textarea>
                    @error('biodata')
                    <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Umur</label>
                    <input type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ $detailprofile->umur }}">
                    @error('umur')
                    <div class="alert alert-danger">{{ $message }} </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ $detailprofile->alamat }}</textarea>
                    @error('alamat')
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

