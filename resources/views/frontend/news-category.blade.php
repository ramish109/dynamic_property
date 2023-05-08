
<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/agent.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/area-guide.css')}}">

</head>
<style>
    .col-md-8 {
        margin-left: 0 !important;
    }
</style>

<body>
@include('frontend.includes.header')

<section class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">
                    Property News, Tips and Advice
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="slice bg-white">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row is-flex">
                        <div class=" col-md-12 featured-article ">
                            <div class="post-item style2 no-padding">
                                <div class="post-content-wr">
                                    <div class="post-meta-top">
                                        <div class="post-image">
                                            <a href="#">
                                                <div style="background-image: url('{{asset('images/breadcrumb/breadcrumb_2.jpg')}}')">
                                                </div>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="post-meta-bot clearfix">
                                        Blogs, News
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach( $newses as $news )
                            <div class=" col-md-6 wp-blocks">
                                <div class="post-item style2 no-padding">
                                    <div class="post-content-wr">
                                        <div class="post-meta-top">
                                            <div class="post-image">
                                                <a href="{{route('news.show',$news)}}">
                                                    @if(file_exists( public_path() . '/images/thumbnail/'.$news->image))
                                                        <div style="background-image: url('{{ URL::asset('images/thumbnail/'.$news->image) }}'); object-fit: cover; background-position: center; ">
                                                        </div>
                                                    @else
                                                        <div style="background-image: url('{{asset('/images/blog/news_1.jpg')}}'); object-fit: cover; background-position: center; ">
                                                        </div>
                                                    @endif

                                                </a>
                                            </div>
                                            <h2 class="post-title">
                                                <a href="{{route('news.show',$news)}}">{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</a>
                                            </h2>
                                        </div>
                                        <div class="post-meta-bot clearfix">
                                            <a href="{{route('news.show',$news)}}" class="btn btn-sm btn-base">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{--                        <div class="paginations">--}}
                        {{--                            <li class="page-item previous-page disable">--}}
                        {{--                                <a href="#" class="page-links">--}}
                        {{--                                    < </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="page-item current-page active">--}}
                        {{--                                <a href="#" class="page-links"> 1 </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="page-item current-page">--}}
                        {{--                                <a href="#" class="page-links"> 2 </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="page-item dots">--}}
                        {{--                                <a href="#" class="page-links"> .. </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="page-item current-page">--}}
                        {{--                                <a href="#" class="page-links"> 10 </a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="page-item next-page">--}}
                        {{--                                <a href="#" class="page-links"> > </a>--}}
                        {{--                            </li>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="section-title-wr">
                            <h3 class="section-title left"><span>Categories</span></h3>
                        </div>
                        <div class="widget">
                            <ul class="list-group list-group-light">
                                @foreach( $popularTopics as $popularTopic )
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="{{route('news.popular-topic',$popularTopic->name)}}" class="text-dark">{{$popularTopic->name}}</a>
                                        <span class="badge badge-primary bg-primary text-light rounded-pill">{{$popularTopic->blogs->count()}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="section-title-wr">
                            <h3 class="section-title left"><span>Recent Articles</span></h3>
                        </div>
                        <div class="widget-container widget-recent widget-recent-boxed widget-recent-comments">
                            <div class="inner">
                                @foreach($newses as $recentlyAddedPost)
                                    <div class="clearfixs">
                                        <a href="#">

                                            @if(file_exists( public_path() . '/images/thumbnail/'.$recentlyAddedPost->image))
                                                <img loading="lazy" src="{{URL::asset('/images/thumbnail/'.$recentlyAddedPost->image)}}" alt="...">
                                            @else
                                                <img src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
                                            @endif

                                        </a>
                                        <span class="comment-author">
                                            <a href="{{route('news.show',$recentlyAddedPost)}}">
                                               {{$recentlyAddedPost->blogTranslation->title ?? $recentlyAddedPost->blogTranslationEnglish->title  ?? 'title' }}
                                            </a>
                                        </span><br>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="section-title-wr  blog">
                            <h3 class="section-title left"><span>Tags</span></h3>
                        </div>
                        <div class="widget-container widget-recent widget-recent-boxed widget-recent-comments">
                            <ul class="">
                                @foreach($tags as $tag)
                                    <li class="btn btn-light mb-1"><a href="#" class="text-dark">{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>






<section>
    <div class="container hidden-xs hidden-sm hidden-ma">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#">
                            <span>/ Blog</span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts-area.js')}}"></script>

</html>
