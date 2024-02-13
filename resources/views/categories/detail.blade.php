@extends('layouts.master')
@section('judul','Category Pertanyaan')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-3 g-lg-4">
        @forelse ($category->pertanyaan as $item)
        <div class="col-md-6 col-lg-4">
            <div class="card my-2">
                <img src="{{ asset('/image/'.$item->gambar) }}" style="height:200px" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="/pertanyaan/{{ $item->id }}">
                        <p class="card-title">{{ $item->judul}}</p>
                    </a>
                    <div class="badge bg-secondary text-wrap" style="width: 6rem;">
                        {{ $item->category->nama }}
                    </div><br>
                    <p class="text-secondary"> Pembuat : {{ $item->user->name }}</p>

                    @auth
                        @if(auth()->user()->id === $item->users_id)
                            <div class="row my-4 mx-3">
                                <div class="col">
                                    <a href="/pertanyaan/{{ $item->id }}/edit"
                                        class="btn btn-info btn-sm w-100 m-2 rounded-pill">Edit</a>
                                </div>
                                <div class="col">
                                    <form action="/pertanyaan/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-info btn-sm w-100 m-2 rounded-pill">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <h3>Tidak Ada Pertanyaan</h3>
        </div>
        @endforelse
    </div>
</div>

@endsection
