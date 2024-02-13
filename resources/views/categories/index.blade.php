@extends('layouts.master')
@section('judul',' Categories')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-7">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="bg-light rounded h-100 p-4">

                <a href="/categories/create" class="btn btn-primary btn-sm my-2">Tambah Categories</a>

                <!-- Tambahkan form pencarian di atas tabel -->
                <form action="{{ route('categories.index') }}" method="GET" class="form-inline mb-3">
                    <div class="input-group my-2">
                        <input type="text" class="form-control" name="search" placeholder="Cari Kategori"
                            value="{{ $search }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>

                <div class="table-responsive">
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
                            <td class="d-flex">

                                <form action="/categories/{{ $item->id }}" method="post" class="d-flex">
                                    @method('delete')
                                    @csrf
                                    <a href="/categories/{{ $item->id }}" class="btn btn-info btn-sm me-1">Detail</a>

                                    <a href="/categories/{{ $item->id }}/edit"
                                        class="btn btn-warning btn-sm me-1">Update</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                </form>
                            </td>

                        </tr>

                        @empty
                        <td>Daftar Data Categories Kosong</td>
                        @endforelse

                    </table>
                </div>
                {{ $category->links() }}

            </div>
        </div>
    </div>
</div>


@endsection
