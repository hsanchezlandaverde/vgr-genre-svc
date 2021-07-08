# vgr-genre-svc

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL and any database settings.

By default, the app runs in 'production' mode. Uncomment the CI_ENVIRONMENT and change the value from production to development.

Run the queries contained in `database.sql` file in order to create the required tables.

## Run

To run the service, you can execute the next command:

  php spark serve

The service will run in http://localhost:8080

## Endpoints

### `GET /genres`

Gets all the available genres.

### `GET /genres/$id`

Gets a genre by ID.

Query parameters:

 - `id` (number) The genre ID to retrieve.

### `POST /genre`

Creates a new genre.

Example payload:

```json
{
  "name": "Tactic games"
}
```

### `PUT /genres/$id`

Updates an existing genre.

Query parameters:

 - `id` (number) The genre ID to retrieve.

Example payload:

```json
{
  "name": "Tactic games"
}
```

### `DELETE /genres/$id`

Deletes an existing genre.

Query parameters:

 - `id` (number) The genre ID to delete.

### `POST /genre/bulk`

Creates multiple genres from a CSV file.

Parameters (multipart):

 - `genres_list` File containing comma-separated genres with the format: `id,name`.

You can use this endpoint with the included file `genres.csv` to load the default catalog.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
