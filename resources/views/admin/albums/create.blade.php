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
            Add Album
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
        <h4>Add Album</h4>
      </div>
      <div class="card-body mt-5">
        <form action="{{url('album')}}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1" class="form-label">Release Date</label>
            <input class="form-control @error('release_date') is-invalid @enderror" type="date" id="formFile"
              name="release_date" value="{{old('release_date')}}" />
            @error('release_date')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description about the Album</label>
            <input type="hidden" name="description" id="description" value="{{old('description')}}">
            <trix-editor input="description"></trix-editor>
            @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Total Track</label>
            <input type="number" class="form-control @error('total_track') is-invalid @enderror" id="exampleInputEmail1"
              aria-describedby="emailHelp" name="total_track" value="{{old('total_track')}}">
            @error('total_track')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cover album</label>
            <input type="file" class="form-control @error('cover') is-invalid @enderror" id="exampleInputEmail1"
              aria-describedby="emailHelp" name="cover" value="{{old('cover')}}">
            @error('cover')
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