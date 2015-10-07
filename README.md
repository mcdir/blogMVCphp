Jast simple PHP application - MVC blog 
--------------------------------------

The application should be a blog which allows user to create\edit\list and delete posts. 
No authorization or user management are required.

# Requirements:
- usage of frameworks or 3rd-party libraries is not allowed (composer or other tools are ok);
- at least 1 controller;
- at least 1 model;
- a view renderer;
- a view helper support (optional);
- a simple router;
- the app must operate with models, eg. "$db->fetchPosts()" should return Model[] and not an array; (maybe object ???)
- DI (dependency injection) container is a plus;
- UI must be done using Twitter Bootstrap 3.

The core of this app should be easily used to build an another app.

Publish project to github and also provide an amount of spent time.

## Used
- Twig
- PDO
- phpunit
- Twitter Bootstrap 3
- jquery.js
- jquery jeditable.js
- moment.js
- bootstrap-datetimepicker.js
- jquery.tmpl.js

## Install

1. Clone the repo with all submodules : `git clone https://github.com/mcdir/blogMVCphp.git
2. Edit and rename config in app/config/config.example.ini to app/config/config.ini
3. Open console
4. Run `make clean && make install && make test`
6. Enter root pass for mysql
5. Enjoy !

### Database structure

You have to use the structure as [schema.sql](https://github.com/mcdir/blogMVCphp/blob/master/schema.sql). 

### Routing

Not for SEO now ;(

* /                       The homepage with blog posts
* /home/index             The homepage with blog posts too (alias)
* /?p=2&n3                Pagination using query parameters

TODO
====

- Core/View.php:         @todo to json
- Core/Database.php:     @todo extends \PDO
- Core/Database.php:     @todo add timezone and other settings
- Core/Routes.php:       @todo validate in future
- Core/Routes.php:       @todo send 404
- Controller/Home.php:   @todo rewrite to json
- Controller/Home.php:   @todo send 404 or another error
- Controller/Home.php:   @todo move to helpers
- Controller/Home.php:   @todo validate form in js
- Controller/Home.php:   @todo move to helpers
- Controller/Home.php:   @todo send 404 or another error
