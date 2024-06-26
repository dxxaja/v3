@extends('layouts.app')

@section('content')

<section class="py-5 text-center container">
    <div class="row py-lg-5 shad">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light" style="color: #F9E8C9">{{$album->name}}</h1>
            <p class="lead text" style="color: #F9E8C9">{{$album->description}}</p>
            <p>
                <a href="/photo/upload/{{$album->id}}" class="btn btn-primary my-2">Upload Photo</a>
                <a href="/albums/" class="btn btn-secondary my-2">Back</a>
            </p>
        </div>
    </div>
</section>

@if (count($album->photos) > 0)
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($album->photos as $photo)
    <div class="col">
        <div class="shadow">
            <div class="card" style="background-color: #98ABEE">
                <img src="/storage/albums/{{$album->id}}/{{$photo->photo}}" height="250px" class="card-img-top" alt="photo Image">
                <div class="card-body">
                    <h5 class="card-title">{{$photo->title}}</h5>
                    <p class="card-text">{{$photo->description}}</p>
                    <form id="like-form-{{$photo->id}}" method="POST" action="{{ route('likes.toggle', $photo->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm card-text float-end">❤</button>
                    </form>
                    <a href="{{route('photos.show' , $photo->id)}}" class="btn btn-primary float-start">View</a>
                </div>
                <!-- Form Komentar -->
                <form class="card-footer" method="POST" action="{{ route('comments.store', $photo->id) }}" >
                    @csrf
                    <div class="input-group">
                        <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
                        <button type="submit" class="btn btn-success">Comment</button>
                    </div>
                </form>
                <!-- Daftar Komentar -->
                <div class="list-group list-group-flush" >
                    @foreach ($photo->photoComments as $comment)
                        <div class="list-group-item"style="background-color: #98ABEE">
                            <h6 class="list-group-item-heading"><strong>{{ $comment->user->name }}</strong> <span class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</span></h6>
                            <p class="list-group-item-text">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@else
<p>No photos to display</p>
@endif

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Saat dokumen dimuat, periksa apakah pengguna telah memberikan "like" pada setiap foto
        @foreach($album->photos as $photo)
        $.ajax({
            url: "{{ route('likes.check', $photo->id) }}",
            type: "GET",
            success: function(response) {
                if (response.liked) {
                    // Jika sudah dilike, sembunyikan tombol Like
                    $('#like-form-{{$photo->id}}').hide();
                }
            }
        });
        @endforeach

        // Event handler untuk form Like
        $('form[id^="like-form"]').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default
            var form = $(this);
            var url = form.attr('action');

            // Kirim permintaan AJAX
            $.ajax({
                url: url,
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    // Tampilkan pesan dari respons
                    alert(response.message);

                    // Perbarui tampilan tombol
                    form.hide();
                    form.siblings('.unlike-form').show();
                },
                error: function(xhr) {
                    // Tangani kesalahan
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });

        // Event handler untuk form Unlike
        $('form[id^="unlike-form"]').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara default
            var form = $(this);
            var url = form.attr('action');

            // Kirim permintaan AJAX
            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize(),
                success: function(response) {
                    // Tampilkan pesan dari respons
                    alert(response.message);

                    // Perbarui tampilan tombol
                    form.hide();
                    form.siblings('.like-form').show();
                },
                error: function(xhr) {
                    // Tangani kesalahan
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
