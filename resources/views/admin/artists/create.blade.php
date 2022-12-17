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
          <li class="breadcrumb-item"><a href="{{url('artist')}}">listData</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Add Artist
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
        <h4>Add Artists</h4>
      </div>
      <div class="card-body mt-5">
        <form action="{{url('artist')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name Artists</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
              aria-describedby="emailHelp" name="name" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Photo</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image"
              value="{{old('image')}}" />
            @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description about the artist</label>
            <input type="hidden" name="about" id="about" value="{{old('about')}}">
            <trix-editor input="about"></trix-editor>
            @error('about')
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