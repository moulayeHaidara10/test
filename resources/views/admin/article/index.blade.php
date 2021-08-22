@extends('layouts.admin')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('script')
<script
  src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
$(function() {
        $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
})

$('.toggle-class').on('change', function() {
    var status = $(this).prop('checked') == true ? 1 : 0;
    alert(status);
    var user_id = $(this).data('id');
    alert(user_id);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{ route('changeArticleStatus') }}',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection

@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Liste Articles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="  ">Accueil</a></li>
            <li class="breadcrumb-item active">Liste Articles</li>
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
                  <h3 class="card-title">Liste Articles</h3>
                <a href="{{ route('article.create') }}" class="btn btn-primary m-2" role="button">Creer Article</a>

                </div>
            </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped" id="article_table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>image</th>
                      <th>Titre</th>
                      <th>Categorie</th>
                      <th>Auteur</th>
                      <th>Statut</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($articles->count())
                      @foreach ($articles as $article)
                      <tr>
                      <td> {{ $article->id }} </td>
                      <td>
                          <div style="max-width: 70px; max-height: 70px; overflow:hidden">
                          <img src="{{ $article->image }}" class="img-fluid" alt="">
                          </div>

                     </td>
                      <td>{{ $article->titre }} @if($article->publier)<span class="badge badge-success">activer</span>@endif </td>
                      <td>{{ $article->category->name }}</td>
                      <td>{{ $article->user->name }}</td>
                      <td>
                        <input data-id="{{$article->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Actif" data-off="InActif" {{ $article->status == true ? 'checked' : '' }}>
                     </td>
                      <td class="d-flex">

                        <a href="{{ route('article.show', [$article->id])}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i> </a>

                        <a href="{{ route('article.edit', [$article->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i> </a>
                        <form action="{{ route('article.destroy', [$article->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                           <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                        </form>


                      </td>
                      @endforeach




                      @else
                      <tr>
                          <td colspan="6">
                              <h5 class="text-center">pas d'article</h5>
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

