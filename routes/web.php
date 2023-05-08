<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ContentManageController;
use App\Http\Controllers\SavePropertyController;
use App\Http\Controllers\PropertyRequestController;
use Illuminate\Support\Facades\File; 
use Spatie\Analytics\Period;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Route::get('clear',function(){
    Artisan::call('optimize:clear');
    dd('success');
});
Route::get('get-image',function(){
    Artisan::call('storage:link');
    dd('success');
});

Route::get('/area-guides', function () {
    return view('frontend.area-guide');
});

//chatting routes
Route::post('/chat/store',[ChatController::class,'store'])->name('chat.store');
Route::get('/chat/index',[ChatController::class,'index'])->name('chat.index');
Route::get('/chat/{chat}', [ChatController::class, 'show'])->name('chat.show');
Route::post('/chat/create',[ChatController::class,'create'])->name('chat.create');

Route::get('/get-chat',[ChatController::class,'getData'])->name('get.chat');


Route::get('/property-request/create',[PropertyRequestController::class,'create'])->name('property-request.create');
Route::get('/property-request/index',[PropertyRequestController::class,'index'])->name('property-request.index');
Route::post('/property-request/store',[PropertyRequestController::class,'store'])->name('property-request.store');
Route::post('get-state-request',[PropertyRequestController::class,'getState'])->name('get.state.request');
Route::post('get-city-request',[PropertyRequestController::class,'getCity'])->name('get.city.request');

// Route::get('/save/{$user_id}', [SavePropertyController::class, 'store'])->name('save');
Route::get('/save/{property_id}/{user_id}', [SavePropertyController::class, 'store'])->name('property.save');
Route::get('/not-save/{property_id}/{user_id}', [SavePropertyController::class, 'update'])->name('property.not-save');
Route::get('/save/index',[SavePropertyController::class,'index'])->name('save-property.index');
// Route::get('/property/index',[SavePropertyController::class,'index'])->name('saved-property.index');

//Notify routes start
Route::get('/notify/{id}', [NotifyController::class, 'edit'])->name('notify.edit');
//Notify routes end

Route::group(['middleware'=>'XSS'],function(){


Route::get('/',[Front\HomePageController::class,'index'])->name('front.home');
// Route::get('/help',function(){
//     return File::get(public_path() . '/../help/index.html');
// });
Route::get('/properties',[Front\PropertyController::class,'index']);
Route::get('/properties/rent',[Front\PropertyController::class,'rent'])->name('property.rent');
Route::get('/properties/sale',[Front\PropertyController::class,'sale'])->name('property.sale');
// Route::get('/properties/post-request',[PropertyRequestController::class,'index'])->name('property.postRequest');




// Route::get('/properties/property-demand-trends',[Front\PropertyController::class,'PropertyDemandTrend'])->name('property.DemandTrends');
Route::get('/properties/property-demand-trends',[Front\DemandTrendController::class,'index'])->name('property.DemandTrends');
Route::get('/properties/property-market-trends',[Front\MarketTrendController::class,'index'])->name('property.MarketTrends');

Route::get('/state/{state}',[Front\DemandTrendController::class,'StateTrend'])->name('state.trend');
Route::get('/cities/{state}',[Front\DemandTrendController::class,'CityTrend'])->name('city.trend');
Route::get('/area/{city}',[Front\DemandTrendController::class,'AreaTrend'])->name('area.trend');
Route::get('/categories/{category}',[Front\DemandTrendController::class,'CategoryTrend'])->name('category.trend');
Route::get('/types/{type}',[Front\DemandTrendController::class,'TypeTrend'])->name('type.trend');

//Average Property Trends searches
Route::get('/search-average',[Front\MarketTrendController::class,'show'])->name('search.average');
Route::get('/market/cities/{state}',[Front\MarketTrendController::class,'CityTrend'])->name('market.city.trend');
Route::get('/market/locality/sale/{city}',[Front\MarketTrendController::class,'MarketLocalityTrend'])->name('market.locality.trend');
Route::get('/market/locality/sale/bed/{city}/{bed}',[Front\MarketTrendController::class,'MarketLocalityTrendBed'])->name('market.locality.trend.bed');

Route::get('/market/locality/rent/{city}',[Front\MarketTrendController::class,'MarketLocalityRentTrend'])->name('market.locality.rent.trend');
Route::get('/market/locality/rent/bed/{city}/{bed}',[Front\MarketTrendController::class,'MarketLocalityRentTrendBed'])->name('market.locality.rent.trend.bed');


Route::get('/properties/property-developer',[Front\PropertyController::class,'PropertyDeveloper'])->name('property.PropertyDeveloper');
Route::get('/properties/city/{city}',[Front\PropertyController::class,'city'])->name('property.city');
Route::get('/properties/getCity/{city}',[Front\PropertyController::class,'getCity'])->name('get.city');
Route::get('/properties/property/{category}',[Front\PropertyController::class,'category'])->name('get.category');
Route::get('/properties/{property}',[Front\PropertyController::class,'singleProperty'])->name('front.property');
Route::get('/about',[Front\HomePageController::class,'about']);
Route::get('/faqs',[Front\HomePageController::class,'faqs']);
Route::get('/terms',[Front\HomePageController::class,'terms']);
Route::get('/privacy-policy',[Front\HomePageController::class,'PrivacyPolicy']);

Route::get('/contact',[Front\ContactController::class,'index']);
Route::post('/contact/send',[Front\ContactController::class,'send'])->name('contact');
Route::get('/404',[Front\HomePageController::class,'errorPage']);
Route::get('/agents',[Front\AgentController::class,'index']);
Route::get('/agents/{agent}',[Front\AgentController::class,'show'])->name('agents.show');

Route::get('/builders',[Front\BuilderController::class,'index']);
Route::get('/builders/{builder}',[Front\BuilderController::class,'show'])->name('builders.show');

Route::get('/packages',[Front\HomePageController::class,'membershipPackage']);
Route::get('/news',[Front\NewsController::class,'index'])->name('news.index');
Route::get('/news/{news}',[Front\NewsController::class,'show'])->name('news.show');
Route::get('/news/popular-topic/{category}',[Front\NewsController::class,'popularTopic'])->name('news.popular-topic');
Route::get('/add-listing',[Front\HomePageController::class,'addListing'])->middleware('auth');
Route::post('/state-city',[Front\HomePageController::class,'getCity'])->name('state.city');
Route::get('/search-property',[Front\HomePageController::class,'searchProperty'])->name('search.property');
Route::get('/search-demand',[Front\DemandTrendController::class,'show'])->name('search.demand');

Route::post('/autocomplete/fetch', [Front\HomePageController::class,'fetch'])->name('autocomplete.fetch');
Route::post('/autocomplete/trend/fetch', [Front\DemandTrendController::class,'fetch'])->name('autocomplete.trend.fetch');
Route::post('/autocomplete/average/fetch', [Front\MarketTrendController::class,'fetch'])->name('autocomplete.average.fetch');

Route::post('/search-properties',[Front\PropertyController::class,'searchProperties'])->name('search.properties');

Route::get('/property-blogs',[Front\NewsController::class,'PropertyBlogs'])->name('property.blogs');
Route::post('/search-blogs',[Front\NewsController::class,'searchBlogs'])->name('search.blogs');

Route::post('/sort-agent',[Front\AgentController::class,'sortAgent'])->name('agent.sort');
Route::post('/messages',[Front\MessagesController::class,'store'])->name('messages.store');
Route::post('/booking-request',[Front\BookingRequestController::class,'store'])->name('booking.request');
Route::get('/language-change/{id}',[Front\LanguageController::class,'defaultChange'])->name('language.defaultChange');
Route::post('/subscribe',[Admin\SubscribeController::class,'subscribe'])->name('email.subscribe');
Route::get('/all-properties',[Front\PropertyController::class,'getAllProperties'])->name('get.allproperties');
Route::get('/login/{provider}',[Admin\SocialLoginController::class,'redirectToProvider'])->name('redirect.provider');
Route::get('/login/{provider}/callback',[Admin\SocialLoginController::class,'handleProviderCallback']);

Route::get('/analytics', function () {
//    $start  = new Carbon\Carbon('2021-10-05 15:00:03');
//    $end    = new Carbon\Carbon('2050-10-05 17:00:09');
//
//    $date = Carbon\Carbon::parse('2021-11-01 14:00:00');
//    $now = Carbon\Carbon::now();
//
//    $diff = $date->diffInDays($now);
//    return $diff;

//    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2021-10-29 14:42:00');
//
//    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2050-10-31 10:30:34');
//
//    $diff_in_hours = $to->diffInHours($from);
//    return $diff_in_hours;
//   return  $start->diff($end)->format('%H:%I:%S');

   // $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    // $result = Analytics::fetchTopBrowsers(Period::months(6));
    $result = Analytics::fetchUserTypes(Period::days(7));
    dd($result);
    for($i=0;$i<count($result);$i++)
    {
        echo $result[$i]['pageTitle']. '='. $result[$i]['pageViews'];
        echo "<br>";
    }
//    return $result->sum('pageViews');
    $date = \Carbon\Carbon::parse($result[0]['date']); 
    $date->monthName;
    return response()->json($result);
});
// Laravel 8
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment');


Route::group(['prefix' => 'admin','as' =>'admin.','middleware'=>'auth'], function () {
    Route::get('/dashboard',[Admin\DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/chart',[Admin\DashboardController::class,'chart'])->name('dashboard.chart');
    Route::post('/dashboard/email',[Admin\DashboardController::class,'emailtoken'])->name('dashboard.emailtoken');
    Route::resource('countries',Admin\CountryController::class);
    Route::resource('states',Admin\StateController::class);
    Route::resource('cities',Admin\CityController::class);
    Route::get('areas',[Admin\AreaController::class,'index'])->name('areas.index');

    Route::resource('areas',Admin\AreaController::class);
    
    Route::resource('categories',Admin\CategoryController::class);
    Route::resource('packages',Admin\PackageController::class);
    
    Route::get('pkguser/{id}',[Admin\PackageController::class, 'pkgUser'])->name('pkguser');
    Route::get('pkguser-show',[Admin\AgentController::class, 'pkguserShow'])->name('pkgusershow');
    
    Route::resource('properties',Admin\PropertyController::class);
    
    //Builder Project routes
    Route::resource('projects',Admin\ProjectController::class);

    Route::resource('facilities',Admin\FacilityController::class);
    Route::resource('bookings',Admin\BookingController::class);
    Route::resource('users',Admin\ProfileController::class);
    Route::resource('agents',Admin\AgentController::class);
    
    
    // All builder Management routes start
    Route::get('buildershow',[Admin\AgentController::class, 'builderShow'])->name('buildershow');
    Route::get('buildercreate',[Admin\AgentController::class, 'builderCreate'])->name('buildercreate');
    Route::get('builderedit/{id}',[Admin\AgentController::class, 'builderEdit'])->name('builderedit');
    Route::get('builderdestroy/{id}',[Admin\AgentController::class, 'builderDestroy'])->name('builderdestroy');
    Route::post('builderupdate/{id}',[Admin\AgentController::class, 'builderUpdate'])->name('builderupdate');
    Route::post('builderstore',[Admin\AgentController::class, 'builderStore'])->name('builderstore');
    // All builder routes end


    // All individual Management routes start
    Route::get('individualshow',[Admin\AgentController::class, 'individualShow'])->name('individualshow');
    Route::get('individualcreate',[Admin\AgentController::class, 'individualCreate'])->name('individualcreate');
    Route::post('individualstore',[Admin\AgentController::class, 'individualStore'])->name('individualstore');
    Route::get('individualedit/{id}',[Admin\AgentController::class, 'individualEdit'])->name('individualedit');
    Route::post('individualupdate/{id}',[Admin\AgentController::class, 'individualUpdate'])->name('individualupdate');
    Route::get('individualdestroy/{id}',[Admin\AgentController::class, 'individualDestroy'])->name('individualdestroy');
    // All individual routes end


    // All owner Management routes start
    Route::get('ownershow',[Admin\AgentController::class, 'ownerShow'])->name('ownershow');
    Route::get('ownercreate',[Admin\AgentController::class, 'ownerCreate'])->name('ownercreate');
    Route::post('ownerstore',[Admin\AgentController::class, 'ownerStore'])->name('ownerstore');
    Route::get('owneredit/{id}',[Admin\AgentController::class, 'ownerEdit'])->name('owneredit');
    Route::post('ownerupdate/{id}',[Admin\AgentController::class, 'ownerUpdate'])->name('ownerupdate');
    Route::get('ownerdestroy/{id}',[Admin\AgentController::class, 'ownerDestroy'])->name('ownerdestroy');
    // All owner routes end
    
    
    //Content Management start
    Route::get('comapnyshow',[ContentManageController::class, 'CompanyShow'])->name('comapnyshow');
    Route::get('contentcreate/{value}',[ContentManageController::class, 'ContentCreate'])->name('contentcreate');
    Route::post('contentstore',[ContentManageController::class, 'ContentStore'])->name('contentstore');
    
    Route::get('otherlinkshow',[ContentManageController::class, 'OtherLinkShow'])->name('otherlinkshow');
    Route::get('locationlinkshow',[ContentManageController::class, 'LocationLinkShow'])->name('locationlinkshow');
    Route::get('linkdestroy/{id}',[ContentManageController::class, 'LinkDestroy'])->name('linkdestroy');
    
    Route::get('trendlinkshow',[ContentManageController::class, 'TrendLinkShow'])->name('trendlinkshow');

    //Content Management End
    
    
    Route::resource('property-request',Admin\PropertyRequestController::class);
    Route::get('/property-request/edit/{id}',[Admin\PropertyRequestController::class,'edit'])->name('property-request.edit');
    Route::get('/property-request/delete/{id}',[Admin\PropertyRequestController::class,'destroy'])->name('property-request.destroy');

    // Route::get('/save/{property_id}/{user_id}', [SavePropertyController::class, 'store'])->name('property.save');
    Route::get('/property-request/show/{id}',[Admin\PropertyRequestController::class,'show'])->name('property-request.show');

    Route::resource('favourites',Admin\FavouriteController::class);
    Route::resource('invoices',Admin\InvoiceController::class);
    Route::resource('messages',Admin\MessageController::class);
    Route::resource('credits',Admin\CreditController::class);
    Route::resource('my-packages',Admin\PurchasePackageController::class);
    Route::resource('blog-categories',Admin\BlogCategoryController::class);
    Route::resource('blogs',Admin\BlogController::class);
    Route::resource('tags',Admin\TagController::class);
    Route::resource('pages',Admin\PagesController::class);
    Route::resource('currencies',Admin\CurrencyController::class);
    Route::resource('analytics',Admin\AnalyticsController::class);
    Route::resource('header-images',Admin\HeaderImageController::class);
    Route::resource('mail-settings',Admin\MailSettingsController::class);
    Route::resource('testimonials',Admin\TestimonialController::class);
    Route::resource('ourPartners',Admin\OurPartnerController::class);
    Route::get('site-informations/general',[Admin\SiteInfoController::class,'create'])->name('siteinfo.create');
    Route::post('site-informations/general',[Admin\SiteInfoController::class,'store'])->name('siteinfo.store');
    Route::get('social-login',[Admin\SocialLoginController::class,'index'])->name('social.login');
    Route::post('/facebook/store',[Admin\SocialLoginController::class,'facebookStoreOrUpdate'])->name('facebook.info.store');
    Route::get('/blogs/check_slug',[Admin\BlogController::class,'checkSlug'])->name('blogs.checkSlug');
    Route::get('edit-profile',[Admin\ProfileController::class,'editProfile']);
    Route::get('single-invoice',[Admin\InvoiceController::class,'singleInvoice']);
    Route::get('my-properties',[Admin\PropertyController::class,'myProperties'])->name('my-properties');
    Route::get('recieved-reviews',[Admin\ReviewController::class,'recievedReviews'])->name('recieved-reviews');
    Route::get('submitted-reviews',[Admin\ReviewController::class,'submittedReviews'])->name('submitted-reviews');
    Route::post('get-state',[Admin\CityController::class,'getState'])->name('get.state');
    Route::post('get-city',[Admin\CityController::class,'getCity'])->name('get.city');
    
    Route::get('updateFeature',[Admin\PackageController::class,'updateFeature'])->name('update.feature');
    Route::get('updateStatus',[Admin\PackageController::class,'updateStatus'])->name('update.status');
    Route::post('checkout-options',[Admin\PaymentGatewayController::class, 'checkoutOptions'])->name('checkout.options');
    Route::get('change-password',[Admin\ChangePasswordController::class, 'index'])->name('change.password.index');
    Route::post('change-password',[Admin\ChangePasswordController::class, 'store'])->name('change.password');
    Route::get('payment/methods',[Admin\PaymentGatewayController::class, 'index'])->name('payment.index');
    Route::post('/paypal/store',[Admin\PaymentGatewayController::class,'paypalStoreOrUpdate'])->name('paypal.info.store');
    Route::post('/stripe/store',[Admin\PaymentGatewayController::class,'stripeStoreOrUpdate'])->name('stripe.info.store');
    Route::post('/paystack/store',[Admin\PaymentGatewayController::class,'paystackStoreOrUpdate'])->name('paystack.info.store');
    Route::post('/razorpay/store',[Admin\PaymentGatewayController::class,'razorpayStoreOrUpdate'])->name('razorpay.info.store');
    Route::post('pay', [Admin\PaymentGatewayController::class, 'payment'])->name('payment');
    // Route::post('checkout',[Admin\PaymentGatewayController::class, 'checkout'])->name('checkout');
    Route::post('paypal-checkout',[Admin\PaymentGatewayController::class,'paypalCheckout'])->name('checkout.paypal');
    Route::post('/payment/add-funds/paypal',[Admin\PaymentGatewayController::class,'paymentPaypal']);

    // Route::post('/pays', [Admin\PaymentGatewayController::class, 'redirectToGateway'])->name('pay');
    // Route::get('/payment/callback', [Admin\PaymentGatewayController::class, 'PaystackHandleGatewayCallback']);
    Route::get('checkout',[Admin\PaymentGatewayController::class, 'checkoutPage'])->name('checkout.page');
    Route::get('/delete/language',[Admin\LanguageController::class,'deleteLanguage'])->name('delete.language');
    Route::get('/delete/galleryImage',[Admin\PropertyController::class,'destroyGalleryImage'])->name('destroy.galleryImage');
    Route::get('languages/update',[Admin\LanguageController::class,'update'])->name('update.language');
    // 
    Route::get('payment/detail',[Admin\PaymentGatewayController::class, 'detail'])->name('payment.detail');



    // 
    // Route::get('migrate', function () {
    //     define('_PATH', dirname(__FILE__));

    //     // Zip file name
    //     $filename = 'C:/xampp/app.zip';
    //     $zip = new ZipArchive;
    //     $res = $zip->open($filename);
    //     if ($res === TRUE) {
    //         // Unzip path
    //         $path = "C:/xampp/htdocs/SarchHolm/";
    //         // Extract file
    //         $zip->extractTo($path);
    //         $zip->close();
    //         return back()->with('migration', 'Successfull!!');
    //     } else {
    //         echo 'failed!';
    //     }
    // })->name('migrate');
    Route::get('/test-chart',function(){
        return view('admin.test');
    });
    Route::group(config('translation.route_group_config') + ['namespace' => 'JoeDixon\\Translation\\Http\\Controllers'], function ($router) {
        $router->get(config('translation.ui_url'), 'LanguageController@index')
            ->name('languages.index');

        $router->get(config('translation.ui_url').'/create', 'LanguageController@create')
            ->name('languages.create');

        $router->post(config('translation.ui_url'), 'LanguageController@store')
            ->name('languages.store');

        $router->get(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@index')
            ->name('languages.translations.index');

        $router->post(config('translation.ui_url').'/{language}', 'LanguageTranslationController@update')
            ->name('languages.translations.update');

        $router->get(config('translation.ui_url').'/{language}/translations/create', 'LanguageTranslationController@create')
            ->name('languages.translations.create');

        $router->post(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@store')
            ->name('languages.translations.store');
    });
});
Auth::routes();

// Route::get('/forgot-password', function () {
//     return view('auth.passwords.email');
// })->middleware('guest')->name('password.request');


Route::get('forget-password', [Admin\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [Admin\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [Admin\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [Admin\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();
//Route::get('welcome',[Admin\PaymentGatewayController::class,'index']);

});

Route::group(['middleware' => ['auth']], function() {
    
    /**
    * Verification Routes
    */
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
    
});

