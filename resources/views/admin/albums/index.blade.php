@extends('admin.main')

@section('content-admin')
<header class="mb-3">
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
  </a>
</header>

<div class="page-heading">
  <div class="row">
    <div class="col-md-10 mb-4">
      <h3>LIST ALBUM PAGE</h3>
    </div>
    <div class="col-md-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            Data Album
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<div class="page-content">
  <section class="section">
    <div class="card p-4 shadow rounded">
      <div class="card-header fw-bolder d-flex justify-content-between border-bottom">
        <h4>List Albums</h4>
        <a class="btn btn-primary" href="{{url('album/create')}}"><i class="fa-solid fa-plus"></i> Add Album</a>
      </div>
      <div class="card-body mt-5">
        @if(session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>{{session('success')}}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Name Artist</th>
              <th>Release</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $nomor = 1;
            @endphp
            @foreach ($albums as $item)
            <tr>
              <td>{{$nomor++}}</td>
              <td>
                {{$item->title}}
              </td>
              <td>{{$item->id_artist}}</td>
              <td>{{$item->release_date}}</td>
              <td>
                <a href={{url('album/'. $item->slug . '/edit')}} class="btn badge bg-success"><i
                    class="fa-solid fa-pen-to-square"></i></a>
                <form action="album/{{$item->slug}}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn badge bg-danger" role="button"><i class="fa-solid fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>


@endsection