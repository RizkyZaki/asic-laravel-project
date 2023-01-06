@extends('admin.main')

@section('content-admin')
<header class="mb-3">
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
  </a>
</header>

<div class="page-content">
  <section class="section">
    <h4 class="mt-3">Detail Song</h4>
    <hr>
    <div class="row mt-5">
      <div class="col-md-4">
        <img src="{{asset('storage/'. $song->album->cover)}}" class="img-fluid" alt="">
      </div>
      <div class="col-md-4">
        <h3>{{$song->title}}</h3>
        <p>{{$song->artist->name}}</p>
      </div>
      <div class="col-md-4">
        <h5>Release Date</h5>
        <p>{{$song->album->release_date}}</p>
      </div>
    </div>
    <h4 class="mt-3">Lyrics</h4>
    <div class="mt-4">
      {!!$song->lyrics!!}
    </div>
    <hr>
    <h4 class="mt-3">
      Credits
    </h4>
    <div class="mt-4">
      <p>{!!$song->credits!!}</p>
    </div>
  </section>

</div>


@endsection