@extends('layouts.master')
@section('judul', 'Halaman Pertanyaan')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-light rounded p-4">

                @auth
                <a href="/pertanyaan/create" class="btn btn-info btn-sm my-3 rounded-pill">Tanya</a>
                @endauth

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @forelse ($pertanyaan as $item)
                    <div class="col">
                        <div class="card my-2">
                            <img src="{{ asset('/image/'.$item->gambar) }}" style="height:200px" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <a href="/pertanyaan/{{ $item->id }}" title="{{ $item->judul }}"
                                    style="display: block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                    <p class="card-text">{{ $item->judul }}</p>
                                </a>

                                <div class="badge bg-secondary text-truncate" style="width: 6rem; display: inline-block;">
                                    {{ $item->category->nama }}
                                </div>

                                <p class="text-secondary text-truncate">Pembuat: {{ $item->user->name }}</p>

                                @auth
                                    @if(auth()->user()->id === $item->users_id)
                                        <div class="row my-3">
                                            <div class="col-6">
                                                <a href="/pertanyaan/{{ $item->id }}/edit"
                                                    class="btn btn-info btn-sm  btn-block w-100 ">Edit</a>
                                            </div>
                                            <div class="col-6">
                                                <form action="/pertanyaan/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-info btn-sm btn-block w-100">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    @empty
                    <h3 class="col-md-12 text-center">Tidak Ada Pertanyaan</h3>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
