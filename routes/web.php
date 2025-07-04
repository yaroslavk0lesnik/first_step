<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ArticleController;

Route::middleware(SetLocale::class)->group(function () {
    Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function() {
        Route::get('', [PageController::class, 'index'])->name('main.index');
        Route::get('/about', [PageController::class, 'about'])->name('main.about');

        Route::get('/services', [ServicesControler::class, 'index'])->name('main.services');
        Route::get('/departments', [PageController::class, 'departments'])->name('main.departments');

        //Route::get('/schedule', [PageController::class, 'timetable'])->name('main.timetable');

        //Route::get('/schedule/{department?}', function ($department = null) {
        //      return view('main.timetable', compact('department'));
        // })->name('main.timetable');

        Route::get('/schedule/{department?}', [PageController::class, 'timetable'])->name('main.timetable');

        Route::get('/blog', [PageController::class, 'blog'])->name('main.blog');
        Route::get('/blog/post/{slug}', [PageController::class, 'blog_show'])->name('main.show');
        Route::get('/blog/category/{slug}', [PageController::class, 'blog_category'])->name('blog.category');
        Route::get('/blog/tag/{slug}', [PageController::class, 'blog_tag'])->name('blog.tag');

        // дата
        Route::get('/blog/archive/{date}', [PageController::class, 'blog'])->name('main.blog.archive');
        Route::get('/blog/archive/{date}/page/{page}', [PageController::class, 'blog_archive_paginated'])->name('main.blog.archive.paginated');

        //пошук
        Route::get('/blog/search/{query}', [PageController::class, 'search'])->name('blog.search');

        // пагінація
        Route::get('/blog/page/{page}', [PageController::class, 'blog_paginated'])->name('main.blog.page');
       // Route::get('/{locale}/blog/page/{page}', [BlogController::class, 'blog_paginated'])->where('page', '[0-9]+');
        Route::get('/blog/category/{slug}/page/{page}', [PageController::class, 'blog_category_paginated'])->name('main.category.page');
        //Route::get('/blog/category/{slug}/page/{page}', [BlogController::class, 'blog_category_paginated'])->where('page', '[0-9]+');
        Route::get('/blog/tag/{slug}/page/{page}', [PageController::class, 'blog_tag_paginated'])->name('blog.tag.page');
       // Route::get('/{locale}/blog/tag/{slug}/page/{page}', [BlogController::class, 'blog_tag_paginated'])->where('page', '[0-9]+');

        Route::get('/contacts', [PageController::class, 'contacts'])->name('main.contacts');
        Route::get('/calendar', [AppointmentControler::class, 'index'])->name('main.appointment');
        Route::get('/testimonials', [PageController::class, 'testimonials'])->name('main.testimonials');
        Route::get('/telemed', [PageController::class, 'telemed'])->name('main.telemed');
        Route::get('oftalmologiya/blepharoplastika', [PageController::class, 'blepharoplastika'])->name('main.blepharoplastika');
        Route::get('/plastichna-khururgiya', [PageController::class, 'plastichnakhururgiya'])->name('main.plastichna-khururgiya');
        Route::get('/esteticheskaya-meditsina/inektsionnaya-terapiya', [ServicePagesController::class, 'inektsionnayaterapiya'])->name('services.inektsionnaya-terapiya');
        Route::get('/esteticheskaya-meditsina/plazmoterapiya', [ServicePagesController::class, 'plazmoterapiya'])->name('services.plazmoterapiya');
        Route::get('/esteticheskaya-meditsina/rf-lifting', [ServicePagesController::class, 'rflifting'])->name('services.rf-lifting');
        Route::get('/esteticheskaya-meditsina/lazernaya-epilyatsiya', [ServicePagesController::class, 'lazernayaepilyatsiya'])->name('services.lazernaya-epilyatsiya');
        Route::get('/esteticheskaya-meditsina/lazernoe-omolozhenie', [ServicePagesController::class, 'lazernoeomolozhenie'])->name('services.lazernoe-omolozhenie');
        Route::get('/esteticheskaya-meditsina/co2', [ServicePagesController::class, 'co2'])->name('services.co2');
        Route::get('/diagnostika/checkup', [ServicePagesController::class, 'checkup'])->name('services.checkup');
        Route::get('/oftalmologiya/panoptix', [ServicePagesController::class, 'panoptix'])->name('services.panoptix');
        Route::get('/oftalmologiya/oklens', [ServicePagesController::class, 'oklens'])->name('services.oklens');
        Route::get('/tests', [ServicePagesController::class, 'tests'])->name('services.tests');
        Route::get('/esteticheskaya-meditsina/liposaktsiya-ta-liposkulpturuvannya-v-dokart', [ServicePagesController::class, 'liposaktsiya'])->name('services.liposaktsiya-ta-liposkulpturuvannya-v-dokart');

        Route::get('/doctors', [DoctorController::class, 'index'])->name('main.team');

        Route::get('/doctors/{slug}', [DoctorController::class, 'show'])->name('doctors.show');

        Route::get('/prices', [PageController::class, 'prices'])->name('main.prices');

        Route::get('/price/{category}', [ServicesController::class, 'price'])->name('prices.category');

        Route::get('/{category_slug}', [ArticleController::class, 'category_page'])->name('main.category');
        Route::get('/{category_slug}/{slug}', [ArticleController::class, 'page'])->name('main.service');
    })->where('locale', 'en|uk|ru');
});
Route::post('/appointment', [AppointmentController::class, 'post'])->name('post.appointment');


// Тут прописані маршрути тільки для зареєстрованих користувачів(включно адміністратора)
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin-panel'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::get('/doctors', [DoctorController::class, 'doctors'])->name('admin.doctors');
        Route::get('/doctors/{id}/list', [DoctorController::class, 'doctors_list'])->name('admin.doctors.list');
        Route::get('/doctor_department/create', [DoctorController::class, 'department_create'])->name('admin.doctor_department.create');
        Route::get('/doctor_department/{id}/edit', [DoctorController::class, 'department_edit'])->name('admin.doctor_department.edit');
        Route::get('/doctor/{department_id}/create', [DoctorController::class, 'create'])->name('admin.doctor.create');
        Route::post('/doctor/{department_id}/store', [DoctorController::class, 'store'])->name('admin.doctor.store');
        Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('admin.doctor.edit');
        Route::post('/doctor/{id}/update', [DoctorController::class, 'update'])->name('admin.doctor.update');
        Route::post('/doctor/department_add', [DoctorController::class, 'department_add'])->name('admin.doctor.department_add');
        Route::get('/doctor/search', [DoctorController::class, 'search'])->name('admin.doctor.search');

        Route::get('/category', [ServicesController::class, 'category'])->name('admin.category');
        Route::get('/category/create', [ServicesController::class, 'category_create'])->name('admin.category.create');
        Route::post('/category/store', [ServicesController::class, 'category_store'])->name('admin.category.store');
        Route::get('/category/{id}/edit', [ServicesController::class, 'category_edit'])->name('admin.category.edit');
        Route::post('/category/{id}/update', [ServicesController::class, 'category_update'])->name('admin.category.update');
        Route::post('/category/image_del', [ServicesController::class, 'category_image_del'])->name('admin.category.image_del');

        Route::get('/groups', [ServicesController::class, 'groups'])->name('admin.groups');

        Route::get('/{slug}/groups', [ServicesController::class, 'groups'])->name('admin.groups');
        Route::get('/groups/{slug}/create', [ServicesController::class, 'groups_create'])->name('admin.groups.create');
        Route::post('/groups/store', [ServicesController::class, 'groups_store'])->name('admin.groups.store');
        Route::get('/groups/{id}/edit', [ServicesController::class, 'groups_edit'])->name('admin.groups.edit');
        Route::post('/groups/{id}/update', [ServicesController::class, 'groups_update'])->name('admin.groups.update');

        Route::get('/prices/{group_id}/create', [ServicesController::class, 'create'])->name('admin.prices.create');
        Route::post('/prices/store', [ServicesController::class, 'store'])->name('admin.prices.store');
        Route::get('/prices/{id}/edit', [ServicesController::class, 'edit'])->name('admin.prices.edit');
        Route::post('/prices/{id}/update', [ServicesController::class, 'update'])->name('admin.prices.update');

        Route::get('/division', [DivisionController::class, 'index'])->name('admin.divisions');
        Route::get('/division/create', [DivisionController::class, 'create'])->name('admin.divisions.create');
        Route::post('/division/store', [DivisionController::class, 'store'])->name('admin.divisions.store');
        Route::get('/division/{id}/edit', [DivisionController::class, 'edit'])->name('admin.divisions.edit');
        Route::post('/division/{id}/update', [DivisionController::class, 'update'])->name('admin.divisions.update');
        Route::post('/division/{id}/category_add', [DivisionController::class, 'category_add'])->name('admin.divisions.category_add');
        Route::post('/division/category_del', [DivisionController::class, 'category_del'])->name('admin.divisions.category_del');

        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

    });
});

Route::get('/switch-language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'uk', 'ru'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    $previousUrl = url()->previous();
    $parsedUrl = parse_url($previousUrl, PHP_URL_PATH);

    $newUrl = preg_replace('/\/(en|uk|ru)(\/|$)/', "/{$locale}/", $parsedUrl, 1, $count);

    if ($count === 0) {
        $newUrl = "/{$locale}" . $parsedUrl;
    }

    return redirect($newUrl);
})->name('switch.language');

Route::get('/', function () {
    return redirect('/uk');
});

require __DIR__.'/auth.php';

