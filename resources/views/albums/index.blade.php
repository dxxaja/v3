@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center" style="color: #F9E8C9">
        <strong>My Memory</strong>
    </h1>
    <section class="py-5 text-center">
        <div class="d-grid gap-2 col-6 mx-auto">
            <a class="btn btn-primary" href="/albums/create">Make New Album</a>
        </div>
    </section>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($albums as $album)
        <div class="col">
            <div class="card shadow" style="background-color: #98ABEE">
                <img src="/storage/album_covers/{{$album->cover_image}}" class="card-img-top" alt="Album Image">
                <div class="card-body">
                    <h5 class="card-title">{{$album->name}}</h5>
                    <p class="card-text">{{$album->description}}</p>
                    <a href="{{route('albums.show' , $album->id)}}" class="btn btn-primary">View</a>
                    <form method="POST" action="{{ route('albums.destroy', $album->id) }}" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-between mt-4">
        <p> <strong>Showing {{ $albums->firstItem() }} - {{ $albums->lastItem() }} of {{ $albums->total() }} results </strong></p>
        {{ $albums->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
