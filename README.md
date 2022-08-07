<!-- Generator: Widdershins v4.0.1 -->
<!-- widdershins --search false --language_tabs 'java:Java' --summary oas3.yml -o README.swagger.md --omitHeader true -->

<h1 id="vgr-genre-svc">vgr-genre-svc v1.1.0</h1>

This is a catalog service for the Virtual Game Rack project. mantains Genre entity with CRUD operations.

Base URLs:

* <a href="http://localhost:8091">http://localhost:8091</a>

Email: <a href="mailto:is.hugosl@hotmail.com">Support</a> 
License: <a href="http://www.apache.org/licenses/LICENSE-2.0.html">Apache 2.0</a>

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL and any database settings (create a database and user with proper credentials).

By default, the app runs in 'production' mode. Uncomment the CI_ENVIRONMENT and change the value from production to development.

## Run

To run the service, navigate under the service directory and execute the next commands:

	composer install

	php spark migrate

	php spark db:seed GenreSeeder
  
	php spark start

The service will run in http://localhost:8091

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

Composer version 2.0.0 or higher is required to download the project dependencies.

<h1 id="vgr-genre-svc-genres">genres</h1>

Everything about genres

## ToDo

  - [ ] Add `initials` field.
	- [ ] Unit tests (https://codeigniter4.github.io/CodeIgniter4/testing/overview.html)