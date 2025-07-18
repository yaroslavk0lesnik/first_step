<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="{{
    Route::currentRouteName() === 'services.oklens'
    ? 'page-oklens page-header-not-margin'
    : (Route::currentRouteName() === 'services.panoptix'
        ? 'page-panoptix page-header-not-margin'
        : (Route::currentRouteName() === 'main.team'
            ? 'page-doctors-departments'
            : '')
    )
}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        use Illuminate\Support\Facades\Route;

        $routeName = Route::currentRouteName();
        $pageKey = last(explode('.', $routeName));
        $locale = app()->getLocale();

        $defaultSeo = [
            'title' => 'Медичний центр Докарт',
            'description' => 'Многопрофильный медицинский центр Докарт Харьков. Диагностический центр с использованием современного оборудования. ул. Маяковского, 24 ☎(057)761-61-31',
            'keywords' => 'Докарт, Харьков, офтальмология, офтальмолог, лазерная коррекция зрения, лазерная коррекция, лечение катаракты, подбор очков, гинекология, гинеколог, урология, уролог',
            'og:title' => 'Медичний центр Докарт',
            'og:description' => 'Многопрофильный медицинский центр Докарт Харьков...',
        ];

        $seoFromModel = [];

        try {
            $slug = request()->route('slug');

            $modelsToCheck = [
                \App\Models\BlogArticleTranslation::class => ['slug'],
                \App\Models\DoctorTranslation::class => ['full_slug', 'short_slug'],
            ];

            foreach ($modelsToCheck as $modelClass => $slugFields) {
                if (class_exists($modelClass)) {
                    foreach ($slugFields as $field) {
                        $model = $modelClass::where($field, $slug)->first();
                        if ($model && $model->page_seo) {
                            $seoFromModel = collect($model->page_seo)
                                ->filter(fn($val) => !is_null($val))
                                ->toArray();
                            break 2;
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            $seoFromModel = [];
        }

        $seoPath = base_path("lang/{$locale}/frontend/{$pageKey}.php");
        $fileSeo = file_exists($seoPath) ? (include $seoPath)['seo'] ?? [] : [];

        if (isset($seoFromModel['openGraph'])) {
    if (isset($seoFromModel['openGraph']['title'])) {
        $seoFromModel['og:title'] = $seoFromModel['openGraph']['title'];
    }
    if (isset($seoFromModel['openGraph']['description'])) {
        $seoFromModel['og:description'] = $seoFromModel['openGraph']['description'];
    }
    unset($seoFromModel['openGraph']);
}


        $seo = array_merge($defaultSeo, $fileSeo, $seoFromModel);

       // dd($seo);
    @endphp


    <title>{{ $seo['title'] }}</title>
    <meta name="description" content="{{ $seo['description'] }}">
    <meta name="keywords" content="{{ $seo['keywords'] }}">

    <meta property="og:title" content="{{ $seo['og:title'] ?? $seo['title'] }}">
    <meta property="og:description" content="{{ $seo['og:description'] ?? $seo['description'] }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <link rel="icon" href="{{ asset('/images/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Asap:400,500,600,700%7CLato:400italic,400,700">
    <link rel="stylesheet" href="{{ asset('blepharoplastika-css/style-bleforoplastik.css') }}">
    <link rel="stylesheet" href="{{ asset('blepharoplastika-css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    @if(Route::currentRouteName() === 'main.blepharoplastika' || Route::currentRouteName() === 'main.plastichna-khururgiya' || Route::currentRouteName() === 'services.inektsionnaya-terapiya' || Route::currentRouteName() === 'services.plazmoterapiya' || Route::currentRouteName() === 'services.rf-lifting'|| Route::currentRouteName() === 'services.lazernaya-epilyatsiya' || Route::currentRouteName() === 'services.lazernoe-omolozhenie'|| Route::currentRouteName() === 'services.co2'|| Route::currentRouteName() === 'services.checkup' || Route::currentRouteName() === 'services.liposaktsiya-ta-liposkulpturuvannya-v-dokart'  || Route::currentRouteName() === 'main.team' ||  Route::currentRouteName() === 'services.panoptix')
        <link rel="stylesheet" href="{{ asset('blepharoplastika-css/app.css') }}">
    @endif
    @if(Route::currentRouteName() === 'services.oklens' )
     <link rel="stylesheet" href="{{ asset('blepharoplastika-css/oklens.css') }}" >
    @endif
    @if(Route::currentRouteName() === 'services.panoptix' )
    <link rel="stylesheet" href="{{ asset('blepharoplastika-css/panoptix.css') }}">
    @endif
</head>
<!-- Bootstrap JS + Popper.js -->
<body  >
<div class="preloader">
    <div class="preloader-body">
        <div class="cssload-container">
            <div class="cssload-double-torus"></div>
        </div>
        <p>&nbsp;</p>
    </div>
</div>
<div class="page">
    @include('layouts.header')
    {{ $slot }}
    @include('layouts.footer')
    <div class="modal appointment-modal" style="" id="modal">
        <div class="content" style="">
            <h4>{{ __('global.Registration online') }}</h4>
            <form action="/appointment" method="POST" class="accept-preset-blue">
                <div class="error" style="height: 0px;">
                    <div class="text">&nbsp;</div>
                </div>
                @csrf
                <div class="error" style="height: 0px;">
                    <div class="text">&nbsp;</div>
                </div>
                <div class="form-group required">
                    <label for="appointment-phone">{{ __('global.Your phone number') }}</label>
                    <input type="text" name="phone" id="appointment-phone">
                    <div class="description">{{ __('global.Format: +380501023212') }}</div>
                    <div class="error" style="height: 0px;">
                        <div class="text">
                        </div>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="appointment-name">{{ __('global.your name') }}</label>
                    <input type="text" name="name" id="appointment-name">
                    <div class="error" style="height: 0px;">
                        <div class="text">&nbsp;</div>
                    </div>
                </div>
                <div class="personal-agreement">
                    <span class="mdi mdi-shield"></span>
                    <div class="value">{{ __('global.appointment_text') }}</div>
                </div>
                <div class="buttons">
                    <button type="button" class="button-preset-cancel">{{ __('global.cancel') }}</button>
                    <button class="button-preset-submit" type="submit">{{ __('global.send') }}</button></div>
            </form>
        </div>
    </div>
    <div class="page-sticky-menu-component"><!---->
        <div class="container appointment-up">
            <div class="appointment">
                <button class="online" type="button" data-toggle="modal" data-target="#modal">{{ __('global.sticky_menu.appointment') }}</button>
                <a href="#tlcallback" class="button recall mt-0">
                    <i class="fa fa-phone"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
