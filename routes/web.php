<?php

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






Route::get('/','FrontController@index')->name('index');
Route::get('/courseDetail/{course}','FrontController@ShowCourse')->name('courseDetail');
Route::get('/category/{id}','FrontController@categories')->name('category');
Route::get('/showcase','MyCourseController@showcase')->name('data.showcase');
Route::get('/registerMentor','RegisterMentorController@register')->name('register.mentor');
Route::post('/storeregisterMentor','RegisterMentorController@store')->name('register.mentor.store');

Auth::routes();


//Route Student
Route::group(['middleware' => ['auth','checkRole:student']], function ()
    {
        Route::get('/my-course','MyCourseController@index')->name('profile');
        Route::get('/my-course/account','MyCourseController@account')->name('user.account');
        Route::post('/my-course/update/{id}','MyCourseController@resetPassword')->name('account.update');
        Route::post('/user-update/update/{id}','MyCourseController@update')->name('update.user');
        Route::get('/my-course/{id}','MyCourseController@showCourse')->name('myCourse.show');
        Route::get('/getcertificate/certificate','MyCourseController@getCertificate')->name('myCourse.certicifate');
        Route::post('/storecertificate','MyCourseController@storeCertificate')->name('store.certicifate');
        Route::get('/certificate/{id}','MyCourseController@Certificate')->name('data.certicifate');
        Route::get('/project','MyCourseController@getProject')->name('data.Project');
        Route::get('/project/{id}/edit','MyCourseController@editProject')->name('edit.data.Project');
        Route::put('/project/{id}','MyCourseController@updateProject')->name('update.data.Project');
        Route::delete('/project/{id}','MyCourseController@destroyProject')->name('data.destroy.project');
        Route::get('/lesson/{id}', 'LessonController@index')->name('lesson');
        Route::get('/lesson/{id}/{lessonid}', 'LessonController@show')->name('show');
        Route::post('/order/{id}','FrontController@order')->name('order');
        Route::get('/checkout','FrontController@checkout')->name('checkout');
        Route::delete('/checkout/{id}','FrontController@checkout_destroy')->name('checkout.delete');
        Route::get('/confirm-checkout','FrontController@checkout_confirm')->name('checkout.confirm');
        Route::get('/history','FrontController@history_transaction')->name('history.transaction');
        Route::get('/history/{id}','FrontController@history_detail')->name('history.detail');
        Route::post('review', 'ReviewController@store')->name('review.store');
        Route::get('/transfer/{id}','FrontController@transfer')->name('upload.transfer');
        Route::put('/storeTransfer/{id}','FrontController@transferStore')->name('transfer.store');

        Route::get('/myforum','myForumController@index')->name('front.forum');
        Route::get('/myforum/{id}','myForumController@show')->name('forum.show');
         Route::get('/myforum/{forum}/edit','myForumController@editForum')->name('forum.edit');
        Route::put('/myforum/{id}','myForumController@updateforum')->name('forum.update');
        Route::post('/storeMyForum','myForumController@store')->name('forum.store');
        Route::get('/myforum/{forum}/view','myForumController@view')->name('forum.view');
        Route::post('/myforum/{forum}/view','myForumController@postkomentar')->name('forum.view');
        Route::delete('/myforum/{id}','myForumController@destroykomentar')->name('forum.destroy');
        
          Route::get('mydownload/{file}', 'MyCourseController@getDownload')->name('mydownload');
    }
);

//Route Mentor
Route::group(['middleware' => ['auth','checkRole:mentor']], function ()
{
    Route::get('/dashboard','MentorController@index')->name('mentor.dashboard');
//MentorCrudCourse
    Route::get('/showCourse','MentorController@showMentorCourse')->name('mentor.course');
    Route::get('/detailCourse/{id}/detail','MentorController@detailMentorCourse')->name('mentor.detail.course');
    Route::get('/revenue','MentorController@revenue')->name('mentor.revenue');
    Route::get('/revenue/cetak_pdf','MentorController@cetakRevenue')->name('mentor.cetak.revenue');
    Route::get('/createCourse','MentorController@createCourse')->name('mentor.create.course');
    Route::post('/storeCourse','MentorController@storeCourse')->name('mentor.store.course');
    Route::get('/editCourse/{id}/edit','MentorController@editCourse')->name('mentor.edit.course');
    Route::put('/updateCourse/{id}','MentorController@updateCourse')->name('mentor.update.course');
    Route::delete('/destroyCourse/{id}','MentorController@destroyCourse')->name('mentor.destroy.course');

    Route::get('/forum','ForumController@index')->name('mentor.forum');
    Route::get('/forum/{id}','ForumController@show')->name('mentor.forum.show');
     Route::get('/forum/{forum}/edit','ForumController@editForum')->name('mentor.forum.edit');
    Route::post('/storeForum','ForumController@store')->name('mentor.forum.store');
     Route::put('/forum/{id}','ForumController@updateforum')->name('mentor.forum.update');
    Route::get('/forum/{forum}/view','ForumController@view')->name('mentor.forum.view');
    Route::post('/forum/{forum}/view','ForumController@postkomentar')->name('mentor.forum.view');
    Route::delete('/forum/{id}','ForumController@destroykomentar')->name('mentor.forum.destroy');
    // Route::get('/forum/{id}/edit','ForumController@updateKomentar')->name('mentor.forum.update');

//MentorCrudChapter
    Route::get('/showChapter','MentorController@showChapter')->name('mentor.chapter');
    Route::get('/createChapter','MentorController@createChapter')->name('mentor.create.chapter');
    Route::post('/storeChapter','MentorController@storeChapter')->name('mentor.store.chapter');
    Route::get('/editChapter/{id}/edit','MentorController@editChapter')->name('mentor.edit.chapter');
    Route::put('/updateChapter/{id}','MentorController@updateChapter')->name('mentor.update.chapter');
    Route::delete('/destroyChapter/{id}','MentorController@destroyChapter')->name('mentor.destroy.chapter');

//MentorCrudLesson
    Route::get('/showLesson','MentorController@showLesson')->name('mentor.lesson');
    Route::get('/createLesson','MentorController@createLesson')->name('mentor.create.lesson');
    Route::post('/storeLesson','MentorController@storeLesson')->name('mentor.store.lesson');
    Route::get('/editLesson/{id}/edit','MentorController@editLesson')->name('mentor.edit.lesson');
    Route::put('/updateLesson/{id}','MentorController@updateLesson')->name('mentor.update.lesson');
    Route::delete('/destroyLesson/{id}','MentorController@destroyLesson')->name('mentor.destroy.lesson');

//UpdatePassword
    Route::get('/myMentor/account','MentorController@account')->name('mentor.account');
    Route::put('/myMentor/update/{id}','MentorController@updateMentor')->name('mentor.account.update');
    Route::get('/mentorPassword/password','MentorController@password')->name('mentor.password');
    Route::put('/mentorPassword/update/{id}','MentorController@resetPassword')->name('mentor.password.update');

    //certificate
    Route::get('/Mcertificate','MentorController@certificate')->name('mentor.certificate.index');
    Route::get('MchangeStatusCertificate/{id}', 'MentorController@changeStatusCertificate')->name('mentor.certificate.status');
}
);

//Route Admin
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'middleware' => ['auth','checkRole:admin']], function ()
    {
        
        Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::resource('category', 'CategoryController');
        Route::resource('course', 'CourseController');
        Route::resource('mentor', 'MentorController');
        Route::resource('chapter', 'ChapterController');
        Route::resource('lesson', 'LessonController');
        Route::resource('user-admin', 'UserController');
        Route::get('download/{file}', 'UserController@getDownload')->name('download');
        Route::resource('transaction', 'TransactionController');

        Route::get('changeStatus/{id}', 'MentorController@changeStatus')->name('admin.mentor.status');
        Route::get('changeStatusTransaction/{id}', 'TransactionController@changeStatusTransaction')->name('admin.transaction.status');
        Route::get('changeStatusCertificate/{id}', 'TransactionController@changeStatusCertificate')->name('admin.certificate.status');

        Route::get('/laporanTransaksi', 'TransactionController@laporanTransaksi')->name('laporan.transaksi');
        Route::get('/cetakcourse/course_pdf', 'CourseController@cetakCourse')->name('cetak.course');
        Route::get('/cetak/cetak_pdf', 'TransactionController@cetakDataPdf')->name('cetak.transaction');
        Route::get('/cetak/cetakdetail_pdf/{id}', 'TransactionController@cetakDetailPdf')->name('cetak.detail.transaction');
       
        Route::get('/laporanRevenue', 'MentorController@laporanRevenue')->name('laporan.revenue');
        Route::get('/laporanRevenue/{id}', 'MentorController@dateLaporanRevenue')->name('laporan.form.revenue');
        Route::get('/cetaklaporanRevenue/cetak', 'MentorController@cetakLaporanRevenue')->name('cetak.laporan.revenue');

        Route::resource('setting', 'SettingController');
        Route::get('/admin/password','UserController@password')->name('admin.password');
        Route::put('/admin/update/{id}','UserController@ressetPassword')->name('admin.password.update');
        Route::get('/certificate','TransactionController@certificate')->name('certificate.index');
        Route::get('/certificate/{id}','TransactionController@certificateEdit')->name('certificate.edit');
        Route::put('/certificate/{id}','TransactionController@certificateUpdate')->name('certificate.update');

        Route::get('/adminStudent','UserController@indexStudent')->name('student.index');
        Route::get('/CreateStudent','UserController@createStudent')->name('student.create');
        Route::get('/adminStudent/{id}','UserController@showStudent')->name('student.show');
        Route::get('/adminStudent/{id}/edit','UserController@editStudent')->name('student.edit');
        Route::put('/adminStudent/update/{id}','UserController@studentUpdate')->name('student.update');
        Route::post('/adminStudent','UserController@storeStudent')->name('student.store');
        Route::delete('/adminStudent/{id}','UserController@studentDestroy')->name('student.destroy');
      
    }
);




Route::get('/home', 'HomeController@index')->name('home');
