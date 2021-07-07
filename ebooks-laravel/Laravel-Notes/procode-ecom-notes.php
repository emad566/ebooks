#=======================================================================
# 001
#=======================================================================
php artisan --version

#=======================================================================
# 002
#=======================================================================
==========================================
# 01 Git commands: command Line CMD
==========================================
git remote add origin "reposatory url path"  // To get reposatory from github

git init
git add README.md
git add .                                    // to add all files to uploud: must be before commit
git commit -m "commit title"                //creat new commit
git checkout -b 'new branch name'                     // Create new branch
git branch                                    // Get current branch name
git push -u origin "branch name"                  // upload in a branch
git push -u origin master                   // // push in a master to hold all version of project
// Go to settings>branches  ans set the master to be the default branch

git branch              //git current branch on local
git status              //git status on new files on local

git push -d origin <branch name >           //delet branch

#=======================================================================
# 003
#=======================================================================
*** Set Routes
- copy web to site.php 002_After_Setting_module
- copy web to admin.php
- app>Providers>RoutServiceProvider.php  // in function map()
    $this->mapSiteRoutes();
    $this->mapAdminRoutes();

    // Duplicate the: protected function mapWebRoutes() function for each route name

*** Arrange Folders:
- Create two folders in controller folder (Dashboard & Site)
- Create a folder "Models" in App folder, then Mover User.php model to model folder and change
        namespace to App\Models

*** Install packages
1- package for translatable "astroic/laravel-translatable"
https://github.com/Astrotomic/laravel-translatable

2- package for Admin translatable "mcamara/laravel-localization"
https://github.com/mcamara/laravel-localization

17:30
3- package for datatable "yajra/laravel-datatable"
https://github.com/yajra/laravel-datatables
php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"

#=======================================================================
# 004
#=======================================================================
*** Set Public files (Template Files):
    1- copy files from ahmed emam reposatory (public/assets) to public folder (assets)
    2- Delete folder in public/assets/images (Its are not needed)
*** Set resoures view folders:
    1- Create folders in resources/view folder
                    +dashboard
                        +includes
                            +alerts
                    +site
                        +includes
                            +alerts
                    +layouts
                        -admin.blade.php //(Copy it from the reposatory)
                        -login.blade.php //(Copy it from the reposatory)

#=======================================================================
# 005
#=======================================================================
*** Delet if statment from body tag
*** Copy includes forlder form resources/view/admin to resources/view/dashboard
*** Delete all {{  }} in sidebar.blade.php
*** Test view in browser with creating route in web.php
    Route::get('/test', function () {
        return view('layouts/admin');
    });

#=======================================================================
# 006: make admin table using migration - eCommerce multi languages and tenancy
#=======================================================================
*** Create the database and link it in .env file
*** Run php artisan config:cache // to load the new config settings
*** To create admins table from migration run:
    -> php artisan make:migration create_admins_table --create=admins

        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

    -> open app\providers\AppServiceProvider.php
        - Then add/change to be:
            use Illuminate\Support\Facades\Schema;
            public function boot()
            {
                Schema::defaultStringLength(191);
            }

    -> php artisan migrate


*** In file: config/auth
    1- Create new guard named admin in gards to be:
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    2- Create a new provider for the new guard admin in providers,
        and change path to the new Model User.php path
        and create new Model named Admin.php and change path to reffer to it
        to be:

        'providers' => [
            'users' => [
                'driver' => 'eloquent',
                'model' => App\Models\User::class,
            ],

            'admins' => [
                'driver' => 'eloquent',
                'model' => App\Models\Admin::class,
            ],

            // 'users' => [
            //     'driver' => 'database',
            //     'table' => 'users',
            // ],
        ],

#=======================================================================
# 007: admin authentication - guard and tinker account to login
#=======================================================================
*** php artisan make:model Models\\Admin
    Then change it to:

    class Admin extends Authenticatable
    {
        protected $table = 'admins';
        protected $guarded=[]; // to include all fields
        public $timestamps = true;
    }

*** In routes\admin
    Route::group(['namespace' => 'Dashboard', 'middleware'=>'auth:admin'], function () {

    });

*** Create first admin from tinker
    php artisan tinker
    $admin = new App\Models\Admin
    $admin->name ='Emadeldeen'
    $admin->email ='emade09@gmail.com'
    $admin->password =bcrypt('12345678')
    $admin->save()

#=======================================================================
# 008: prevent admin routes using admin middle ware
#=======================================================================
*** In routes\admin: Add prefix to route in admin to be:
    Route::group(['namespace' => 'Dashboard', 'middleware'=>'auth:admin', 'prefix'=>'admin'], function () {
        Route::get('users', function () {
            return "in admin";
        })->name("admin.login");
    });

*** In routes\admin: Make route for none auth
    Route::group(['namespace' => 'Dashboard', 'prefix'=>'admin'], function () {

    });

*** In: app\Http\Middleware\Authenticate.php: add rule to use auth:admin middleware if is admin
    to be:
    use Request;
    if (! $request->expectsJson()) {
        if(Request::is('admin/*'))
            return route('admin.login');
        else
            return route('login');
    }

*** In: routes\admin: add login route, to be:
    Route::group(['namespace' => 'Dashboard', 'prefix'=>'admin'], function () {
        Route::get('login', function () {
            return "please: logIn";
        })->name("admin.login");
    });


#=======================================================================
#009: admin login form and route- make admin login form and route
#=======================================================================
*** php artisan make:controller Dashboard\\LoginController

*** In: routes\admin: change to
    Route::group(['namespace' => 'Dashboard', 'prefix'=>'admin'], function () {
        Route::get('login', 'LoginController@login')->name("admin.login");
    });

*** create Folder view\dashoard\auth
*** create file view\dashoard\auth\login.blade.php

*** In Dashboard\LoginController.php: add
    public function login()
    {
        return view('dashboard.auth.login');
    }

*** In view\dashoard\auth\login.blade.php: add login form: is in: github

*** In: routes\admin: add route for post login
Route::post('login', 'LoginController@postLogin')->name("admin.postLogin");

*** In Chrome Browser install extension: JSON Formator:
    https://chrome.google.com/webstore/detail/json-formatter/bcjindcccaagfpapjjmafapmmgkkhgoa

#=======================================================================
#010: admin attempt guard login and request
#=======================================================================
*** php artisan make:Request AdminLoginRequest
*** in AdminLoginRequest.php
    authorize()/true
*** Install Extenstion:PHP Namespace Resolver
    https://marketplace.visualstudio.com/items?itemName=MehediDracula.php-namespace-resolver
*** In Admin.php model let it extend:

#=======================================================================
#011: finish admin login to dashboard after success authentication
#=======================================================================
*** Create AdminDashboard route
*** php artisan make:controller DashboardController
*** Creat DashboardController index function

#=======================================================================
#012: upload source code to GitHub branch ,prepare dashboard index
#=======================================================================


#=======================================================================
#013  project Settings -Shipping Methods- -eCommerce multi languages ,tenancy
#=======================================================================
*** create_settings_table
*** create_settings_translatable_table
*** cascaed:
        $table->unique(['setting_id', 'locale']);
        $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
***

#=======================================================================
#014  Seeding default settings to database table using seeder
#=======================================================================
php artisan make:model Models\Setting
php artisan make:model Models\SettingTranslation

#=======================================================================
#015 finish Seeding default settings to database using seeder
#=======================================================================
php artisan make:seeder settingDatabaseSeeder
*** change setting module for seeding and translations

php artisan db:seed --class=settingDatabaseSeeder

#=======================================================================
#016
#=======================================================================

#=======================================================================
#017
#=======================================================================
*** To malk laravel relaad new files run:
    composer dump-autoload
    php artisan config:cache

#=======================================================================
#18
#=======================================================================
*** 9:26 MINUTS: Helpers File creation

#=======================================================================
#20
#=======================================================================
How to get translated value based on current locale_get_display_language

#=======================================================================
#21 edit and update shipping methods Validation part2
#=======================================================================

#=======================================================================
#26 categories and subcategories migrations and seeder usaing Factory
#=======================================================================
php artisan make:migration create_categories_table --create=categories
php artisan make:migration create_category_translations_table --create=category_translations
php artisan migrate
php artisan make:model Models\Category
php artisan make:model Models\CategoryTranslation

php artisan make:factory CategoryFactory --model=Models\Category
php artisan make:seeder CategoryDatabaseSeeder

composer dump-auoload
php artisan db:seed --class=CategoryDatabaseSeeder

#=======================================================================
#27 categories CRUD part 1
#=======================================================================
//$category->makeVisible('translations');

#=======================================================================
#30 Subcategories CRUD part 1
#=======================================================================
https://meduim.com          // laravel code snippts : need VPN or write: https://meduim.com.
php artisan db:seed --class=SubCategoryDatabaseSeeder

#=======================================================================
#33 Brands CRUD part 1
#=======================================================================
php artisan make:migration create_brands_table --create=brands
php artisan make:migration create_brand_translations_table --create=brand_translations
php artisan migrate

php artisan make:model Models\Brand
php artisan make:model Models\BrandTranslation
php artisan migrate

php artisan make:migration add_photo_column_to_brands_table --table=brands
php artisan migrate


php artisan migrate

03:48 Learn file system

php artisan config:cache
composer dump-auoload


#=======================================================================
#36 Tags CRUD part 1
#=======================================================================

php artisan make:migration create_tags_table --create=tags
php artisan make:migration create_tag_translations_table --create=tag_translations

php artisan migrate

php artisan make:model Models\Tag
php artisan make:model Models\TagTranslation

#=======================================================================
#39 Apply OOP Traits , Enumerations and Final concepts
#=======================================================================
11:30 : Enumerations class
Install spatie/laravel-enum : https://github.com/spatie/laravel-enum
composer require spatie/laravel-enum


#=======================================================================
#40 Repository Design pattern using interface
#=======================================================================

#=======================================================================
#41 Product Migrations, seeders and models
#=======================================================================
php artisan make:migration create_products_table --create=products
php artisan make:migration create_product_translations_table --create=product_translations
php artisan make:migration create_product_categories_table --create=product_categories
php artisan make:migration create_product_tags_table --create=product_tags

$table->softDeletes();

php artisan migrate
php artisan DB:seed --calss=ProductDatabaseSeeder

#=======================================================================
#42 Product CRUD general information :images Table
#=======================================================================

php artisan make:migration create_product_images_table --create=product_images
php artisan migrate

Drop down multiSelect inout at: 28:00 minut
add texteditor for text area at: 43:00
Drop down multiSelect inout Validate 44:30

#=======================================================================
#01: Laravel Spatie Packages: Laravel-activitylog : part_o1
#=======================================================================
https://github.com/spatie/laravel-activitylog
https://spatie.be/docs/laravel-activitylog/v3/introduction
https://www.youtube.com/watch?v=XWFXikdTFcw&list=PLe30vg_FG4OQ47ovsjgSSX5BZy_kqbuTO&index=3

#=======================================================================
#02: Spatie Laravel Permission Package Tutorial | Introduction #1
#=======================================================================
https://github.com/spatie/laravel-permission
https://spatie.be/docs/laravel-permission/v3/installation-laravel
https://github.com/spatie/laravel-permission

