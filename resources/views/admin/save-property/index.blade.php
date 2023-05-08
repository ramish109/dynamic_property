@extends('admin.main')
@section('content')

<!--Dashboard content starts-->
@if (auth()->user()->type == 'individual')
<div class="dash-content"> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="popular-listing">
                    <div class="act-title">
                        <h5>Saved Properties</h5> 
                    </div>
                    <div class="viewd-item-wrap">
                        @foreach($properties as $property)

                        <div class="most-viewed-item">
                            <div class="most-viewed-img">
                                <a href="{{route('front.property',['property'=>$property->property->id])}}">
                                    @if(file_exists( public_path() . '/images/thumbnail/'.$property->property->thumbnail))
                                        <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$property->property->thumbnail) }}" alt="">
                                    @else
                                        <img loading="lazy" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                    @endif
                                </a>
                                <ul class="feature_text v2">
                                    <li class="feature_or"><span>{{$property->property->type == 'sale' ? 'For Sale' : 'For Rent'}}</span></li>
                                </ul>
                            </div>
                            <div class="most-viewed-detail">
                                <h3><a href="{{route('front.property',['property'=>$property->property->id])}}">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title  ?? null }}</a></h3>
                                <div class="trend-open">
                                    @if($property->property->type == 'sale') <p><span class="per_sale">starts from</span>₦{{$property->property->price}}</p> @endif
                                    @if($property->property->type == 'rent') <p>₦{{$property->property->price}}<span class="per_month">month</span></p> @endif
                                </div>
                                <div class="ratings">
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star-half"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endif

<!--Dashboard content ends-->
@endsection