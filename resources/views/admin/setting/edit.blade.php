@extends('layouts.admin')


@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Modifier setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('website') }} ">Accueil</a></li>
            <li class="breadcrumb-item active"><a href="  ">Creer Categorie</li>
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
                  <h3 class="card-title">Modifier Setting -  </h3>
                <a href="" class="btn btn-primary">Liste setting</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-10 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="card-body">
                                @include('includes.errors')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">nom</label>
                                <input type="text" class="form-control" name="nom" value="{{ $setting->nom }}" id="exampleInputEmail1" placeholder="Entrer le nom">
                                </div>

                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-8">
                                      <label class="custom-file-label" for="logo">Logo</label>
                                      <input type="file" class="custom-file-input" name="logo" id="logo">
                                    </div>
                                    <div class="col-4">
                                      <div style="max-width: 100px; max-height: 300px; overflow:hidden;margin-left: auto">
                                        <img src="{{ $setting->logo }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                  <input type="facebook" class="form-control" name="facebook" value="{{ $setting->facebook }}"  placeholder="Url facebook">
                                  </div>
                                  <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                  <input type="twitter" class="form-control" name="twitter" value="{{ $setting->twitter }}"  placeholder="Entrer le titre">
                                  </div>
                                  <div class="form-group">
                                    <label for="Instagram">Instagram</label>
                                  <input type="Instagram" class="form-control" name="instagram" value="{{ $setting->instagram }}"  placeholder="Entrer le titre">
                                  </div>
                                  <div class="form-group">
                                    <label for="Whatsapp">Whatsapp</label>
                                  <input type="Whatsapp" class="form-control" name="Whatsapp" value="{{ $setting->whatsapp }}"  placeholder="Entrer le titre">
                                  </div>
                                  <div class="form-group">
                                    <label for="copyright">copyright</label>
                                  <input type="copyright" class="form-control" name="copyright" value="{{ $setting->copyright }}"  placeholder="Entrer le titre">
                                  </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Description</label>
                                  <textarea name="description" id="details"  rows="10" class="form-control">{{ $setting->description }}</textarea>
                                </div>

                            <div class="form-group">
                              <button type="submit" class="btn btn-lg btn-primary">Modifier setting</button>
                            </div>
                          </form>
                    </div>
                <table class="table table-striped">

                </table>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('style')

<link rel="stylesheet" href="{{asset('/admin/css/summernote-bs4.min.css')}}">
@endsection

@section('script')

        <script src="{{asset('/admin/js/summernote-bs4.min.js')}}"></script>

        <script>
          $('#details').summernote({
            placeholder: 'Votre paragraphe cici',
            tabsize: 2,
            height: 100
          });
        </script>
@endsection
