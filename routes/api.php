<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // User Alerts
    Route::apiResource('user-alerts', 'UserAlertsApiController', ['except' => ['update']]);

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Question
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Hospital
    Route::post('hospitals/media', 'HospitalApiController@storeMedia')->name('hospitals.storeMedia');
    Route::apiResource('hospitals', 'HospitalApiController');

    // Status
    Route::apiResource('statuses', 'StatusApiController');

    // Applicant
    Route::apiResource('applicants', 'ApplicantApiController');

    // Appointment
    Route::apiResource('appointments', 'AppointmentApiController');

    // Specialist
    Route::post('specialists/media', 'SpecialistApiController@storeMedia')->name('specialists.storeMedia');
    Route::apiResource('specialists', 'SpecialistApiController');

    // Doctor
    Route::post('doctors/media', 'DoctorApiController@storeMedia')->name('doctors.storeMedia');
    Route::apiResource('doctors', 'DoctorApiController');

    // Division
    Route::apiResource('divisions', 'DivisionApiController');

    // District
    Route::apiResource('districts', 'DistrictApiController');

    // Upazila
    Route::apiResource('upazilas', 'UpazilaApiController');

    // Weekly Day
    Route::apiResource('weekly-days', 'WeeklyDayApiController');

    // Doctor Serial
    Route::apiResource('doctor-serials', 'DoctorSerialApiController');

    // Guest Patient
    Route::apiResource('guest-patients', 'GuestPatientApiController');

    // Appointment Report
    Route::post('appointment-reports/media', 'AppointmentReportApiController@storeMedia')->name('appointment-reports.storeMedia');
    Route::apiResource('appointment-reports', 'AppointmentReportApiController');

    // Blog
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // Platform
    Route::post('platforms/media', 'PlatformApiController@storeMedia')->name('platforms.storeMedia');
    Route::apiResource('platforms', 'PlatformApiController');
});
