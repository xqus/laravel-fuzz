Laravel Fuzz
=============

About
------
Laravel Fuzz is a performance monitor for Laravel. It is similar to Laravel
Telescope, but is made to also be used in a production environment.


Installing
----------
`composer require xqus\laravel-fuzz`

Run `php artisan vendor:publish`

Choose `Provider: xqus\LaravelFuzz\LaravelFuzzServiceProvider`

Run `php artisan migrate` to migrate your databases.

Features
--------
Laravel Fuzz will save the following information:
- Execution time
- Number of database queries executed
- Time used on database queries
- Memory usage
- Reguest information

Todo
----
- Count number of models hydrated
- Dashboard

License
-------
Laravel Fuzz is licensed under the MIT license.
