php artisan make:controller Admin/FruitController
php artisan make:migration:schema create_fruits_table --schema="language_id:unsignedInteger:foreign, title:string, slug:string:unique, content:text"
php artisan make:request Admin/FruitRequest
php artisan make:form Forms/Admin/FruitsForm
php artisan migrate