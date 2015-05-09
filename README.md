# Laravel 5 Simple CMS
Simple Laravel 5 content management system for starters. 

-----
##Table of Contents

* [Features](#item1)
* [Requirements](#item2)
* [Quick Start](#item3)
* [Installation Guide](#item4)
* [User Guide](#item5)
* [Screenshots](#item6)
* [Türkçe](#item7)
* [License](#item8)

-----
<a name="item1"></a>
##Features:
* Admin Panel
    * Based on AdminLTE theme
    * Statistics fetched by Google Analytics API integrated dashboard
	* Language management.
	* Category and article management
	* Page management with nested sets
	* Server side oriented datatables
	* TinyMCE WYSIWYG editor with photo uploading features
* Front-end
	* View articles, categories, pages
    * Multi-language support

-----
<a name="item2"></a>
##Requirements
	PHP >= 5.5.0
	MCrypt PHP Extension
	Database
	
-----
<a name="item3"></a>
##Quick Start:

    git clone https://github.com/ozdemirburak/laravel-5-simple-cms.git CUSTOM_DIRECTORY
    cd CUSTOM_DIRECTORY
    composer install
    chmod 777 vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/Serializer
    
Create database, rename `.env.example` file to `.env` and configure it

    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    bower install
    gulp --production
    php -S localhost:8000 -t public 

Open <a href="http://localhost:8000">http://localhost:8000</a> from your browser. To access the admin panel, hit the link <a href="http://localhost:8000/admin">http://localhost:8000/admin</a> from your browser. The application comes with default user with email address `admin@admin.com` and `123456`.
     
-----
<a name="item4"></a>
##Installation Guide:

* [Step 1: Download the Repository](#step1)
* [Step 2: Install Dependencies](#step2)
* [Step 3: Create database](#step3)
* [Step 4: Set Configuration](#step4)
* [Step 5: Migrate and Seed](#step5)
* [Step 6: Serve](#step6)

-----
<a name="step1"></a>
### Step 1: Download the Repository

Either Clone the repository using git clone: `git clone https://github.com/ozdemirburak/laravel-5-simple-cms.git CUSTOM_DIRECTORY` or install via <a target="_blank" href="https://github.com/ozdemirburak/laravel-5-simple-cms/archive/master.zip">zip</a> and extract to any of your folders you wish.

-----
<a name="step2"></a>
### Step 2: Install Dependencies

If you have downloaded the repository using git clone, then change your directory to that folder: `cd CUSTOM_DIRECTORY` or if you have installed the file via zip, then within that folder, open your terminal. To install the composer dependencies run `composer install`. 

To install javascript and style based dependencies run `bower install`, to combine the javascript and style files run `gulp --production`.
 
Finally, as this application uses HTML Purifier, you need to change permissions for it. To do that, run `chmod 777 vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/Serializer`. 

Rename your `.env.example` file as `.env` and change the variables as your own.
 
 inally, to generate a unique application key, run `php artisan key:generate`.

-----
<a name="step3"></a>
### Step 3: Create database

Create a database with `utf8_unicode_ci` preferably or any utf8 collation you wish to make the application work as expected.

-----
<a name="step4"></a>
### Step 4: Set Configuration

Open your `.env` file and change the fields corresponding to your own configurations. 

All variables with `DB_` prefixes relates to your database configuration. 

For the mail configuration, this application uses Gmail as a mail server. To configure it correctly, you need to change the `MAIL_USERNAME` variable as your Gmail username without `@gmail.com` and password as your Gmail password, `MAIL_FROM_ADDRESS` is your Gmail account with `@gmail.com` and `MAIL_FROM_NAME` is your name that is registered to that Gmail account.

To use the Analytics API, you need to create a project from <a target="_blank" href="https://code.google.com/apis/console/">https://code.google.com/apis/console/</a>, then you need to give a name to it. After creating a new project, from the left sidebar, click to `APIs` from `APIs & Auth` section. From the applications list, click to `Analytics API` and hit `Enable API`. After that, again from the left sidebar, click to `Credentials` and hit `Create new Client ID`. After you hit that button, you will be seeing a modal, select the `Server` option from the options list. After creating that, it will give you the `Client ID` and `email address` that you need within the `.env` file. After that, you need to hit `Generate new P12 key` to complete the api creation. Download the P12 key and store it within your application's `storage/analytics` folder. Finally, from <a target="_blank" href="https://www.google.com/analytics">https://www.google.com/analytics</a> create new account and from the Admin section's subsection User Management, add the email address that was previously created with read and analyze permission. To sum up, `ANALYTICS_SITE_ID` is the id of the project that you create from Google Analytics user interface. If you can't find that, its the part that comes after `p` in the link in your browser when you are in the Admin section of that project. The link looks like this: `https://www.google.com/analytics/web/management/Settings/a***w****pYOUR_SITE_ID_IS_HERE`. `ANALYTICS_CLIENT_ID` and `ANALYTICS_SERVICE_EMAIL` are the ones that you previously created. The filename is your `P12` that you previously downloaded, the `.p12` suffix is not needed, for instance if you have downloaded `SOMETHING-*****.p12` file, then you need to write `SOMETHING-*****` for the `ANALYTICS_FILENAME` variable. Finally, for the `ANALYTICS_COUNTRY` and `ANALYTICS_COUNTRY_CODE` define your custom country and its short code using the same structure within the example, short code must be upper cased and country name must be camel cased.

For the deployment, all you need is to set your FTP credentials.

-----
<a name="step5"></a>
### Step 5: Migrate and Seed

To migrate the database tables, run `php artisan migrate` and to seed the database with some data, run `php artisan db:seed`. 

-----
<a name="step6"></a>
### Step 6: Serve

To serve the application, you can use `php -S localhost:8000 -t public`, then open <a href="http://localhost:8000">http://localhost:8000</a> from your browser. To access the admin panel, hit the link <a href="http://localhost:8000/admin">http://localhost:8000/admin</a> from your browser. The application comes with default user with email address `admin@admin.com` and `123456`.

-----
<a name="item5"></a>
## User Guide

* [How to Create a New Resource](#u1)
* [How to Deploy](#u2)

-----
<a name="u1"></a>
### How to Create a New Resource

Lets assume we want to create a new resource for fruits where we'd like to manage our fruits with multi-language support, from our admin panel where will provide its' title and content.

    php artisan make:controller Admin/FruitController
    php artisan make:migration:schema create_fruits_table --schema="language_id:unsignedInteger:foreign, title:string, slug:string:unique, content:text"
    php artisan make:request FruitRequest
    php artisan form:make Forms/FruitsForm
    php artisan migrate

This will create everything that we need to manage our Fruits. Then check your `resources/lang` folders' `admin.php` files, for the `/en` folder's `admin.php` file add the menu translations to `menu` array first. 
 
```php
"fruit" => [
    "root"       => "Fruits",
    "all"        => "All Fruits",
    "add"        => "Add a Fruit"
],
 ``` 
 
Then to the `fields` array, add the translations for the form that will be generated for it again.
 
```php
"fruit" => [
    "title"       => "Title",
    "content"     => "Content",
    "language_id" => "Language"
],
```  

Finally for the breadcrumbs generation add the `fruit` translations like below.

```php
"fruit" => [
    "index"        => "Fruits",
    "edit"         => "Edit fruit",
    "create"       => "Create fruit",
    "show"         => "Show fruit"
],
```

After finishing the language parts, check the Fruit model, which is located in `app` folder as `Fruit.php`. As we are using slugs, configure the model as below.
```php
<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
    
class Fruit extends Model implements SluggableInterface{

    use SluggableTrait;
    
    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'  => true
    );
    
    protected $fillable = ['title', 'content', 'language_id'];

    public function language()
    {
        return $this->belongsTo('App\Language');
    }
    
}
```

Then configure the controller `FruitController.php` file located in Controllers folder's Admin subfolder as below:

```php
<?php namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FruitRequest;
use App\Fruit;
use App\Language;
use Laracasts\Flash\Flash;
use Kris\LaravelFormBuilder\FormBuilder;
use Datatable;
use Session;

class FruitController extends Controller {
    
    public function index()
    {
        $table = $this->setDatatable();
        return view('admin.fruits.index', compact('table'));
    }
    
    public function create(FormBuilder $formBuilder)
    {
        $languages = Language::lists('title', 'id');
        $form = $formBuilder->create('App\Forms\FruitsForm', [
            'method' => 'POST',
            'url' => route('admin.fruit.store')
        ], $languages);
        return view('admin.fruits.create', compact('form'));
    }
    
    public function store(FruitRequest $request)
    {
        Fruit::create($request->all()) == true ? Flash::success(trans('admin.create.success')) :
            Flash::error(trans('admin.create.fail'));
        return redirect(route('admin.fruit.index'));
    }
    
    public function show(Fruit $fruit)
    {
        return view('admin.fruits.show', compact('fruit'));
    }
    
    public function edit(Fruit $fruit, FormBuilder $formBuilder)
    {
        $languages = Language::lists('title', 'id');
        $form = $formBuilder->create('App\Forms\FruitsForm', [
            'method' => 'PATCH',
            'url' => route('admin.fruit.update', ['id' => $fruit->id]),
            'model' => $fruit
        ], $languages);
        return view('admin.fruits.edit', compact('form', 'fruit'));
    }
    
    public function update(Fruit $fruit, FruitRequest $request)
    {
        $fruit->fill($request->all());
        $fruit->save() == true ? Flash::success(trans('admin.update.success')) :
            Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.fruit.index'));
    }
    
    public function destroy(Fruit $fruit)
    {
        $fruit->delete() == true ? Flash::success(trans('admin.delete.success')) :
            Flash::error(trans('admin.delete.fail'));
        return redirect(route('admin.fruit.index'));
    }
        
    private function setDatatable()
    {
        return Datatable::table()
            ->addColumn(trans('admin.fields.fruit.title'), trans('admin.fields.updated_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('admin.fruit.table'))
            ->setOptions(array('sPaginationType' => 'bs_normal', 'oLanguage' => trans('admin.datatables')))
            ->render();
    }
    
    public function getDatatable()
    {
        $language = Session::get('current_lang');
        return Datatable::collection($language->fruits)
            ->showColumns('title')
            ->addColumn('updated_at', function($model)
            {
                return $model->updated_at->diffForHumans();
            })
            ->addColumn('',function($model)
            {
                return get_ops('fruit', $model->id);
            })
            ->searchColumns('title')
            ->orderColumns('title')
            ->make();
    }
    
}    
```
Open your `FruitRequest.php` file within `Requests` folder and configure it as below or how you wish, put some validation.

```php
<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class FruitRequest extends Request {
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'content' => 'required|max:160',
            'language_id' => 'required|integer'
        ];
    }
    
}
```

Then open your `FruitsForm.php` file located in `app/Forms` folder and configure it.

```php
<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class FruitsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('language_id', 'choice', [
                'choices' => $this->data,
                'label' => trans('admin.fields.fruit.language_id')
            ])
            ->add('title', 'text', [
                'label' => trans('admin.fields.fruit.title')
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.fields.fruit.content')
            ])
            ->add('save', 'submit', [
                'label' => trans('admin.fields.save'),
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('clear', 'reset', [
                'label' => trans('admin.fields.reset'),
                'attr' => ['class' => 'btn btn-warning']
            ]);
    }
}
```

Finally, create the fruits folder within `resources/views/admin` and create the views.
 
`create.blade.php` and `edit.blade.php` file as below:

```php
@extends('layouts.admin')
@section('content')
    {!! form($form) !!}
    @include('partials.admin.tinymce')
@endsection
```    
    
`index.blade.php` file as below:

```php 
@extends('layouts.admin')
@section('content')
    {!! $table !!}
@endsection
```
  
`show.blade.php` file as below:
 
```php
@extends('layouts.admin')
@section('content')
    <div class="col-xs-12 no-padding">
        <div class="post-title pull-left">
            <h1> {{ $fruit->title }} </h1>
        </div>
    </div>
    <p>{!! $fruit->content !!}</p>
@endsection
```

Add the fruit routes, to `routes.php` file.

```php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    *
    *
    Route::get('fruit/table', ['as'=>'admin.fruit.table', 'uses'=>'FruitController@getDatatable']);
    Route::group(['middleware' => 'auth'], function(){
        *
        *
        Route::resource('fruit', 'FruitController');
        *
        *
    });
    
});
```

Open the `RouteServiceProvider.php` file located in `Providers` folder and bind the fruit.

```php
$router->model('fruit', 'App\Fruit');
$router->bind('admin.fruit', function($id)
{
    return \App\Fruit::findOrFail($id);
});
```
        
Finally, add the Fruit resource to our menu. To do that, open the `MakeMenu` middleware located in `Http/Middleware` folder and configure it as below.
  
```php  
$fruits = $menu->add(trans('admin.menu.fruit.root'), '#')
    ->icon('apple')
    ->prependIcon();
         
$fruits->add(trans('admin.menu.fruit.add'), ['route' => 'admin.fruit.create'])
    ->icon('circle-o')
    ->prependIcon();
         
$fruits->add(trans('admin.menu.fruit.all'), ['route' => 'admin.fruit.index'])
    ->icon('circle-o')
    ->prependIcon();
```
 
Now you have your fruit resource that can be manageable within your admin panel.

-----
### How to Deploy

If you have set your FTP credentials within your `.env` file, then all you need is to turn your project into a git project. Then after you commit something, all you need to is call the `deploy` command as below.

    php artisan deploy

-----
<a name="item6"></a>
## Screenshots

![Index](http://i.imgur.com/tWeEAtp.png)
![Single post](http://i.imgur.com/RUnpPgh.png)
![Admin login](http://i.imgur.com/UtNKKcA.png)
![Admin dashboard](http://i.imgur.com/Tv9il5u.png)
![Admin dashboard worldmap](http://i.imgur.com/RqKodcK.png)
![Admin datatables](http://i.imgur.com/IxZggki.png)
![Admin nested sets](http://i.imgur.com/4bZA94c.png)
![Admin settings](http://i.imgur.com/gkFO9x4.png)

-----

<a name="item7"></a>
## Türkçe

Kendi blogumda detaylı olarak bu uygulamayı kurulumundan, sunucuya aktarımına kadar, baştan sona nasıl geliştirdiğimi detaylı olarak anlattım, alttaki linklerden sırasıyla bunlara ulaşabilirsiniz.

1. <a target="_blank" href="http://burakozdemir.co.uk/article/laravel-5-ile-cms-kurulum">Laravel 5 ile CMS - Kurulum</a>
2. <a target="_blank" href="http://burakozdemir.co.uk/article/laravel-5-ile-cms-migration-seed-middleware-elixir-bower-gulp-blade">Laravel 5 ile CMS - Migration, Seed, Middleware, Elixir, Bower, Gulp, Blade</a>
3. <a target="_blank" href="http://burakozdemir.co.uk/article/laravel-5-ile-cms-controller-model-request-provider-form"> Laravel 5 ile CMS - Controller, Model, Request, Provider, Form</a>
4. <a target="_blank" href="http://burakozdemir.co.uk/article/laravel-5-ile-cms-wysiwyg-filemanager-coklu-dil-google-analitik-api">Laravel 5 ile CMS - WYSIWYG Filemanager, Çoklu Dil, Google Analitik API</a>
5. <a target="_blank" href="http://burakozdemir.co.uk/article/laravel-5-ile-cms-events-email-ve-frontend">Laravel 5 ile CMS - Events, Email ve Frontend</a>
6. <a target="_blank" href="http://burakozdemir.co.uk/article/laravel-5-ile-cms-ftp-veya-ssh-ile-aktarim-deployment">Laravel 5 ile CMS - FTP veya SSH ile Aktarım (Deployment)</a>

-----

<a name="item8"></a>
## License

This is free software distributed under the terms of the MIT license

-----
