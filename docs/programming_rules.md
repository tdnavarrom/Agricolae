# Programming rules

This document presents the programming rules for the project, specifying the rules for controllers, models, views, routes, etc.

Every developer must meet these requirements.

## Table of Contents
* [Controllers](#Controllers)
* [Models](#models)
* [Views](#views)
* [Texts in the views](#texts-in-the-views)
* [Style documents](#style-documents)
* [Routes](#routes)
* [Automatic data generation](automatic-data-generation)

## Controllers

### Structure


```php
<?php

    namespace App\Http\Controllers;

    class NameController extends Controller {
        // Controller functions
    }
?>
```

### Rules

1) The controllers must be located in the path ``App / Http / Controllers``.
2) ** NEVER ** do an  ``echo`` in a controller.
3) If you are going to perform the validations in the controller, make sure that this will not imply having repeated code in the future. It is recommended to perform them on the models to avoid this.

## Models

### Structure

```php
<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class ModelName extends Model {

        // Attributes <model's attributes>
        protected $fillable = [...];

        // model's gets and sets
    }
?>
```

### Rules

1) The models must be located in the path ``App``.
2) An attribute comment must be included where it is specified which are the elements of the model.
3) **All** attributes must have their get and set functions.
4) To avoid code repetition, it is recommended to validate the data entered by the user in the model as follows:

 ```php
    <?php

        namespace App;

        use Illuminate\Database\Eloquent\Model;
        use Iluminate\Http\Request;

        class ModelName extends Model {

             // Attributes <model's attributes>
            protected $fillable = ["name", "price"];

            public static function validate(Request $request) {
                $request->validate([
                    "name" => "required",
                    "price" => "required|numeric|gt:0"
                ]);
            }

            // model's gets and sets
        }
    ?>
```

5) To access the attributes of a model **ALWAYS** it must be done using encapsulation, that is, it must make use of getters and setters. **NEVER** the model's attribute should be accessed directly. In other words, to access a user's name, it must be done as follows:

 ```php
    echo "This IS to be done". User-> getName ();
```
But ** NEVER ** this way:

```php
    echo "This should NOT be done". User ["name"];
```

## Views

### Structure

```php
@extends ('layouts.master')

@section ('content')
    // HTML code
@endsection
```

### Rules

1) The views must be located in the path ```resources / views```.
2) Each view must be located inside a directory that helps determine which controller it is associated with.
3) All views must extend from the ```layout master```.
4) All views must be ```Blade```.
5) **NEVER** use php code inside views.
6) The naming of the views must follow the structure ```viewname.blade.php```

## Texts in views

### Rules

1) All the texts of the project must go in ```resources/lang/* ```
2) Initially two languages will be used: Spanish and English, the texts of each one should go in ```resources/lang/es``` and ``` resources/lang/en``` respectively.
3) To access the texts from the views, the following structure will be used:

```php
    @lang ('messages.welcome');
```

Where in ```resources/lang/en/messages.php``` is the following structure:

```php
    <? php
        return [
            'welcome' => 'Welcome',
            // ... Texts
        ];
    ?>
```

**NOTE:** If necessary, different files can be created to contain the texts of each view.

## Style documents

### Rules

1) The style of the views will be done through files ```.css```.
2) The files ```.csv``` must be located in ``` public / css```

## Routes

### Structure

```php
Route :: get ('/ index', 'Controller @ index') -> name ("controller.index");
```

### Rules

1) The routes must be located in the file ```routes / web.php```
2) **Every** route must be associated with a controller.
3) Each route must be associated with a name by which it can be accessed.
4) It is **prohibited** to set functions within a route. These must be handled by the controller.

## Automatic data generation

### Rules

1) To create tables in the database, Migrations should be used for their automatic generation.
2) Each migration should be located in ```database/migrations```
3) The name of each migration must refer to the creation date of the table and must follow the structure ```2020_08_26_000000_table_to_be_created.php```
4) The sample data entered into the tables will be exported in a file ```.sql``` that will be stored in the root directory of the project so that all developers have the same information in the database of data.
5) The name of the generated ```.sql``` must specify which table in the database it belongs to.

### Instructions

To create the table run the command

```bash
$ php artisan migrate
```

**NOTE:** Make sure to configure the file ```.env``` before

Once the table is created, example data will be entered manually, for this there are several alternatives:

- ### Using phpMyAdmin

    1) Enter ``` http: // localhost / phpmyadmin / ```.
    2) Select the database ```agricolaedb```.
    3) Enter the table you just created and press the button ``` Insert``` at the top of the screen.
    4) Enter all the data and save the changes.

    To export the data, press the button ```Export```, select SQL format and enter the name you want for the file.

    To import the data, select the table in which you want to store it, press the button ```Import``` and select the file ```.sql``` corresponding to the table.

- ### Using MySQL locally

    1) Connect to the database by executing the following command replacing * username * with a user with access to mysql and enter the password.

     ```bash
        $ mysql -u <username> -p
     ```
    2) Select the database ```agricolaedb```.

    ```sql
        mysql> USE agricolaedb
    ```
    3) Insert the data using a query ```INSERT```.

    To export the data run the command in the terminal (outside of mysql)

    ```bash
    $ mysqldump -u <username> -p agricolaedb <tableName>> tableName.sql
    ```

    To import the data, enter mysql and run the following commands:

    ```sql
    mysql> USE agricolaedb
    mysql> IMPORT TABLE FROM <tableName.sql>
    ```

- ### From the application

    Enter the data manually from the application, for example, if you want to store sample products go to the product creation page and create them.

    To import and export follow the instructions of one of the two previous options.
