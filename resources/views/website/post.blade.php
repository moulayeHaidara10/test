@extends('layouts.gues')


@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v9.0&appId=1075762219501872&autoLogAppEvents=1" nonce="zvQn9uF1"></script>
		<!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url('{{ $article->image }}'); height: auto;" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
                        <a href="category.html">{{ $article->category->name }}</a>
						</div>
						<h1>{{ $article->titre }}</h1>
						<ul class="post-meta">
							<li><a href="#">{{ $article->user->name }}</a></li>
							<li>{{ $article->created_at->format('d M Y') }}</li>
							<li><i class="fa fa-comments"></i> 3</li>
							<li><i class="fa fa-eye"></i>{{ $article->views }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- post share -->
					<div class="section-row">
						<div class="post-share">

                            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
							<a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
							<a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
							<a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
						</div>
					</div>
					<!-- /post share -->

					<!-- post content -->
					<div class="section-row">

						<p>{!!  $article->details !!}</p>
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
							<ul>
                                @foreach ($tags as $tag )
                                <li><a href="{{ route('website.tag', ['slug' => $tag->slug])  }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>

						</div>
					</div>
					<!-- /post tags -->
                    <div class="section-row">
						<div class="post-tags">
							<ul>
                                <li>CATEGORIE:</li>

                                <li><a href="{{ route('website.category', ['slug' => $article->slug]) }}">{{ $article->category->name }}</a></li>

							</ul>
						</div>
					</div>

					<!-- post author -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">A-Propos <a href="#">{{ $article->user->name }}</a></h3>
						</div>
						<div class="author media">
							<div class="media-left">
								<a href="author.html">
									<img class="author-img media-object" src="{{asset('website')}}/img/avatar-1.jpg" alt="">
								</a>
							</div>
							<div class="media-body">
								<p>{{ $article->user->name }}</p>
								<ul class="author-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /post author -->
<!-- post comments -->
<div class="section-row">
    <div id="disqus_thread"></div>
</div>
<!-- /post comments -->
					<!-- /related post -->
					<div>
						<div class="section-title">
							<h3 class="title">Related Posts</h3>
						</div>
						<div class="row">
							<!-- post -->
                            @if ($recent_posts)
                            @foreach ($recent_posts as $article )
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="{{ route('website.post', ['slug' => $article->slug]) }}"><img src="{{ $article->image }}" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="{{ route('website.category', ['slug' => $article->slug]) }}">Health</a>
										</div>
										<h3 class="post-title title-sm"><a href="{{ route('website.post', ['slug' => $article->slug]) }}">{{ $article->titre }}</a></h3>
										<ul class="post-meta">
											<li><a href="author.html">{{ $article->user->name }}</a></li>
											<li>{{  $article->created_at->format('d M Y') }}</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /post -->
                            @endforeach
                            @endif

						</div>
					</div>
					<!-- /related post -->



					<!-- post reply -->
					<div class="section-row">

					</div>
					<!-- /post reply -->
				</div>
				<div class="col-md-4">
					<!-- ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="{{asset('website')}}/img/ad-3.jpg" alt="">
						</a>
					</div>
					<!-- /ad widget -->

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
                                @foreach($categories as $category)
								<li><a href="{{ route('website.category', ['slug' => $category->slug]) }}">{{ $category->name }} </a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /category widget -->



					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>
						<!-- post -->
                        @if ($popular_posts)
                        @foreach ($popular_posts as $article )

                        <!-- post -->
                        <div class="post post-widget">
                            <a class="post-img" href="{{ route('website.post', ['slug' => $article->slug]) }}"><img src="{{ $article->image }}" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="{{ route('website.category', ['slug' => $category->slug]) }}">{{ $article->category->name }}</a>
                                </div>
                                <h3 class="post-title"><a href="{{ route('website.post', ['slug' => $article->slug])}}">{{ $article->titre }}</a></h3>
                            </div>
                        </div>
                        <!-- /post -->

                        @endforeach
                        @endif
					</div>
					<!-- /post widget -->

					<!-- galery widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Instagram</h2>
						</div>
						<div class="galery-widget">
							<ul>
								<li><a href="#"><img src="{{asset('website')}}/img/galery-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="{{asset('website')}}/img/galery-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="{{asset('website')}}/img/galery-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="{{asset('website')}}/img/galery-4.jpg" alt=""></a></li>
								<li><a href="#"><img src="{{asset('website')}}/img/galery-5.jpg" alt=""></a></li>
								<li><a href="#"><img src="{{asset('website')}}/img/galery-6.jpg" alt=""></a></li>
							</ul>
						</div>
					</div>
					<!-- /galery widget -->

					<!-- Ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="{{asset('website')}}/img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /Ad widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- FOOTER -->

@endsection

@section('script')
<script>
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://panafrap.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection
