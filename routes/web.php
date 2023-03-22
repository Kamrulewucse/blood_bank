<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutFaqController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\RequestController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['auth'])->group(function (){

    Route::middleware(['custom:1'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth'])->name('dashboard');
        // Category
        Route::get('slider', [SliderController::class,'index'])->name('slider');
        Route::get('slider/add', [SliderController::class,'add'])->name('slider.add');
        Route::post('slider/add', [SliderController::class,'addPost']);
        Route::get('slider/edit/{slider}', [SliderController::class,'edit'])->name('slider.edit');
        Route::post('slider/edit/{slider}', [SliderController::class,'editPost']);

        // Category
        Route::get('category', [CategoryController::class,'index'])->name('category');
        Route::get('category/add', [CategoryController::class,'add'])->name('category.add');
        Route::post('category/add', [CategoryController::class,'addPost']);
        Route::get('category/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
        Route::post('category/edit/{category}', [CategoryController::class,'editPost']);

        // Sub Category
        Route::get('sub-category', [SubCategoryController::class,'index'])->name('sub_category');
        Route::get('sub-category/add', [SubCategoryController::class,'add'])->name('sub_category.add');
        Route::post('sub-category/add', [SubCategoryController::class,'addPost']);
        Route::get('sub-category/edit/{subCategory}', [SubCategoryController::class,'edit'])->name('sub_category.edit');
        Route::post('sub-category/edit/{subCategory}', [SubCategoryController::class,'editPost']);

        // Sub Sub Category
        Route::get('sub-sub-category', [SubSubCategoryController::class,'index'])->name('sub_sub_category');
        Route::get('sub-sub-category/add', [SubSubCategoryController::class,'add'])->name('sub_sub_category.add');
        Route::post('sub-sub-category/add', [SubSubCategoryController::class,'addPost']);
        Route::get('sub-sub-category/edit/{subSubCategory}', [SubSubCategoryController::class,'edit'])->name('sub_sub_category.edit');
        Route::post('sub-sub-category/edit/{subSubCategory}', [SubSubCategoryController::class,'editPost']);
        Route::get('admin-get-sub-category', [SubSubCategoryController::class,'getSubCategory'])->name('admin.get_sub_category');
        Route::get('admin-get-sub-sub-category', [SubSubCategoryController::class,'getSubSubCategory'])->name('admin.get_sub_sub_category');
        Route::get('sub-sub-category-faq/{subSubCategory}', [SubSubCategoryController::class,'faqAll'])->name('sub_sub_category_faq');
        Route::get('sub-sub-category/faqadd/{subSubCategory}', [SubSubCategoryController::class,'faqadd'])->name('sub_sub_category.faqadd');
        Route::post('sub-sub-category/faqadd/{subSubCategory}', [SubSubCategoryController::class,'faqAddPost']);
        Route::get('sub-sub-category/faqedit/{subSubCategoryfaq}', [SubSubCategoryController::class,'faqEdit'])->name('sub_sub_category.faqedit');
        Route::post('sub-sub-category/faqedit/{subSubCategoryfaq}', [SubSubCategoryController::class,'faqEditPost']);

        // Story
        Route::get('story', [StoryController::class,'index'])->name('story');
        Route::get('story/add', [StoryController::class,'add'])->name('story.add');
        Route::post('story/add', [StoryController::class,'addPost']);
        Route::get('story/edit/{story}', [StoryController::class,'edit'])->name('story.edit');
        Route::post('story/edit/{story}', [StoryController::class,'editPost']);

        // FAQ
        Route::get('faq', [FaqController::class,'index'])->name('faq');
        Route::get('faq/add', [FaqController::class,'add'])->name('faq.add');
        Route::post('faq/add', [FaqController::class,'addPost']);
        Route::get('faq/edit/{faq}', [FaqController::class,'edit'])->name('faq.edit');
        Route::post('faq/edit/{faq}', [FaqController::class,'editPost']);

        // About Us
        Route::get('about', [AboutController::class,'index'])->name('about');
        Route::get('about/edit/{about}', [AboutController::class,'edit'])->name('about.edit');
        Route::post('about/edit/{about}', [AboutController::class,'editPost']);


        // FAQ
        Route::get('aboutFaq', [AboutFaqController::class,'index'])->name('about_faq');
        Route::get('aboutFaq/add', [AboutFaqController::class,'add'])->name('about_faq.add');
        Route::post('aboutFaq/add', [AboutFaqController::class,'addPost']);
        Route::get('aboutFaq/edit/{id}', [AboutFaqController::class,'edit'])->name('about_faq.edit');
        Route::post('aboutFaq/edit/{id}', [AboutFaqController::class,'editPost']);

       //Request For Blood
        Route::get('request-blood', [RequestController::class,'requestedList'])->name('request_blood');
        Route::get('approve-request/{bloodRequest}', [RequestController::class,'requestApprove'])->name('approve_request');
//        Route::get('approve-request-cancel/{bloodRequest}', [RequestController::class,'cancelRequest'])->name('cancel_request');
        Route::get('approved', [RequestController::class,'requestApproved'])->name('blood_request.approve');
        Route::get('request-confirm/{bloodRequest}', [RequestController::class,'requestConfirm'])->name('request_confirm');
        Route::get('request-completed', [RequestController::class,'requestCompleted'])->name('request_completed');
        Route::get('all-users-list', [RequestController::class,'allUsers'])->name('admin.all_users');
        Route::get('request-accept-list/{bloodRequest}', [RequestController::class,'requestAcceptList'])->name('request_accept_list');

        //Request For Blood Donate
        Route::get('request-blood-donate', [RequestController::class,'donateRequestedList'])->name('request_blood_donate');
        Route::get('donate-approve-request/{donorRequest}', [RequestController::class,'donateRequestApprove'])->name('donate_approve_request');
        Route::get('donate-approve-request-cancel/{donorRequest}', [RequestController::class,'cancelDonateRequest'])->name('donate_cancel_request');
        Route::get('donate-approved', [RequestController::class,'donateRequestApproved'])->name('approve_donate');
        Route::get('donate-request-confirm/{donorRequest}', [RequestController::class,'donateRequestConfirm'])->name('donate_request_confirm');
        Route::get('donate-request-completed', [RequestController::class,'donateRequestCompleted'])->name('request_completed_donate');

    });

});

//Frontend
        Route::middleware(['custom:2'])->group(function () {

        });

        Route::get('/',[HomeController::class,'home'])->name('home');
        Route::get('my-profile/{id}',[HomeController::class,'myProfile'])->name('my_profile');
        Route::get('donor-list',[HomeController::class,'donorList'])->name('donor_list');
        Route::get('stories',[HomeController::class,'stories'])->name('stories');
        Route::get('stories/{slug}',[HomeController::class,'storiesDetails'])->name('stories_details');
        Route::get('sub-details/{slug}',[HomeController::class,'SubDetails'])->name('sub_details');
        Route::get('sub-sub-details/{slug}',[HomeController::class,'SubSubDetails'])->name('sub_sub_details');
        Route::get('request-confirmation/',[HomeController::class,'requestConfirmation'])->name('request_confirmation');

        Route::get('request-all/',[HomeController::class,'requestToAll'])->name('request_to_all_donor');
        Route::post('request-all/',[HomeController::class,'requestToAllPost']);
//        Route::post('request-all/',[HomeController::class,'']);

        // Notification
        Route::get('notification', [NotificationController::class,'all'])->name('notification');
        Route::get('notification-mark-read', [NotificationController::class,'markRead'])->name('mark_read');
        Route::get('notification-details', [NotificationController::class,'notificationDetails'])->name('notification_details');
        Route::get('notification-detail/{bloodRequest}', [NotificationController::class,'notificationDetail'])->name('notification_detail');
        Route::get('NotificationAccept/{bloodRequest}', [NotificationController::class,'notificationAccept'])->name('notification_accept');

        //About Us
        Route::get('about-us',[AboutUsController::class,'index'])->name('about_us');
        Route::get('latest-new-stories',[AboutUsController::class,'latestNews'])->name('latest_news');

        //User Login/Registration
        Route::get('user-login',[IndexController::class, 'login'])->name('login_home');
        Route::post('user-login',[IndexController::class, 'loginPost']);
        Route::post('user-register',[IndexController::class, 'userAdd'])->name('user_register');
        Route::get('get-district', [IndexController::class,'getDistrict'])->name('get_district');
        Route::get('get-thana', [IndexController::class,'getThana'])->name('get_thana');


require __DIR__.'/auth.php';
