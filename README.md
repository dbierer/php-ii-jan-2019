# PHP-II Jan 2019

file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/2/59

## Homework
* For Wed 16 Jan 2019
  * Lab: Type Hinting
  * Lab: Build Custom Exception Class
  * Lab: Traits
* For Mon 14 Jan 2019
  * Lab: Magic Methods
  * Lab: Abstract Classes
  * Lab: Interfaces
* For Fri 11 Jan 2019
  * Lab: Create an Extensible Super Class
* For Wed 09 Jan 2019
  * Lab: Namespace
  * Lab: Create a Class
## Q & A
* Q: major diffs between PSR-0 and PSR-4?
* A: PSR-4 has the following differences:
    * Main difference: *less restrictive*
    * got rid of the "requirement" that the top-level of a namespace must be the "vendor" name
    * underscores (_) have no special meaning
    * removed implementation details/requirements: leaves that up to you

* Q: do you have an example of plugin manager functionality using __call()?
* A: you could implement an array of callbacks which could be consulted by __call()

* Q: Is there documentation on the effort to make __construct() method failures consistent by throwing Exceptions?
* A: See: https://wiki.php.net/rfc/internal_constructor_behaviour

## CLASS NOTES
* Magic Methods: https://secure.php.net/manual/en/language.oop5.magic.php
* Really cool function: `array_column()` : also works for arrays of objects
* Abstract Class / Interface Examples:
    * https://github.com/zendframework/zend-diactoros
        * implementation of PSR-7 interfaces
    * https://github.com/dbierer/oauth.unlikelysource.org/blob/master/module/AuthOauth/src/AuthOauth/Adapter/BaseAdapter.php
        * NOTE: need to add `authenticate()` as an abstract method as it's mandatory
* Traits example: https://github.com/dbierer/classic_php_examples/blob/master/oop/trait_insteadof_example.php

## ERRATA
* file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/2/12: last bullet: underscores: not true
* file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/2/46: not necessarily! i.e. look at Zend\Diactoros as an example; otherwise, just use an interface
* General: OOP section: Need to discuss `__invoke()`!!!
* file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/2/73: there are more than 2!!!
