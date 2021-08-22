@extends('layouts.admin')


@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Voir Article</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('website') }} ">Accueil</a></li>
            <li class="breadcrumb-item active"><a href=" {{ route('article.index') }} ">Liste Article</li>
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

                <a href="{{ route('article.index') }}" class="btn btn-primary">Liste Article</a>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-bordered table-primary">
                    <tbody>
                        <tr>
                            <td style="max-width: 200px">Image</td>
                            <td>
                                <div style="max-width: 300px; max-height: 300px; overflow:hidden">
                                    <img src="{{ asset($article->image) }}" class="img-fluid" alt="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="max-width: 200px">Titre</td>
                            <td> {{ $article->titre }} </td>
                        </tr>
                        <tr>
                            <td style="max-width: 200px">Paragraphe</td>
                            <td> {!! $article->details !!} </td>
                        </tr>
                        <tr>
                            <td style="max-width: 200px">Categorie</td>
                            <td> {{ $article->category->name }} </td>
                        </tr>
                        <tr>
                            <td style="max-width: 200px">Auteur</td>
                            <td> {{ $article->user->name }}  </td>
                        </tr>
                        <tr>
                            <td style="max-width: 200px">Tags</td>
                            <td>
                                @foreach($article->tags as $tag)
                               <span class="badge badge-primary">
                                   {{ $tag->name }} </span>
                               @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="max-width: 200px">Artistes</td>
                            <td>
                                <td></td>
                            </td>
                        </tr>
                        <tr>
                            <td style="max-width: 200px">Titre</td>
                            <td> {{ $article->titre }} </td>
                        </tr>



                    </tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
