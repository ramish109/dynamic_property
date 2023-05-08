
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
                                                <div style="background-image: url('images/post.jpg')">
                                                </div>
                                            </a>
                                        </div>
                                        <h2 class="post-title">
                                            <a href="#">Badore
                                                Area Guide</a>
                                        </h2>
                                    </div>
                                    <div class="post-content clearfix">
                                        <div class="post-desc">
                                            <p>Badore is an Ajah neighbourhood in Lagos State's Eti-Osa Local
                                                Government Area. Ajah has been inhabited for centuries since the
                                                arrival of the Portuguese and the beginning of the slave trade in
                                                1704 when Lagos was transformed from a fishing town to a city....
                                            </p>
                                        </div>
                                    </div>
                                    <div class="post-meta-bot clearfix">
                                        <a href="#" class="btn btn-sm btn-base">Read more</a>
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
                                            <a href="#">
                                                <div style="background-image: url('images/post.jpg')">
                                                </div>
                                            </a>
                                        </div>
                                        <h2 class="post-title">
                                            <a href="#">{{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</a>
                                        </h2>
                                    </div>
{{--                                    <div class="post-content clearfix">--}}
{{--                                        <div class="post-desc">--}}
{{--                                            <p>Maitama, simply put, “is an area for the rich and famous." Most--}}
{{--                                                ambassadors and high commissioners from other countries live in this--}}
{{--                                                area, which is expensive and hard to get into. Maitama is an--}}
{{--                                                exclusive part of Abuja. It is a quiet, wealthy neighbourhoo...</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="post-meta-bot clearfix">
                                        <a href="#" class="btn btn-sm btn-base">Read more</a>
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
                            <ul class="categories highlight">
                                @foreach( $categories as $category )
                                <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="section-title-wr">
                            <h3 class="section-title left"><span>Top Articles</span></h3>
                        </div>
                        <div class="widget-container widget-recent widget-recent-boxed widget-recent-comments">
                            <div class="inner">
                                <div class="clearfixs">
                                    <a href="#">
                                        <img src="images/post.jpg" alt="">
                                    </a>
                                    <span class="comment-author">
                                            <a href="#">
                                                Sizes of Land in Nigeria Explained - Plots, Acres & Hectares
                                            </a>
                                        </span><br>
                                    <span class="comment-entry">
                                            As a foreigner living in nigeria or a potential buyer wishing to build a new
                                            house you will often find things are not done quite the way you are used to
                                            and buying land is no ...
                                        </span>
                                </div>
                                <div class="clearfixs">
                                    <a href="#">
                                        <img src="images/post.jpg" alt="">
                                    </a>
                                    <span class="comment-author">
                                            <a href="#">
                                                Sizes of Land in Nigeria Explained - Plots, Acres & Hectares
                                            </a>
                                        </span><br>
                                    <span class="comment-entry">
                                            As a foreigner living in nigeria or a potential buyer wishing to build a new
                                            house you will often find things are not done quite the way you are used to
                                            and buying land is no ...
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="section-title-wr  blog">
                            <h3 class="section-title left"><span>New Articles</span></h3>
                        </div>
                        <div class="widget-container widget-recent widget-recent-boxed widget-recent-comments">
                            <div class="inner">
                                <div class="clearfixs">
                                    <a href="#">
                                        <img src="images/post.jpg" alt="">
                                    </a>
                                    <span class="comment-author">
                                            <a href="#">
                                                Sizes of Land in Nigeria Explained - Plots, Acres & Hectares
                                            </a>
                                        </span><br>
                                    <span class="comment-entry">
                                            As a foreigner living in nigeria or a potential buyer wishing to build a new
                                            house you will often find things are not done quite the way you are used to
                                            and buying land is no ...
                                        </span>
                                </div>
                                <div class="clearfixs">
                                    <a href="#">
                                        <img src="images/post.jpg" alt="">
                                    </a>
                                    <span class="comment-author">
                                            <a href="#">
                                                Sizes of Land in Nigeria Explained - Plots, Acres & Hectares
                                            </a>
                                        </span><br>
                                    <span class="comment-entry">
                                            As a foreigner living in nigeria or a potential buyer wishing to build a new
                                            house you will often find things are not done quite the way you are used to
                                            and buying land is no ...
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default panel-sidebar-1 announcement hidden-ma hidden-xs">
                            <div class="panel-body text-center">
                                <a title="Market your property on Nigeria Property Centre"
                                   href="#">
                                    <h3 class="title">Advertise/market your property on Nigeria Property Centre</h3>
                                </a>
                                <a title="Market your property on Nigeria Property Centre"
                                   class="btn btn-alt voffset-15" href="#">
                                    <span>Get Started!</span>
                                </a>
                            </div>
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
