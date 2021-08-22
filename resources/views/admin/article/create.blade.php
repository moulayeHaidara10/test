@extends('layouts.admin')


@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Creer Article</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('website') }} ">Accueil</a></li>
            <li class="breadcrumb-item active"><a href=" {{ route('article.index') }} ">Creer Article</li>
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
                  <h3 class="card-title">Creer Article</h3>
                <a href="{{ route('article.index') }}" class="btn btn-primary">Liste Articles</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-10 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('includes.errors')
                              <div class="form-group">
                                <label for="exampleInputEmail1">Titre</label>
                              <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="exampleInputEmail1" placeholder="Entrer le titre">
                              </div>

                              <div class="form-group">
                                <label for="category">Selectionner la Categorie</label>
                                <select name="category" id="category" class="form-control" {{ old('category') }}>
                                    <option value="">selectionner la categorie</option>
                                @foreach($categories as $c)
                                <option value="{{ $c->id }}"> {{ $c->name }} </option>
                                @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-8">
                                    <label class="custom-file-label" for="customFile">Image</label>
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group d-flex flex-wrap">
                                @foreach($tags as $tag)
                                <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{ $tag->id}}" value="{{ $tag->id  }}">
                                <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                              </div>
                              @endforeach
                            </div>
                            <div class="form-group d-flex flex-wrap">
                                @foreach($artistes as $artiste)
                                <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                <input class="custom-control-input" type="checkbox" name="artistes[]" id="artiste{{ $artiste->id}}" value="{{ $artiste->id  }}">
                                <label for="artiste{{ $artiste->id}}" class="custom-control-label">{{ $artiste->name }}</label>
                              </div>
                              @endforeach
                            </div>
                              <div class="form-group">

                                <label for="exampleInputEmail1">Paragraphe</label>
                                <textarea name="details" id="details"  rows="4" class="form-control">{{ old('details') }}</textarea>
                              </div>
                              <div class="form-group">
                                <select name="publier" id="publier" class="form-control" {{ old('publier') }}>
                                    @foreach(["0" => "publier", "1" => "brouillon"] AS $id => $publier)
                                    <option value="{{ $id }}">{{ $publier }}</option>
                                @endforeach
                                </select>
                              </div>

                             <div class="card-footer">
                              <button type="submit" class="btn btn-lg btn-primary">Ajouter</button>
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
            placeholder: 'Votre paragraphe ici ',
            tabsize: 2,
            height: 300
          });
        </script>
        <script>


$(document).ready(function(){
    $("#publier").DataTable()
});
$(function(){
    $('.toggle-class').change(function() {
        var statut = $(this).prop('checked') == true ? 1 : 0;
        var article_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatut',
            data: {'statut': staus, 'article_id': article_id},
            success: function(data){
                console.log('Success')
            }
        });
    });
});



            </script>
@endsection

