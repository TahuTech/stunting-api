# Foobar# stunting-api

## First time
1. clone this repo 
2. setting file .env
3. dumb database in your local 
4. run project ( ``` php artisan serve``` )
### Step add API

-  make model

```$php artisan make:model namemodel -m```

setting your migration environment

-  migration

```$php artisan migrate``` *if no database

```$php artisan migrate:fresh``` *if you have old database

-  make Controller

```$php artisan make:controller namecontroller --resource```

- setting your route api 


## License
[MIT license](https://opensource.org/licenses/MIT).

