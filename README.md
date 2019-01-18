# PHP-II Jan 2019

file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/4/18

## Homework
* For Mon 21 Jan 2019
  * Lab: Prepared Statements
  * Lab: Stored Procedure
  * Lab: Transaction
* For Fri 18 Jan 2019
  * Lab: SQL Statements
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
* Q: What's a good quick way to learn about the Domain Model?
* A: See: https://www.infoq.com/minibooks/domain-driven-design-quickly

* Q: How long are traditional RDBMS databases going to be around?
* A: See: https://db-engines.com/en/ranking

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

* Q: Is `realPath()` useful or recommended?
* A: Yes: example from OrderApp:
```
// function to ensure path exists
function reallyRealPath($path)
{
	if ($newPath = realpath($path)) {
		return $newPath;
	} else {
		throw new RuntimeException('Base path undefined');
	}
}

define('BASE', reallyRealPath(__DIR__ . '/../'));
```

## CLASS NOTES
* Magic Methods: https://secure.php.net/manual/en/language.oop5.magic.php
* Really cool function: `array_column()` : also works for arrays of objects
* Abstract Class / Interface Examples:
    * https://github.com/zendframework/zend-diactoros
        * implementation of PSR-7 interfaces
    * https://github.com/dbierer/oauth.unlikelysource.org/blob/master/module/AuthOauth/src/AuthOauth/Adapter/BaseAdapter.php
        * NOTE: need to add `authenticate()` as an abstract method as it's mandatory
* Traits example: https://github.com/dbierer/classic_php_examples/blob/master/oop/trait_insteadof_example.php
* Other PDO examples: https://github.com/dbierer/classic_php_examples/tree/master/db

## ERRATA
* file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/2/12: last bullet: underscores: not true
* file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/2/46: not necessarily! i.e. look at Zend\Diactoros as an example; otherwise, just use an interface
* General: OOP section: Need to discuss `__invoke()`!!!
* file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/2/73: there are more than 2!!!
* OrderApp: dates are not formatted properly!
* file:///D:/Repos/PHP-Fundamentals-II/Course_Materials/index.html#/4/25: remove the `execute()` statement!
