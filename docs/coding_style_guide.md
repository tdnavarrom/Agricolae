# Coding Style Guide

This section comprises what should be considered the standard
coding elements that are required for this PHP project in particular. Based on [PSR-1] and [Laravel-Guide].

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md

[Laravel-Guide]: https://guidelines.spatie.be/code-style/laravel-php


## Rules

### 1 Files

* #### 1.1 PHP Tags

  PHP code MUST use the long `<?php ?>`  tags.

* #### 1.2 Character Encoding

  PHP code MUST use only UTF-8 without BOM. (It is the default in VS Code)

* #### 1.3 Side Effects

  A file SHOULD declare new symbols (classes, functions, constants,
  etc.) and cause no other side effects, or it SHOULD execute logic with side
  effects, but SHOULD NOT do both.


### 2. Namespace and Class Names

Namespaces and classes MUST follow an "autoloading" PSR: [PSR-1].

Class names MUST be declared in `StudlyCaps`.

Code written for PHP 5.3 and after MUST use formal namespaces.

For example:

~~~php
<?php
// PHP 5.3 and later:
namespace Vendor\Model;

class Foo
{
}
~~~


### 3. Class Constants, Properties, and Methods

The term "class" refers to all classes, interfaces, and traits.

* #### 3.1. Constants

  Class constants MUST be declared in all upper case with underscore separators.
  For example:

  ~~~php
  <?php
  namespace Vendor\Model;

  class Foo
  {
      const VERSION = '1.0';
      const DATE_APPROVED = '2012-06-01';
  }
  ~~~

* #### 3.2. Properties

  `$under_score`  SHOULD be applied consistently as property names.
 
  * ##### 3.2.1 Typed properties

    You should type a property whenever possible. Don't use a docblock.

    ```php
    // good
    class Foo
    {
        public string $bar;
    }

    // bad
    class Foo
    {
        /** @var string */
        public $bar;
    }
    ```

* #### 3.3. Methods

  Method names MUST be declared in `camelCase()`.

  * ##### 3.3.1 Void return types

    If a method return nothing, it should be indicated with `void`. 
    This makes it more clear to the users of your code what your intention was when writing it.


### 4. Strings

When possible prefer string interpolation above `sprintf` and the `.` operator.

```php
// Good
$greeting = "Hi, I am {$name}.";

// Bad
$greeting = 'Hi, I am ' . $name . '.';

```

### 5. If

Try to avoid `else`.

Always use curly brackets.

```php
// Good
if ($condition) {
   ...
}

// Bad
if ($condition) ...
```

* #### 5.1 Compound ifs

  In general, separate `if` statements should be preferred over a compound condition. This makes debugging code easier.


  ```php
  // Good
  if (! $conditionA) {
     return;
  }

  if (! $conditionB) {
     return;
  }

  if (! $conditionC) {
     return;
  }

  // do stuff
  ```

  ```php
  // bad
  if ($conditionA && $conditionB && $conditionC) {
    // do stuff
  }
  ```

### 6. Loops

* #### 6.1 while


  ```php
  while ($condition) {
     ...
  }
  ```

* #### 6.2 for

  ```php
  for ($i = 0; $i < 10; $i++) {
      // for body
  }
  ```

* #### 6.3 foreach

  ```php
  foreach ($iterable as $key => $value) {
      // foreach body
  }
  ```


### 7. Comments

Comments should be avoided as much as possible by writing expressive code. 
