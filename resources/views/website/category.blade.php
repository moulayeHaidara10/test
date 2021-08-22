@extends('layouts.guest')


@section('content')
<!-- PAGE HEADER -->
<div class="page-header">
    <div class="page-header-bg" style="background-image: url('{{asset('website')}}/img/header-2.jpg');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
            <h1 class="text-uppercase">{{ $category->name }}</h1>
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
                        @foreach($articles as $article)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{ route('website.post', ['slug' => $article->slug])}}"><img src="{{ $article->image }}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html"> {{ $article->category->name }} </a>
									</div>
									<h3 class="post-title"><a href="{{ route('website.post', ['slug' => $article->slug])}}">{{ $article->titre }}</a></h3>
									<ul class="post-meta">
                                    <li><a href="author.html">{{ $article->user->name }}</a></li>
										<li>{{ $article->created_at->format('d M Y') }}</li>
									</ul>
								</div>
							</div>
                        </div>
                        @endforeach
						<!-- /post -->
                    </div>

					<div class="section-row loadmore text-center">
						<div class="col-md-12">

                                {{ $articles->links() }}

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
