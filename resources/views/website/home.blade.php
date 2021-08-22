@extends('layouts.gues')




@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
    <!-- row -->
    <div id="hot-post" class="row hot-post">
        <div class="col-md-8 hot-post-left">
            <!-- post -->
            @foreach($firstPosts2 as $article)
            <div class="post post-thumb">
                <a class="post-img" href=" {{ route('website.post', ['slug' => $article->slug])}}"><img src="{{ $article->image }}" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                    <a href="category.html">{{ $article->category->name }}</a>
                    </div>
                    <h3 class="post-title title-lg"><a href="{{ route('website.post', ['slug' => $article->slug])}}">{{ $article->titre }}</a></h3>
                    <ul class="post-meta">

                    <li>{{ $article->created_at->format('d M Y') }}</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    <div class="col-md-4 hot-post-right">
        @foreach($middleposts as $article)
    <!-- post -->
    <div class="post post-thumb">
        <a class="post-img" href="{{ route('website.post', ['slug' => $article->slug]) }}"><img src="{{ $article->image }}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{ $article->category->name }}</a>
            </div>
            <h3 class="post-title"><a href="{{ route('website.post', ['slug' => $article->slug]) }}">{{ $article->titre }}</a></h3>
            <ul class="post-meta">

                <li>{{ $article->created_at->format('d M Y') }}</li>
            </ul>
        </div>
    </div>
    @endforeach

    @foreach($lastPost as $article)
    <!-- post -->
    <div class="post post-thumb">
        <a class="post-img" href="{{ route('website.post', ['slug' => $article->slug]) }}"><img src="{{ $article->image }}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{ $article->category->name }}</a>

            </div>
            <h3 class="post-title"><a href="{{ route('website.post', ['slug' => $article->slug])}}">{{ $article->titre }}</a></h3>
            <ul class="post-meta">

                <li>{{ $article->created_at->format('d M Y') }}</li>
            </ul>
        </div>
    </div>
    <!-- /post -->
    @endforeach
</div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
</div>



<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Recent posts</h2>
                        </div>
                    </div>
                    <!-- post -->
                    @foreach($recentsPosts as $article)
                    <div class="col-md-6" style="">

                        <div class="post">
                            <a class="post-img" href="{{ route('website.post', ['slug' => $article->slug]) }}"><img src="{{ $article->image }}" alt="" width="340px" height="240px" class="img-responsive"></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">{{ $article->category->name }}</a>

                                </div>
                                <h3 class="post-title"><a href="{{ route('website.post', ['slug' => $article->slug])}}">{{ $article->titre }}</a></h3>
                                <ul class="post-meta">

                                    <li>{{ $article->created_at->format('d M Y') }}</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <div class="col-md-12">
                        {{ $recentsPosts->links() }}
                    </div>

                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <!-- ad -->
                                <div class="col-md-12 section-row text-center">
                                    <a href="#" style="display: inline-block;margin: auto;">
                                        <img class="img-responsive" src="./img/ad-2.jpg" alt="">
                                    </a>
                                </div>
                                <!-- /ad -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
					<!-- /row -->
                    <div class="section-row loadmore text-center">
						<a href="#" class="primary-button">Load More</a>
					</div>
                </div>
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
                            <li><a href="#">{{ $category->name }} <span>451</span></a></li>
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
                    @if ($popular_posts)
                    @foreach ($popular_posts as $article )

                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="{{ route('website.post', ['slug' => $article->slug]) }}"><img src="{{ $article->image }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">{{ $article->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="{{ route('website.post', ['slug' => $article->slug])}}">{{ $article->titre }}</a></h3>
                        </div>
                    </div>
                    <!-- /post -->

                    @endforeach
                    @endif




                <!-- galery widget -->

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

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ad -->
            <div class="col-md-12 section-row text-center">
                <a href="#" style="display: inline-block;margin: auto;">
                    <img class="img-responsive" src="./img/ad-2.jpg" alt="">
                </a>
            </div>
            <!-- /ad -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- /SECTION -->

@endsection
