@extends('layouts.master')
@section('judul',' Jawaban')

@section('content')
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-inline-block">{{$jawaban->pertanyaan->judul}}</h4>

            <h6 class="card-text">Jawaban oleh : {{$jawaban->user->name}}</h6>
            <p class="card-text"><small class="text-muted">{{$jawaban->created_at->diffForHumans()}}</small></p>
            <p class="card-description">
                {!!$jawaban->jawaban!!}
            </p>
            @if ($jawaban->gambar !== null)
                <img src="{{asset('images/jawaban/'. $jawaban->gambar)}}" class="img-fluid" style="max-width: 100%;" alt=""><br><br>
            @endif

            @auth
                @if(auth()->user()->id === $jawaban->users_id)
                    <div class="row my-4">
                        <div class="col-auto">
                            <a href="/jawaban/{{ $jawaban->id }}/edit" class="btn btn-info">Edit</a>
                        </div>
                        <div class="col-auto">
                            <form action="/jawaban/{{ $jawaban->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-info">Delete</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endauth
            <a href="/pertanyaan/{{$jawaban->pertanyaan->id}}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>
</div>
@endsection
