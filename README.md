# Laravel 8 Simple CMS
Basic boilerplate content management system for starters, supports Laravel 8.0.

-----
## Table of Contents

* [Features](#item1)
* [Quick Start](#item2)
* [Installation Guide](#item3)
* [User Guide](#item4)
* [Screenshots](#item5)

-----
<a name="item1"></a>
## Features:
* Admin Panel
  * Custom template with Bulma
  * Google Analytics API integrated dashboard
  * Server side oriented datatables
  * Page, category, and article management
  * [Trumbowyg](https://alex-d.github.io/Trumbowyg/) as the WYSIWYG editor
  * [elFinder](https://studio-42.github.io/elFinder/) as the file manager
  * [Feather Icons](https://feathericons.com) as the icon package
* Front-end
  * Custom template with Bulma
  * View pages, articles and categories

-----
<a name="item2"></a>
## Quick Start:

Clone this repository and install the dependencies.

    $ git clone https://github.com/ozdemirburak/laravel-8-simple-cms.git && cd laravel-8-simple-cms
    $ composer install

Run the command below to initialize. Do not forget to configure your .env file. 

    $ php artisan cms:initialize --seed

Install node and npm following one of the techniques explained in 
this [link](https://gist.github.com/isaacs/579814) to create and compile the assets of the 
application.
    
    $ npm install
    $ npm run production

Finally, serve the application.

    $ php artisan serve

Open [http://localhost:8000](http://localhost:8000) from your browser. 
To access the admin panel, hit the link 
[http://localhost:8000/admin](http://localhost:8000/admin) from your browser.
The application comes with default user with email address `admin@admin.com` and `123456`.

-----
<a name="item3"></a>
## Installation Guide:

* [Step 1: Download the Repository](#step1)
* [Step 2: Initialize Application](#step2)
* [Step 3: Serve](#step3)
* [Step 4: Extras](#step4)

-----
<a name="step1"></a>
### Step 1: Download the Repository

Either Clone the repository using git clone: `git clone https://github.com/ozdemirburak/laravel-8-simple-cms.git` 
or install via <a target="_blank" href="https://github.com/ozdemirburak/laravel-8-simple-cms/archive/master.zip">zip</a> and extract 
to any of your folders you wish.

-----
<a name="step2"></a>
### Step 2: Initialize the Application

To install the composer dependencies you need to have composer installed, if you don't have composer installed, 
then [follow these instructions](https://getcomposer.org/download/). Finally run, `composer install` in the `laravel-8-simple-cms` directory.

Run `php artisan cms:initialize --seed` which will ask you to create a database to migrate and seed our boilerplate application 
with fake data. Do not forget that all variables with `DB_` prefixes in your `.env` file relates to your database configuration. 
After configuring your `.env` file, with the proper data, you need to create the assets.

If you do not have node and npm installed, follow one of the techniques explained in this [link](https://gist.github.com/isaacs/579814).
Then, to install our boilerplate project's asset dependencies, run `npm install`. Finally to combine the 
javascript and style files run `npm run production`.

-----
<a name="step3"></a>
### Step 3: Serve

To serve the application, you can use `php artisan serve`, then open [http://localhost:8000](http://localhost:8000) 
from your browser. To access the admin panel, hit the link [http://localhost:8000/admin](http://localhost:8000/admin) 
from your browser. The application comes with default user with email address `admin@admin.com` and `123456`.

-----
<a name="step4"></a>
### Step 4: Extras

If you want to use the Gmail client to send emails, you need to change the `MAIL_USERNAME` variable as your 
Gmail username without `@gmail.com` and password as your Gmail password, `MAIL_FROM_ADDRESS` is your 
Gmail account with `@gmail.com` and `MAIL_FROM_NAME` is your name that is registered to that Gmail account.

To use the Analytics API, and have all the features of the dashboard, 
follow the instructions explained in detail [here](https://github.com/spatie/laravel-analytics#how-to-obtain-the-credentials-to-communicate-with-google-analytics).
You will also need a key for Google Javascript API, has the instructions [here](https://developers.google.com/maps/documentation/javascript/get-api-key). Also if you want to use CAPTCHA in the login form, you will also need to secrets and keys from [here](https://www.google.com/recaptcha).

Finally, if you need to re-initialize our simple boilerplate CMS, just run the command below where it will also 
update the assets for you.

    $ php artisan cms:initialize --seed --node

-----

<a name="item4"></a>
## User Guide

* [How to Create a New Resource](#u1)

-----
<a name="u1"></a>
### How to Create a New Resource

Lets assume we want to create a new resource for fruits where it will have title, description and content attributes.

    $ php artisan cms:resource fruit --migrate

You will see an output like below. The CMS generator will do **ALL** the boring stuff for you, 
it will create a migration file with a title, description, content, and slug columns by default, 
also the respecting Controller and Model files, it will also add the resource to routes, RouteServiceProvider,
even it will add the basic language key value pairs to the language file.

Just check and edit the files below to proceed.

```
Created file: database/migrations/2018_10_19_000000_create_fruits_table.php
Created file: app/Models/Fruit.php
Created file: app/Http/Controllers/Admin/DataTables/FruitDataTable.php
Created file: app/Http/Controllers/Admin/FruitController.php
Created file: resources/views/admin/forms/fruit.blade.php
Added route to: routes/admin.php
Added resource language key to: resources/lang/en/resources.php
Added model binding to: app/Providers/RouteServiceProvider.php
```

-----
<a name="item5"></a>
## Screenshots

![Index](https://ozdemirburak.com/i/upload/cms/index.png)
![Admin Auth](https://ozdemirburak.com/i/upload/cms/login.png)
![Admin Dashboard](https://ozdemirburak.com/i/upload/cms/dashboard.png)
![Admin Datatables](https://ozdemirburak.com/i/upload/cms/datatables.png)
![Admin Dashboard](https://ozdemirburak.com/i/upload/cms/editor.png)
![Admin File Manager](https://ozdemirburak.com/i/upload/cms/file-manager.png)
