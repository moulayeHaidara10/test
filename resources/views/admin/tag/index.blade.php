@extends('layouts.admin')


@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Liste des Tags</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('website') }} ">Accueil</a></li>
            <li class="breadcrumb-item active">Liste des Tags</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">Liste des Tags</h3>
                <a href="{{ route('tag.create') }}" class="btn btn-primary">Creer Tag</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nom</th>
                      <th>Slug</th>

                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if($tags->count())
                      @foreach ($tags as $tag)
                      <tr>
                      <td> {{ $tag->id }} </td>
                      <td>{{ $tag->name }}</td>
                      <td>{{ $tag->slug }}</td>

                      <td class="d-flex">
                        <a href="{{ route('tag.edit', [$tag->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                        <form action="{{ route('tag.destroy', [$tag->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                           <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                        </form>


                      </td>
                      @endforeach
                      @else
                      <tr>
                          <td colspan="5">
                              <h5 class="text-center">pas de tags</h5>
                          </td>
                      </tr>
                      @endif
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
