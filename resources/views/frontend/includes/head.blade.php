<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@php
    $siteInfo = DB::table('site_infos')->get();
@endphp

@if(isset($siteInfo->favicon))
    @if(file_exists( public_path() . '/images/images/'.$siteInfo->favicon))
        <link rel="icon" type="image/png" href="{{ URL::asset('/images/images/'.$siteInfo->favicon) }}" />

    @else
        <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
    @endif
@else
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
@endif

<title>
    @if(isset($siteInfo[0]->title))
        {{$siteInfo[0]->title}}
    @endif
</title>
<!-- <link rel="stylesheet" href="style.css"> -->
<link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{ asset('bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/js/bootstrap.js')}}">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
