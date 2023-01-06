@extends('admin.main')

@section('content-admin')
<header class="mb-3">
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
  </a>
</header>

<div class="page-heading">
  <div class="row">
    <div class="col-md-9">
      <h3>Form Add Data</h3>
    </div>
    <div class="col-md-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('album')}}">listData</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Add Song
          </li>
        </ol>
      </nav>
    </div>
  </div>

</div>
<div class="page-content">
  <section class="section">
    <div class="card p-4 shadow rounded">
      <div class="card-header fw-bolder border-bottom">
        <h4>Add Song</h4>
      </div>
      <div class="card-body mt-5">
        <form action="{{url('song')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="category">Artist</label>
            <select class="form-select @error('id_artist') is-invalid @enderror" id="inputGroupSelect01"
              name="id_artist">
              @foreach ($artist as $a)
              <option value="{{$a->id}}">{{ $a->name}}</option>
              @endforeach
            </select>
            @error('id_artist')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="category">Album</label>
            <select class="form-select @error('id_album') is-invalid @enderror" id="inputGroupSelect02" name="id_album">
              @foreach ($album as $ab)
              <option value="{{$ab->id}}">{{ $ab->title}}</option>
              @endforeach
            </select>
            @error('id_album')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
              aria-describedby="emailHelp" name="title" value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Duration</label>
            <input class="form-control @error('duration') is-invalid @enderror" type="text" id="formFile"
              name="duration" value="{{old('duration')}}" />
            @error('duration')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Credits</label>
            <input type="hidden" name="credits" id="credits" value="{{old('credits')}}">
            <trix-editor input="credits" class="@error('credits') is-invalid @enderror"></trix-editor>
            @error('credits')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lyrics</label>
            <input type="hidden" name="lyrics" id="lyrics" value="{{old('lyrics')}}">
            <trix-editor input="lyrics" class="@error('lyrics') is-invalid @enderror"></trix-editor>
            @error('lyrics')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add</button>
        </form>
      </div>
    </div>
  </section>
</div>

@endsection