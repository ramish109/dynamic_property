<!DOCTYPE html>
<html lang="en">


<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/agent.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css')}}">
</head>

<body>
@include('frontend.includes.header')

<section class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">
                    Contact Us
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="slice bg-white voffset-bottom-0">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="wp-block default user-form no-margin">
                        <div class="form-header">
                            <h2>Drop us a message</h2>
                        </div>
                        <div class="form-body">
                            <fieldset class="no-padding">
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="label">Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="name" value="" id="name" placeholder=""
                                                       required="required" maxlength="50" class="form-control ">
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="label">Email</label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-envelope"></i>
                                                        <input type="email" id="email" value="" name="email"
                                                               placeholder="" required="required" maxlength="100"
                                                               class="form-control ">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Message</label>
                                                <label class="input">
                                                        <textarea name="message" id="message" rows="8" placeholder=""
                                                                  required="required" class="form-control "></textarea>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-base btn-icon btn-icon-right btn-icon-go"
                                                    type="submit">
                                                <span>Send Message</span>
                                            </button>
                                        </div>
                                    </div>
                                </section>
                            </fieldset>
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
                            <span>/ Contact Us</span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</html>
