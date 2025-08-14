<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GrievanceController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\TenderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BrochureController;
use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', [ApplicationController::class, 'index']);
require __DIR__.'/auth.php';

Route::get('/about', [ApplicationController::class, 'getAbout'])->name('about');
Route::get('/products', [ApplicationController::class, 'getProducts'])->name('products');
Route::get('/get-description/{id}', [ApplicationController::class, 'getProductDetails'])->name('get-description');
Route::get('/contacts', [ApplicationController::class, 'getContacts'])->name('contacts');


Route::get('/brochure', [ApplicationController::class, 'getBrochure'])->name('brochure');
Route::post('/downloadBrochure', [ApplicationController::class, 'downloadBrochure'])->name('downloadBrochure');




//routes for backend
Route::middleware(['auth'])->group(function () {

    Route::get('admin/home',function(){
        return view('backend.index');
    });

    Route::get('/images',[AdminController::class, 'images']);
    Route::get('/addimage',[AdminController::class, 'add_image']);
    Route::post('/addimage',[AdminController::class, 'store_image']);
    Route::get('/editimage/{id}',[AdminController::class, 'edit_image']);
    Route::post('/editimage/{id}',[AdminController::class, 'update_image']);
    Route::get('/deleteimage/{id}',[AdminController::class, 'delete_image']);

    Route::get('/gallery',[GalleryController::class,'index'])->name('gallery.index');
    Route::post('/store-album',[GalleryController::class,'store'])->name('gallery.store');
    Route::get('/sub-album/{id}',[GalleryController::class,'subAlbum'])->name('gallery.sub-category');
    Route::post('/store-sub-album/{id}',[GalleryControllerr::class,'storeSubAlbum'])->name('gallery.store.sub-album');
    Route::get('/album.add-images/{type}/{id}',[GalleryController::class,'addImage'])->name('gallery.add-image');
    Route::post('/store-images/{id}',[GalleryController::class,'storeImages'])->name('gallery.store.image');
    Route::get('/album.delete-album/{id}',[GalleryController::class,'deleteAlbum'])->name('gallery.album-delete');
    Route::get('/image.delete/{id}',[GalleryController::class,'deleteImage'])->name('gallery.image-delete');
    //deleteSubAlbum
    Route::get('/subalbum.delete/{id}',[GalleryController::class,'deleteSubAlbum'])->name('gallery.sub-album-delete');

    //notification
    Route::get('/notification',[NotificationController::class,'index'])->name('notification.index');
    Route::get('/notification/create',[NotificationController::class,'create'])->name('notification.create');
    Route::post('/notification/store',[NotificationController::class,'store'])->name('notification.store');
    Route::get('/notification/edit/{id}',[NotificationController::class,'edit'])->name('notification.edit');
    Route::post('/notification/update/{id}',[NotificationController::class,'update'])->name('notification.update');
    Route::get('/notification/view/{id}',[NotificationController::class,'view'])->name('notification.view');
    Route::get('/notification/delete/{id}',[NotificationController::class,'destroy'])->name('notification.delete');

    Route::post('/update-order', [NotificationController::class,'updateOrder'])->name('update.order.notification');



    //tender
    Route::get('/tender',[TenderController::class,'index'])->name('tender.index');
    Route::get('/tender/create',[TenderController::class,'create'])->name('tender.create');
    Route::post('/tender/store',[TenderController::class,'store'])->name('tender.store');
    Route::get('/tender/edit/{id}',[TenderController::class,'edit'])->name('tender.edit');
    Route::post('/tender/update/{id}',[TenderController::class,'update'])->name('tender.update');
    Route::get('/tender/view/{id}',[TenderController::class,'view'])->name('tender.view');
    Route::get('/tender/delete/{id}',[TenderController::class,'destroy'])->name('tender.delete');

    Route::post('/update-order-tender', [TenderController::class,'updateOrderTender'])->name('update.order.tender');


    Route::get('/menu',[MenuController::class,'index'])->name('menu.index');

    Route::post('/menu',[MenuController::class,'store'])->name('menu.store');
    Route::get('/edit-menu/{id}',[MenuController::class,'edit'])->name('menu.edit');
    Route::post('/update-menu/{id}',[MenuController::class,'updateMenu'])->name('menu.update');
    Route::get('/change-status/{id}',[MenuController::class,'changeStatus'])->name('menu.change.status');
    Route::get('/add-submenu/{slug}',[MenuController::class,'addSubmenu'])->name('menu.add.submenu');
    Route::post('/store-submenu',[MenuController::class,'storeSubmenu'])->name('menu.store.submenu');


    Route::get('/banner',[BannerController::class,'index'])->name('banner.index');
    Route::get('/banner/create',[BannerController::class,'create'])->name('banner.create');
    Route::post('/banner/store',[BannerController::class,'store'])->name('banner.store');
    Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
    Route::get('/banner/changes-status/{id}',[BannerController::class,'changeStatus'])->name('banner.change.status');
    Route::post('/banner/update/{id}',[BannerController::class,'update'])->name('banner.update');
    Route::get('/banner/view/{id}',[BannerController::class,'view'])->name('banner.view');
    Route::get('/banner/delete/{id}',[BannerController::class,'destroy'])->name('banner.delete');


    Route::get('/brochure-index',[BrochureController::class,'index'])->name('brochure.index');
    Route::get('/brochure/view/{id}',[BrochureController::class,'view'])->name('brochure.view');

    // grievance-details
    Route::get('/grievance',[GrievanceController::class,'index'])->name('grievance-details');

// add-content
    Route::get('/add-content/{slug}',[AdminController::class,'addContent'])->name('add-content');
    Route::post('/store-content',[AdminController::class,'storeContent'])->name('store-content');

    ///contact Us data

    Route::post('/update-contact', [AdminController::class, 'updateContactUs'])->name('updateContactUs');

    Route::post('/editor/image_upload', [AdminController::class, 'upload'])->name('upload');

    //storeProducts
    Route::get('/add-products', [AdminController::class, 'addProducts'])->name('add-products');
    Route::post('/store-products',[AdminController::class,'storeProducts'])->name('store-products');

    Route::get('/edit-products/{id}', [AdminController::class, 'editProducts'])->name('edit-products');
    Route::post('/update-products/{id}', [AdminController::class, 'updateProducts'])->name('update-products');
    Route::get('/delete-products/{id}', [AdminController::class, 'deleteProducts'])->name('delete-products');


});

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('/submit-contact',[ApplicationController::class,'submitContact'])->name('submit-contact');

Route::get('/clear', function() {
    Artisan::call('optimize:clear');
    return redirect()->back();
});
