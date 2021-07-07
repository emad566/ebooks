=======================================
# 000: Laravel Framework: 8.22.1
=======================================
you need to install  nodejs
to get node version:
node -v

=======================================
# 001: Section 1: Introduction
=======================================
https://github.com/easylearningbd/laravelecommerce

=======================================
# 002: Section 2: Laravel 8 A-Z Basic Fandamentals with Complete Dynamic Web Project
=======================================
composer create-project laravel/laravel basic


//-- 13. What is Route
-----------------------------
Six Types of Route Method
1- Get
2- Post
3- Put
4- Delete
5- Patch
6- options

//-- 17. Middleware
-----------------------------
To create middleware add it in the Kernal.php

//-- from  20. Laravel 8 Authentication install
-----------------------------
Laravel_8 auth different from laravel_7 auth


** laravel_7 auth installions
composer require laravel/ui:^2.4
php artisan ui vue --auth

** laravel_8 auth installions
composer require laravel/jetstream
php artisan jetstream:install livewire
npm install && npm run dev

php artisan migrate
php artisan serve

*** Register New user:
admin
emade09@gmail.com
12345678

*** add boot startp files to view
{{ $user->created_at->diffForHumans() }}

//-- 022. Eloquent ORM Read Users Data
--------------------------------------
if use::
    DB::table('users')->get();
Then
{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}

*** Category Models
<!-- php artisan make:migration Create_categories_table --create=categories -->
php artisan make:model Category -m

//--- Emadeldeen install Multi langauges onfigrations
-----------------------------------------------
composer require mcamara/laravel-localization

*** for translation
npm i bootstrap-v4-rtl

*** for rtl-css ******************

@if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous" />
@else
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endif

<!-- Bootstrap JS Files -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

@if(app()->getLocale() == 'ar')
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.min.js" integrity="sha384-VmD+lKnI0Y4FPvr6hvZRw6xvdt/QZoNHQ4h5k0RL30aGkR9ylHU56BzrE2UoohWK" crossorigin="anonymous"></script>
@else
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
@endif

*** Translations Modules:
package for translatable "astroic/laravel-translatable"
https://github.com/Astrotomic/laravel-translatable

//**Install Multi subcategory nested */
----------------------------------------
https://github.com/lazychaser/laravel-nestedset
composer require kalnoy/nestedset

/*** 42. Image Insert & Resize With Intervention Package */
------------------------------------------------------------
Awsame package for image editing.
http://image.intervention.io/

/** 45. Update User Profile and Change Password */
----------------------------------------------------
php artisan storage:link

in .env file:
APP_URL=http://127.0.0.1:8000

/** 46. Forgot Password & Password Reset */
--------------------------------------------
--
MAIL_MAILER=smtp
--- App URL SHULD BE EMPTY IN .env file
APP_URL=http://127.0.0.1:8000
----
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=2dac6776d30617
MAIL_PASSWORD=9ce19dab9de248
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=info@emadeldeen.com
MAIL_FROM_NAME="${APP_NAME}"

/** 47. Email Verify in Laravel */
---------------------------------
1:
https://laravel.com/docs/8.x/verification#model-preparation

In User.php model:
class User extends Authenticatable implements MustVerifyEmail

2:
https://laravel.com/docs/8.x/verification#the-email-verification-notice
Route:

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

3:
config\fortify.php
enable
Features::emailVerification(),

or disable


---------------------------------------------------
***
Finshed product but you must fix choose product categories at create or edit product
(as HTML and in productsController),

***
also you must fix edit category.

Next Video is (After Fix  previous notes):  Dynamic category,subcategory Part 1


------------------------------------------
*** Create view and nested select

CREATE OR REPLACE VIEW PHs AS
SELECT c.client_name, r.r_name,
(select regions.city_id FROM regions WHERE regions.city_id = r.city_id) CityID,
(select regions.r_name FROM regions WHERE regions.id = r.city_id) City,
(select regions.state_id FROM regions WHERE regions.state_id = r.state_id) StateID,
(select regions.r_name FROM regions WHERE regions.id = r.state_id) State

from clients c
inner join regions r
on c.region_id = r.id



