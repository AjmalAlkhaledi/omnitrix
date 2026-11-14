# Omnitrix

The application template for Omnitrix APIs: asynchronous PHP on OpenSwoole, with routing,
models and migrations, background jobs and a command line.

## Requirements

PHP 8.3+, ext-openswoole 26.2+, ext-redis (phpredis) 6.3+ and ext-pdo_mysql, plus MySQL or
MariaDB and Redis.

## Getting started

```sh
composer create-project omnitrix/omnitrix my-api
cd my-api
# set the database and Redis credentials in .env
php omnitrix migrate --seed
php omnitrix serve
```

```sh
curl http://127.0.0.1:8080/api/users
```

| Command | |
|---|---|
| `php omnitrix serve` | start the HTTP server |
| `php omnitrix queue:work` | process background jobs |
| `php omnitrix migrate` | run database migrations |
| `php omnitrix routes` | list routes |
| `php omnitrix make:model Post --migration` | generate code (`php omnitrix list` shows all) |
| `composer test` | run the tests |

## Layout

```
bootstrap.php      builds the application
config/            configuration, one file per section
routes/api.php     routes
src/               application code (App\): Controllers, Models, Middleware, Jobs
database/          migrations and seeds
tests/             PHPUnit tests
```

## Documentation

https://ajmalalkhaledi.github.io/omnitrix-docs/

The framework itself is the `omnitrix/core` package, installed in `vendor/` and updated with
`composer update omnitrix/core`.

## License

The Omnitrix application template is open-source software licensed under the [MIT license](LICENSE).
