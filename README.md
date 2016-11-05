Evorg
=====

Scalable Events Database for Laravel

### Requirements

* cURL
* PHP >= 5.4.0
* ElasticSearch Servers

### Installation

require in composer.json

    "buonzz/evorg": "2.*"

update composer by executing this in your project base folder

    composer update

add the service provider in config/app.php in providers array

    'Buonzz\Evorg\ServiceProvider',

add the alias in config/app.php in aliases array

```
        'Evorg'   => Buonzz\Evorg\EvorgFacade::class
```
    
publish the config settings

```
php artisan vendor:publish
```

edit config/evorg.php

* app_id - is a unique number to identify your app
* app_name - is the unique name of your app
* logging - setting this to true makes a log file for evorg in app/storage/logs/evorg.log , good for troubleshooting
* hosts - address of the elasticsearch servers (see http://www.elasticsearch.org/guide/en/elasticsearch/client/php-api/current/_configuration.html)


### Usage

Insert a click for a particular thumbnail

```
Route::get('click', function()
{
    return Evorg::event("click")
                   ->insert('thumbnail', array(
                        'movie_name' => 'Interstellar',
                          'year' => '2014')
                );
});
```

Retrieve all click events

```
Route::get('all', function()
{
    return Evorg::event("click")->get();
});
```
