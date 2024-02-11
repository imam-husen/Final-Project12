@extends('layouts.master')
@section('judul',' Categories')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-7">
      <div class="col-sm-19 col-xl-9">
          <div class="bg-light rounded h-100 p-4">

<a href="/categories/create" class="btn btn-primary btn-sm my-2">Tambah Categories</a>

<!-- Tambahkan form pencarian di atas tabel -->
<form action="{{ route('categories.index') }}" method="GET" class="form-inline mb-3">
  <div class="input-group my-2">
    <input type="text" class="form-control" name="search" placeholder="Cari Kategori" value="{{ $search }}">
    <button type="submit" class="btn btn-primary">Cari</button>
  </div>
 
</form>

<table class="table my-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
        
      </tr>
    </thead>
    @forelse ($category as $keys => $item)
    <tr>
        <th scope="row">{{ $keys + $category->firstItem()}}</th>
        <td>{{ $item->nama }}</td>
        <td>
            
            <form action="/categories/{{ $item->id }}" method="post">
                @method('delete')
                @csrf
                <a href="/categories/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
            
                <a href="/categories/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Update</a>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button> 
            
                
                
            </form>
        </td>
       
      </tr>
       
    @empty
        <td>Daftar Data Categories Kosong</td>
    @endforelse
    
  </table>
  {{ $category->links() }}

          </div>
      </div>
  </div>
</div>


@endsection