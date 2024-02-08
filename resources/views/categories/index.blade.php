@extends('layouts.master')
@section('judul',' Categories')

@section('content')


<a href="/categories/create" class="btn btn-primary btn-sm my-2">Tambah Categories</a>

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
        <th scope="row">{{ $keys + 1 }}</th>
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
        <td>Daftar Data Cast Kosong</td>
    @endforelse
    <tbody>
      
      
    </tbody>
  </table>

@endsection