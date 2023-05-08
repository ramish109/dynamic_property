<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/property-demand-trends.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
</head>

<body>
@include('frontend.includes.header')

<section>
    <div class="card" style="border: none; !important;">
        @if(!env('USER_VERIFIED'))
            <img class="card-img-top" src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image">
        @else
            @if(file_exists( public_path() . '/images/gallery/'.$news->image))
                <img loading="lazy" class="card-img-top" src="{{ URL::asset('/images/gallery/'.$news->image) }}" alt="...">
            @else
                <img class="card-img-top" src="{{asset('/images/blog/news_1.jpg')}}" alt="place-image"
                     style="height: 300px; object-fit: cover; ">
            @endif
        @endif

        <div class="card-body">
            <h5 class="card-title"> {{$news->blogTranslation->title ?? $news->blogTranslationEnglish->title  ?? null }}</h5>
            <span class="text-secondary"><strong class="text-secondary">Author</strong> {{$news->user->f_name}} {{$news->user->l_name}}</span><hr>

            <p class="card-text">{!! $news->blogTranslation->body ?? $news->blogTranslation->body  ?? null !!}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

            <hr>

            <div class="widget-container widget-recent widget-recent-boxed widget-recent-comments">
                <ul class="">
                    <li class="btn btn-primary mb-1 btn-sm">
                        <a href="#" class="text-light"># TAGS</a>
                    </li>
                    @foreach($tags as $tag)
                        <li class="btn btn-light btn-sm mb-1">
                            <a href="#" class="text-dark">{{$tag->tagTranslation->name ?? $tag->tagTranslationEnglish->name  ?? null }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <br><br>
            <div class="card mb-3" style="border: none">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{asset('/images/blog/news_1.jpg')}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title">{{$news->user->f_name}} {{$news->user->l_name}}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
@include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>


</html>