# PHP Test Fixture

[![Join the chat at https://gitter.im/DonaldKellett/PHP_Test_Fixture](https://badges.gitter.im/DonaldKellett/PHP_Test_Fixture.svg)](https://gitter.im/DonaldKellett/PHP_Test_Fixture?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Version Details

- Current Version: ```v2.1.1```
- License: None (Open Source)

## Overview

PHP Test Fixture Version II is finally here!  The PHP Test Fixture (as authored by [DonaldKellett](https://github.com/DonaldKellett)) is a simple and minimalistic test fixture programmed in the PHP scripting language for use by PHP developers to check their code and algorithms efficiently and effectively.

Version II of this test fixture includes a few new surprises:

1. The ability to expect an error and no error to be thrown from the tested function/algorithm/code by using the ```expect_error``` and ```expect_no_error``` methods in your test fixture respectively.
2. The ability to effectively group and style your test cases properly with the ```describe``` and ```it``` methods
3. The ability to generate random numbers and strings for random testing (should you need it) using the ```random_number``` and ```random_token``` methods respectively

... and **enhanced** feedback messages for both ```assert_equals``` and ```assert_not_equals``` upon both success and failure.

### v2.1.0 Update

From ```v2.1.0``` onwards, the following additional features are also available for use:

1. ```assert_similar```
2. ... and ```assert_not_similar```

Both can be used for the direct comparison of arrays.  Kindly refer to the Documentation below for more details.

## Documentation

*Note: All features specified in this documentation are available from ```v2.0.0``` onwards unless otherwise specified.*

### Initialization

To use this PHP test fixture, simply follow the steps below:

1. Add the line ```require 'class.test.php';``` in your PHP code (preferably at the start of your PHP file) to include the ```Test``` class
2. To start using the class, create an instance of ```Test``` (e.g. ```$test = new Test;```)
3. Refer to the documentation below for the full list of available methods to test your function/algorithm/code :D

### Assertion Methods (Pass/Fail)

#### expect

This is the most basic of all assertion methods and can be used to check for certain conditions.  Its arguments list is as follows:

```php
$test->expect($condition[, $msg]);
```

The ```expect``` method expects a boolean value (required) as its first argument and *optionally* accepts a string value as its second argument.  The method then evaluates the boolean (or converts the value into a boolean before evaluating if the value is not a boolean).  If the boolean evaluates to ```true``` (or if the value provided is "truthy"), the test is passed and ```Test Passed``` is printed to the screen (along with a line break).  If the boolean evaluates to ```false``` (or if a "falsy" value is provided) the test fails and an error message is printed to the screen (```$msg``` will be printed instead if it is provided as an argument).

E.g.

```php
$test = new Test;
$test->expect(true); // Test Passed
$test->expect(false); // Value was not what was expected
$test->expect(1); // Test Passed
$test->expect(0); // Value was not what was expected
$test->expect(0, "Was expecting a truthy value here"); // Was expected a truthy value here
$test->expect(1, "Was expecting a truthy value here"); // Test Passed
```

#### assert_equals

*Note: ```assert_equals``` only works with primitive data types such as **strings, numbers and booleans**.  It may not work properly when comparing arrays or objects.  See ```assert_similar``` for array comparison.*

This method accepts the following arguments in the following order.  Any arguments in square brackets ```[]``` are optional.

```php
$test->assert_equals($actual, $expected[, $msg]);
```

Please note that **the order of actual and expected values passed in is VERY important**.  Although swapping the order of the values will not cause an error, it will produce confusing feedback messages upon failure which will hamper the TDD process.

E.g.

```php
$test = new Test;
function multiply(a, b) {
  // A working function that multiplies two numbers together
  return a * b;
}
$test->assert_equals(multiply(3, 5), 15, "Function should return 15"); // Test Passed - Value === 15
$test->assert_equals(multiply(4, 7), 28, "Function should return 28"); // Test Passed - Value === 28
$test->assert_equals(multiply(9, 9), 81); // Test Passed - Value === 81
function buggy_multiply(a, b) {
  // Oops, it seems like there is a typo here and exponentation is done instead of multiplication
  return a ** b;
}
$test->assert_equals(multiply(4, 4), 16); // Value did not match expected - Expected: 16, but instead got: 256
```

#### assert_not_equals

*Note: ```assert_not_equals``` only works with primitive data types such as **strings, numbers and booleans**.  It may not work properly when comparing arrays or objects.  See ```assert_not_similar``` for array comparison.*

```php
$test->assert_not_equals($actual, $expected[, $msg]);
```

This method passes a test if the actual values does **not** match the expected value, otherwise it fails.

E.g.

```php
$test = new Test;
function multiply(a, b) {
  return a * b;
}
// Here we try to make sure the function is returning the product of two numbers, not the exponentation of two numbers
$test->assert_not_equals(multiply(4, 4), 256); // Test Passed - Value !== 256
```

#### assert_similar (```v2.1.0```+)

##### Syntax

```php
$test->assert_similar($actual, $expected[, $msg]);
```

##### Usage

```assert_similar``` is best used to directly compare arrays.  It works for both ordinary arrays **and** associative arrays.  It **can** also be used to compare primitive values (such as strings, numbers and booleans) but ```assert_equals``` can do the job as well.

#### assert_not_similar (```v2.1.0```+)

##### Syntax

```php
$test->assert_not_similar($actual, $expected[, $msg]);
```

##### Usage

```assert_not_similar``` is best used to directly compare arrays.  It works for both ordinary arrays **and** associative arrays.  It **can** also be used to compare primitive values (such as strings, numbers and booleans) but ```assert_not_equals``` can do the job as well.

#### expect_error

This method expects a custom message upon failure and an anonymous function to be executed to check for errors.  The test is passed if an error is thrown in the tested code and fails otherwise.

```php
$test->expect_error($msg, $fn);
```

*Note: The error thrown must be an ```Exception```; otherwise, the PHP code itself will fail.*

#### expect_no_error

```php
$test->expect_no_error($msg, $fn);
```

Basically the opposite of ```expect_error``` - a test is passed if no error is thrown.  If an error is thrown, the test is failed.  Again, the ```$msg``` parameter is **required** in this case.

### A note regarding return values of assertion methods

Please note that **all assertion methods above** return ```true``` if a test is passed; ```false``` otherwise.  This means that you can use the assertion methods above in your control flow should you want to perform custom actions depending on whether a particular test case (or a particular group of test cases) has been passed.  For example, you may want to withhold certain test cases until a particular test case is passed.  Kindly refer to the Summarization methods below for more methods related to control flow.

### Grouping/Styling Methods

#### describe

A handy method used to group a series of relevant test cases into a professionally styled "console" which also summarizes the results of the test cases involved effectively by the border-color of the console depending on whether all test cases are passed.

Syntax:

```php
$test->describe($description, $tests);
```

```$description``` is a string describing what the test cases do, while ```$tests``` is the anonymous function passed in where the test cases are evaluated.

E.g.

```php
$test = new Test;
$test->describe("My awesome test cases for the 'multiply' function", function () {
  // NOTE: In the anonymous function, your test fixture (i.e. $test in this example) must be referenced through the $GLOBALS variable due to the nature of PHP; otherwise, the script will fail
  $GLOBALS['test']->assert_equals(multiply(3, 5), 15);
  $GLOBALS['test']->assert_equals(multiply(4, 7), 28);
  $GLOBALS['test']->assert_equals(multiply(9, 9), 81);
});
```

#### it

Used to further group a series of test cases into subsections.  Must be used in conjunction with ```describe``` for maximum styling effect.

Syntax:

```php
$test->describe("Description Here", function () {
  // NOTE: $test->it should ideally be wrapped in a $test->describe block; otherwise the contents may not display properly
  $GLOBALS['test']->it($description, $tests);
});
```

Again, ```$description``` is a string detialing what is tested while ```$tests``` are the tests to be executed in the anonymous function.

### Summarization

#### summarize

The ```$test->summarize``` method accepts no arguments.

##### Syntax

```php
$test->summarize();
```

##### Usage

This method is used to print a summary of the tests that have been executed.  The summmary will be of the following format:

```
37 Passed
0 Failed
Algorithm Passed
```

Please note that if you are already using ```$test->describe``` and ```$test->it``` to wrap your test cases you **do NOT** need to use ```$test->summarize``` to summarize your test cases as it is **automatically** done for you in the ```$test->describe``` block.

#### get_passes (```v2.0.2```+)

```get_passes``` accepts no arguments, like such:

```php
$test->get_passes();
```

It returns the number of passes in a particular test which may be useful to include in your control flow if you want to perform custom actions depending on how many test cases the user has passed, for example.

#### get_fails (```v2.0.2```+)

```get_fails``` accepts no arguments, like such:

```php
$test->get_fails();
```

It returns the number of fails in a particular test which may be useful to include in your control flow if you want to perform custom actions depending on how many test cases the user has failed, for example.

#### algorithm_passed (```v2.0.2```+)

```algorithm_passed``` accepts no arguments, like such:

```php
$test->algorithm_passed();
```

It returns ```true``` if the user has passed **all** test cases; ```false``` otherwise.  It may be useful to include it in your control flow if you want to perform custom actions depending on whether a user has passed all test cases provided by you.

### Miscellaneous

### random_number

Accepts no arguments.  Returns a randomly generated integer between ```0``` and ```100``` inclusive.

### random_token

Accepts no arguments.  Returns a randomly generated string of length ```8``` to ```10``` (inclusive) that includes only lowercase letters and the digits ```0-9``` (this can be changed by editing the ```Test::token_chars``` constant)

## Credits

Credits goes to [Codewars](http://www.codewars.com) as the test fixtures used in their site (especially the Javascript version of the test fixture) are my source of inspiration for creating this test fixture for the PHP language.  That being said, I really do hope Codewars will support PHP soon :D
