@extends('layouts.admin')


@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Modifier Article</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('website') }} ">Accueil</a></li>
            <li class="breadcrumb-item active"><a href=" {{ route('article.index') }} ">Creer Categorie</li>
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
                  <h3 class="card-title">Modifier Article - {{ $article->name }} </h3>
                <a href="{{ route('article.index') }}" class="btn btn-primary">Liste Article</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-10 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <form action="{{ route('article.update', [$article->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @include('includes.errors')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Titre</label>
                                <input type="text" class="form-control" name="titre" value="{{ $article->titre }}" id="exampleInputEmail1" placeholder="Entrer le titre">
                                </div>

                                <div class="form-group">
                                  <label for="category">Selectionner la Categorie</label>
                                  <select name="category" id="category" class="form-control" {{ old('category') }}>
                                      <option value="">selectionner la categorie</option>
                                      @foreach($categories as $c)
                                  <option value="{{ $c->id }}" @if($article->category_id == $c->id) selected @endif> {{ $c->name }} </option>
                                  @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-8">
                                      <label class="custom-file-label" for="customFile">Image</label>
                                      <input type="file" class="custom-file-input" name="image" id="image">
                                    </div>
                                    <div class="col-4">
                                      <div style="max-width: 100px; max-height: 300px; overflow:hidden;margin-left: auto">
                                        <img src="{{ $article->image }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Paragraphe</label>
                                  <textarea name="details" id="details"  rows="10" class="form-control">{{ $article->details }}</textarea>
                                </div>
                                <div class="form-group">

                                  <select name="publier" id="publier" class="form-control" {{ old('publier') }}>
                                      @foreach(["0" => "publier", "1" => "brouillon"] AS $id => $publier)
                                      <option value="{{ $id }}" @if($article->category_id == $c->id) selected @endif>{{ $publier }}</option>
                                  @endforeach
                                  </select>
                                </div>

                            <div class="form-group">
                              <button type="submit" class="btn btn-lg btn-primary">Modifier article</button>
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
