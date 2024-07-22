<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Applicant In Formation
    Route::delete('applicant-in-formations/destroy', 'ApplicantInFormationController@massDestroy')->name('applicant-in-formations.massDestroy');
    Route::resource('applicant-in-formations', 'ApplicantInFormationController');

    // Company Details
    Route::delete('company-details/destroy', 'CompanyDetailsController@massDestroy')->name('company-details.massDestroy');
    Route::post('company-details/media', 'CompanyDetailsController@storeMedia')->name('company-details.storeMedia');
    Route::post('company-details/ckmedia', 'CompanyDetailsController@storeCKEditorImages')->name('company-details.storeCKEditorImages');
    Route::resource('company-details', 'CompanyDetailsController');

    // Export Details
    Route::delete('export-details/destroy', 'ExportDetailsController@massDestroy')->name('export-details.massDestroy');
    Route::post('export-details/media', 'ExportDetailsController@storeMedia')->name('export-details.storeMedia');
    Route::post('export-details/ckmedia', 'ExportDetailsController@storeCKEditorImages')->name('export-details.storeCKEditorImages');
    Route::resource('export-details', 'ExportDetailsController');

    // Compliance Information
    Route::delete('compliance-informations/destroy', 'ComplianceInformationController@massDestroy')->name('compliance-informations.massDestroy');
    Route::resource('compliance-informations', 'ComplianceInformationController');

    // Submission Checklist
    Route::delete('submission-checklists/destroy', 'SubmissionChecklistController@massDestroy')->name('submission-checklists.massDestroy');
    Route::post('submission-checklists/media', 'SubmissionChecklistController@storeMedia')->name('submission-checklists.storeMedia');
    Route::post('submission-checklists/ckmedia', 'SubmissionChecklistController@storeCKEditorImages')->name('submission-checklists.storeCKEditorImages');
    Route::resource('submission-checklists', 'SubmissionChecklistController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
