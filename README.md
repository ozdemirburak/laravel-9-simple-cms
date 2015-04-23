# Laravel 5 Simple CMS
Simple Laravel 5 content management system for starters. 

On progress, coming soon..

## Table of Contents
* [Features](#item1)
* [Requirements](#item2)
* [Installation](#item3)
* [License](#item4)
-----
<a name="item1"></a>
## Features:

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
-----
<a name="item2"></a>
##Requirements
	PHP >= 5.5.0
	MCrypt PHP Extension
	Database
-----
<a name="item3"></a>
##Installation:
1. `git clone https://github.com/ozdemirburak/laravel-5-simple-cms.git CUSTOM_DIRECTORY`
2. `cd CUSTOM_DIRECTORY`
3. `composer install`
4. `chmod 777 vendor/ezyang/htmlpurifier/library/HTMLPurifier/DefinitionCache/Serializer`
5. `php artisan key:generate`
6. Create your database, configure your *.env* file
7. `php artisan migrate`
8. `php artisan db:seed`
9. `bower install`
10. `gulp --production`
11. To run, `php -S localhost:8000 -t public`, then open http://localhost:8000 from your browser.
12. To access to the admin panel, open http://localhost:8000/admin from your browser, seeded user's email address is `admin@admin.com` where its' password is `123456`.
-----
<a name="item4"></a>
## License
This is free software distributed under the terms of the MIT license
-----
