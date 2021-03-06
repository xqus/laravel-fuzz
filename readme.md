Laravel Fuzz
=============

<p align="center">
<a href="https://github.com/xqus/laravel-fuzz/actions"><img src="https://github.com/xqus/laravel-fuzz/workflows/Laravel%20Mockery/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/xqus/laravel-fuzz"><img src="https://poser.pugx.org/xqus/laravel-fuzz/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/xqus/laravel-fuzz"><img src="https://poser.pugx.org/xqus/laravel-fuzz/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/xqus/laravel-fuzz"><img src="https://poser.pugx.org/xqus/laravel-fuzz/license.svg" alt="License"></a>
</p>

About
------
Laravel Fuzz is a performance monitor for Laravel. It is similar to Laravel
Telescope, but is made to also be used in a production environment.


Installing
----------
`composer require xqus\laravel-fuzz`

Run `php artisan fuzz:publish`

Edit `config/fuzz.php` to your needs. As a minimum you need to add
your users e-mail address.

Run `php artisan migrate` to migrate your databases.

Visit the path you specified in the config file, default is `/fuzz`.

Features
--------
Laravel Fuzz will save the following information:
- Execution time
- Number of database queries executed
- Time used on database queries
- Memory usage
- Request information

Todo
----
- Count number of models hydrated
- Finalize Dashboard

License
-------
Laravel Fuzz is open-sourced software licensed under the [MIT license](license.md).
