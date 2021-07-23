<!-- Generator: Widdershins v4.0.1 -->
<!-- widdershins --search false --language_tabs 'java:Java' --summary oas3.yml -o README.swagger.md --omitHeader true -->

<h1 id="vgr-genre-svc">vgr-genre-svc v1.0.0</h1>

This is a catalog service for the Virtual Game Rack project. mantains Genre entity with CRUD operations.

Base URLs:

* <a href="http://localhost:8080">http://localhost:8080</a>

Email: <a href="mailto:is.hugosl@hotmail.com">Support</a> 
License: <a href="http://www.apache.org/licenses/LICENSE-2.0.html">Apache 2.0</a>

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL and any database settings.

By default, the app runs in 'production' mode. Uncomment the CI_ENVIRONMENT and change the value from production to development.

Run the queries contained in `database.sql` file in order to create the required tables.

## Run

To run the service, you can execute the next command:

  php spark serve

The service will run in http://localhost:8080

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)


<h1 id="vgr-genre-svc-genres">genres</h1>

Everything about genres

## Get all genres

<a id="opIdGetGenres"></a>

> Code samples

```java
URL obj = new URL("http://localhost:8080/genres");
HttpURLConnection con = (HttpURLConnection) obj.openConnection();
con.setRequestMethod("GET");
int responseCode = con.getResponseCode();
BufferedReader in = new BufferedReader(
    new InputStreamReader(con.getInputStream()));
String inputLine;
StringBuffer response = new StringBuffer();
while ((inputLine = in.readLine()) != null) {
    response.append(inputLine);
}
in.close();
System.out.println(response.toString());

```

`GET /genres`

Get all the available genres

> Example responses

> 200 Response

```json
[
  {
    "id": 1,
    "name": "Platform games",
    "created_at": "2021-07-06 12:31:19",
    "updated_at": "2021-07-06 12:31:19"
  },
  {
    "id": 2,
    "name": "Shooter games",
    "created_at": "2021-07-06 12:31:20",
    "updated_at": "2021-07-06 12:31:20"
  },
  {
    "id": 3,
    "name": "Fighting games",
    "created_at": "2021-07-06 12:31:21",
    "updated_at": "2021-07-06 12:31:21"
  }
]
```

<h3 id="get-all-genres-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|OK. Get genres|[Genre](#schemagenre)|

<aside class="success">
This operation does not require authentication
</aside>

## Create gender

<a id="opIdCreateGenre"></a>

> Code samples

```java
URL obj = new URL("http://localhost:8080/genres");
HttpURLConnection con = (HttpURLConnection) obj.openConnection();
con.setRequestMethod("POST");
int responseCode = con.getResponseCode();
BufferedReader in = new BufferedReader(
    new InputStreamReader(con.getInputStream()));
String inputLine;
StringBuffer response = new StringBuffer();
while ((inputLine = in.readLine()) != null) {
    response.append(inputLine);
}
in.close();
System.out.println(response.toString());

```

`POST /genres`

Create a new gender

> Body parameter

```json
{
  "name": "MMORPG"
}
```

<h3 id="create-gender-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[CreateGenreRequest](#schemacreategenrerequest)|true|none|

> Example responses

> 201 Response

```json
{
  "genre_id": 12
}
```

> 400 Response

```json
{
  "status": 400,
  "error": "400",
  "messages": {
    "name": "The name field is required."
  }
}
```

> 409 Response

```json
{
  "status": 409,
  "error": "409",
  "messages": {
    "name": "Duplicate entry 'MMORPG' for key 'genres.name_unique'"
  }
}
```

<h3 id="create-gender-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|201|[Created](https://tools.ietf.org/html/rfc7231#section-6.3.2)|Created. Get genres|[CreateGenreResponse](#schemacreategenreresponse)|
|400|[Bad Request](https://tools.ietf.org/html/rfc7231#section-6.5.1)|BadRequest. Request is not valid|[ErrorResponse](#schemaerrorresponse)|
|409|[Conflict](https://tools.ietf.org/html/rfc7231#section-6.5.8)|Conflict. The requested gender already exists|[ErrorResponse](#schemaerrorresponse)|

<aside class="success">
This operation does not require authentication
</aside>

## Get a genre

<a id="opIdGetGenreByID"></a>

> Code samples

```java
URL obj = new URL("http://localhost:8080/genres/{id}");
HttpURLConnection con = (HttpURLConnection) obj.openConnection();
con.setRequestMethod("GET");
int responseCode = con.getResponseCode();
BufferedReader in = new BufferedReader(
    new InputStreamReader(con.getInputStream()));
String inputLine;
StringBuffer response = new StringBuffer();
while ((inputLine = in.readLine()) != null) {
    response.append(inputLine);
}
in.close();
System.out.println(response.toString());

```

`GET /genres/{id}`

Get a genre by its ID

<h3 id="get-a-genre-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|id|path|integer|true|ID from the genre to get|

> Example responses

> 200 Response

```json
{
  "id": 1,
  "name": "Platform games",
  "created_at": "2021-07-06 12:31:19",
  "updated_at": "2021-07-06 12:31:19"
}
```

<h3 id="get-a-genre-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|OK. Get a genre|[Genre](#schemagenre)|
|404|[Not Found](https://tools.ietf.org/html/rfc7231#section-6.5.4)|NotFound. Genre not found|[ErrorResponse](#schemaerrorresponse)|

<aside class="success">
This operation does not require authentication
</aside>

## Update a genre

<a id="opIdUpdateGender"></a>

> Code samples

```java
URL obj = new URL("http://localhost:8080/genres/{id}");
HttpURLConnection con = (HttpURLConnection) obj.openConnection();
con.setRequestMethod("PUT");
int responseCode = con.getResponseCode();
BufferedReader in = new BufferedReader(
    new InputStreamReader(con.getInputStream()));
String inputLine;
StringBuffer response = new StringBuffer();
while ((inputLine = in.readLine()) != null) {
    response.append(inputLine);
}
in.close();
System.out.println(response.toString());

```

`PUT /genres/{id}`

Update an existing gender by its ID

> Body parameter

```json
{
  "name": "MMORPG"
}
```

<h3 id="update-a-genre-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|id|path|integer|true|ID from the genre to update|
|body|body|[CreateGenreRequest](#schemacreategenrerequest)|true|none|

> Example responses

> 200 Response

```json
{
  "id": 1,
  "name": "Platform games",
  "created_at": "2021-07-06 12:31:19",
  "updated_at": "2021-07-06 12:31:19"
}
```

> 400 Response

```json
{
  "status": 400,
  "error": "400",
  "messages": {
    "name": "The name field is required."
  }
}
```

<h3 id="update-a-genre-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|200|[OK](https://tools.ietf.org/html/rfc7231#section-6.3.1)|OK. Successfully updated genre|[Genre](#schemagenre)|
|400|[Bad Request](https://tools.ietf.org/html/rfc7231#section-6.5.1)|BadRequest. Request is not valid|[ErrorResponse](#schemaerrorresponse)|
|404|[Not Found](https://tools.ietf.org/html/rfc7231#section-6.5.4)|NotFound. Genre not found|[ErrorResponse](#schemaerrorresponse)|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|InternalServerError. An unexpected error occurred|[ExceptionResponse](#schemaexceptionresponse)|

<aside class="success">
This operation does not require authentication
</aside>

## Delete a genre

<a id="opIdDeleteGenreByID"></a>

> Code samples

```java
URL obj = new URL("http://localhost:8080/genres/{id}");
HttpURLConnection con = (HttpURLConnection) obj.openConnection();
con.setRequestMethod("DELETE");
int responseCode = con.getResponseCode();
BufferedReader in = new BufferedReader(
    new InputStreamReader(con.getInputStream()));
String inputLine;
StringBuffer response = new StringBuffer();
while ((inputLine = in.readLine()) != null) {
    response.append(inputLine);
}
in.close();
System.out.println(response.toString());

```

`DELETE /genres/{id}`

Delete a genre by its ID

<h3 id="delete-a-genre-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|id|path|integer|true|ID from the genre to delete|

> Example responses

> 404 Response

```json
{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "No genre found with id 13"
  }
}
```

<h3 id="delete-a-genre-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|204|[No Content](https://tools.ietf.org/html/rfc7231#section-6.3.5)|NoContent. Successfully deleted genre|None|
|404|[Not Found](https://tools.ietf.org/html/rfc7231#section-6.5.4)|NotFound. Genre not found|[ErrorResponse](#schemaerrorresponse)|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|InternalServerError. An unexpected error occurred|[ExceptionResponse](#schemaexceptionresponse)|

<aside class="success">
This operation does not require authentication
</aside>

## Multiple gender creation

<a id="opIdCreateGenreBulk"></a>

> Code samples

```java
URL obj = new URL("http://localhost:8080/genres/bulk");
HttpURLConnection con = (HttpURLConnection) obj.openConnection();
con.setRequestMethod("POST");
int responseCode = con.getResponseCode();
BufferedReader in = new BufferedReader(
    new InputStreamReader(con.getInputStream()));
String inputLine;
StringBuffer response = new StringBuffer();
while ((inputLine = in.readLine()) != null) {
    response.append(inputLine);
}
in.close();
System.out.println(response.toString());

```

`POST /genres/bulk`

Create multiple genders from a CSV file

> Body parameter

```yaml
genres_list: string

```

<h3 id="multiple-gender-creation-parameters">Parameters</h3>

|Name|In|Type|Required|Description|
|---|---|---|---|---|
|body|body|[CreateGenreBulkRequest](#schemacreategenrebulkrequest)|true|CSV File format (first row ignored): `id,name`|

> Example responses

> 201 Response

```json
{
  "num_inserts": 66
}
```

> 400 Response

```json
{
  "status": 400,
  "error": "400",
  "messages": {
    "name": "Please specify the data in the right format: id,name"
  }
}
```

<h3 id="multiple-gender-creation-responses">Responses</h3>

|Status|Meaning|Description|Schema|
|---|---|---|---|
|201|[Created](https://tools.ietf.org/html/rfc7231#section-6.3.2)|Created. Get genres|[CreateGenreBulkResponse](#schemacreategenrebulkresponse)|
|400|[Bad Request](https://tools.ietf.org/html/rfc7231#section-6.5.1)|BadRequest. Request is not valid|[ErrorResponse](#schemaerrorresponse)|
|500|[Internal Server Error](https://tools.ietf.org/html/rfc7231#section-6.6.1)|InternalServerError. An unexpected error occurred|[ExceptionResponse](#schemaexceptionresponse)|

<aside class="success">
This operation does not require authentication
</aside>

# Schemas

<h2 id="tocS_Genre">Genre</h2>
<!-- backwards compatibility -->
<a id="schemagenre"></a>
<a id="schema_Genre"></a>
<a id="tocSgenre"></a>
<a id="tocsgenre"></a>

```json
{
  "id": 1,
  "name": "Platform games",
  "created_at": "2021-07-06 12:31:19",
  "updated_at": "2021-07-06 12:31:19"
}

```

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|id|string|false|none|none|
|name|string|false|none|none|
|created_at|string|false|none|none|
|updated_at|string|false|none|none|

<h2 id="tocS_CreateGenreRequest">CreateGenreRequest</h2>
<!-- backwards compatibility -->
<a id="schemacreategenrerequest"></a>
<a id="schema_CreateGenreRequest"></a>
<a id="tocScreategenrerequest"></a>
<a id="tocscreategenrerequest"></a>

```json
{
  "name": "MMORPG"
}

```

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|name|string|false|none|none|

<h2 id="tocS_CreateGenreResponse">CreateGenreResponse</h2>
<!-- backwards compatibility -->
<a id="schemacreategenreresponse"></a>
<a id="schema_CreateGenreResponse"></a>
<a id="tocScreategenreresponse"></a>
<a id="tocscreategenreresponse"></a>

```json
{
  "genre_id": 12
}

```

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|genre_id|integer|false|none|none|

<h2 id="tocS_CreateGenreBulkRequest">CreateGenreBulkRequest</h2>
<!-- backwards compatibility -->
<a id="schemacreategenrebulkrequest"></a>
<a id="schema_CreateGenreBulkRequest"></a>
<a id="tocScreategenrebulkrequest"></a>
<a id="tocscreategenrebulkrequest"></a>

```json
{
  "genres_list": "string"
}

```

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|genres_list|string(id,name)|false|none|none|

<h2 id="tocS_CreateGenreBulkResponse">CreateGenreBulkResponse</h2>
<!-- backwards compatibility -->
<a id="schemacreategenrebulkresponse"></a>
<a id="schema_CreateGenreBulkResponse"></a>
<a id="tocScreategenrebulkresponse"></a>
<a id="tocscreategenrebulkresponse"></a>

```json
{
  "num_inserts": 66
}

```

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|num_inserts|integer|false|none|none|

<h2 id="tocS_ErrorResponse">ErrorResponse</h2>
<!-- backwards compatibility -->
<a id="schemaerrorresponse"></a>
<a id="schema_ErrorResponse"></a>
<a id="tocSerrorresponse"></a>
<a id="tocserrorresponse"></a>

```json
{
  "status": 404,
  "error": 404,
  "messages": {
    "error": "No genre found with id 13"
  }
}

```

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|status|integer|false|none|none|
|error|integer|false|none|none|
|messages|object|false|none|none|
|» error|string|false|none|none|

<h2 id="tocS_ExceptionResponse">ExceptionResponse</h2>
<!-- backwards compatibility -->
<a id="schemaexceptionresponse"></a>
<a id="schema_ExceptionResponse"></a>
<a id="tocSexceptionresponse"></a>
<a id="tocsexceptionresponse"></a>

```json
{
  "title": "ErrorException",
  "type": "ErrorException",
  "code": 500,
  "message": "fopen(): Filename cannot be empty",
  "file": "/home/hsanchez/Projects/vgr/vgr-genre-svc/app/Controllers/Genres.php",
  "line": 106
}

```

### Properties

|Name|Type|Required|Restrictions|Description|
|---|---|---|---|---|
|title|string|false|none|none|
|type|string|false|none|none|
|code|integer(int32)|false|none|none|
|message|string|false|none|none|
|file|string|false|none|none|
|line|integer(int32)|false|none|none|

