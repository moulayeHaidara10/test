@extends('layouts.guest')


@section('content')
<!-- PAGE HEADER -->
<div class="page-header">
    <div class="page-header-bg" style="background-image: url('{{asset('website')}}/img/header-2.jpg');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
            <h1 class="text-uppercase"></h1>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

					<!-- /post -->

					<div class="row">
                        <!-- post -->
                        @if($posts->isNotEmpty())

                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="post">
                                    <a class="post-img" href="{{ route('website.post', ['slug' => $post->slug])}}"><img src="{{ $post->image }}" width="360px" height="auto" alt="image-article" class="img-fluid"></a>
                                    <div class="post-body">
                                        <div class="post-category">
                                            <a href="#">{{ $post->category->name }}</a>
                                        </div>
                                        <h3 class="post-title"><a href="{{ route('website.post', ['slug' => $post->slug])}}">{{ $post->titre }}</a></h3>
                                        <ul class="post-meta">

                                            <li> {{$post->created_at->format('d M Y') }} </li>
                                        </ul>
                                        <p>{!! Str::limit($post->details, 100, '...') !!} </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        @else
                            <div>
                                <h2>No posts found</h2>
                            </div>
                        @endif


						<!-- /post -->
                    </div>


                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center mt-5 mb-5">
                            {{$posts->appends(request()->input())->links() }}
                        </div>
                    </div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


@endsection
