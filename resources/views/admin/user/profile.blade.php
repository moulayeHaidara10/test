@extends('layouts.admin')


@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Profil utilisateur</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('website') }} ">Accueil</a></li>
            <li class="breadcrumb-item active"><a href=" {{ route('user.index') }} ">Profil utilisateur</li>
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
                  <h3 class="card-title">Profil utilisateur</h3>
                <a href="{{ route('user.index') }}" class="btn btn-primary">Liste utilisateur</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-12 col-lg-9 ">
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('includes.errors')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nom</label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $user->name }}" placeholder="Entrer le Nom">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{ $user->email }}" placeholder="Entrer votre Email">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputpassword1">Mot de Passe <small class="text-info">Entrer que si vous voulez changer de mot de passe</small> </label>
                                            <input type="password" class="form-control" name="password" id="exampleInputEmail1"  placeholder="Entrer votre mot de passe">
                                          </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="image">image utilisateur</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="">Upload</span>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="description">Description</label>
                                          <textarea name="description" value="{{ $user->description }}" id="description" rows="5" class="form-control"></textarea>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{ asset($user->image) }}" alt="" class="img-fluid img-rounded">
                                            <h5> {{$user->name }} </h5>
                                            <p> {{ $user->email }} </p>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-lg btn-primary">Modifier Profile</button>
                            </div>
                          </form>
                    </div>

              </div>
          </div>
        </div>
    </div>
</div>
@endsection
