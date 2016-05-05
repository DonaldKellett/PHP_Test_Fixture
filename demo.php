<?php require 'class.test.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Test Fixture - Version II</title>
  </head>
  <body>
    <h1>PHP Test Fixture - Version II</h1>
    <h2>Assertion Methods</h2>
    <h3>expect</h3>
    <?php
    $test = new Test;
    echo "Testing <code>expect</code> with truthy values only and default message<br />";
    $test->expect(true);
    $test->expect(1);
    $test->expect("bacon");
    $test->expect(array("Hello", "World", "this", "is", "an", "array"));
    $test->expect(new Test);
    $test->expect(!false);
    $test->expect(!0);
    $test->expect(!"");
    $test->summarize();

    $test = new Test;
    echo "Testing <code>expect</code> with falsy values only and default message<br />";
    $test->expect(false);
    $test->expect(0);
    $test->expect("");
    $test->expect(!true);
    $test->expect(!1);
    $test->expect(!"bacon");
    $test->summarize();

    $test = new Test;
    echo "Testing expect with truthy values only and <b>custom</b> message<br />";
    $test->expect(true, "You failed miserably");
    $test->expect(1, "You failed miserably");
    $test->expect("bacon", "You failed miserably");
    $test->expect(array("Hello", "World", "this", "is", "an", "array"), "You failed miserably");
    $test->expect(new Test, "You failed miserably");
    $test->expect(!false, "You failed miserably");
    $test->expect(!0, "You failed miserably");
    $test->expect(!"", "You failed miserably");
    $test->summarize();

    $test = new Test;
    echo "Testing expect with falsy values only and custom message<br />";
    $test->expect(false, "You failed miserably");
    $test->expect(0, "You failed miserably");
    $test->expect("", "You failed miserably");
    $test->expect(!true, "You failed miserably");
    $test->expect(!1, "You failed miserably");
    $test->expect(!"bacon", "You failed miserably");
    $test->summarize();

    $test = new Test;
    echo "Testing expect with both truthy and falsy values (with custom message)<br />";
    $test->expect(true, "You failed miserably");
    $test->expect(false, "You failed miserably");
    $test->expect(1, "You failed miserably");
    $test->expect(0, "You failed miserably");
    $test->expect("bacon", "You failed miserably");
    $test->expect("", "You failed miserably");
    $test->expect(array("Hello", "World", "this", "is", "an", "array"), "You failed miserably");
    $test->expect(!array("Hello", "World", "this", "is", "an", "array"), "You failed miserably");
    $test->expect(new Test, "You failed miserably");
    $test->expect(!(new Test), "You failed miserably");
    $test->summarize();
    ?>
    <h3>assert_equals</h3>
    <?php
    $test = new Test;
    echo "Checking passing test cases with default message<br />";
    $test->assert_equals(-1, -1);
    $test->assert_equals(0, 0);
    $test->assert_equals(1, 1);
    $test->assert_equals(2, 2);
    $test->assert_equals(3, 3);
    $test->assert_equals(true, true);
    $test->assert_equals(false, false);
    $test->assert_equals("bacon", "bacon");
    $test->assert_equals("Hello World", "Hello World");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_equals with failing tests and default message<br />";
    $test->assert_equals(0, 1);
    $test->assert_equals(1, 0);
    $test->assert_equals(true, false);
    $test->assert_equals(false, true);
    $test->assert_equals("bacon", "Hello World");
    $test->assert_equals("Hello World", "bacon");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_equals with passing tests and custom message<br />";
    $test->assert_equals(-1, -1, "EPIC FAIL!!!");
    $test->assert_equals(0, 0, "EPIC FAIL!!!");
    $test->assert_equals(1, 1, "EPIC FAIL!!!");
    $test->assert_equals(2, 2, "EPIC FAIL!!!");
    $test->assert_equals(3, 3, "EPIC FAIL!!!");
    $test->assert_equals(true, true, "EPIC FAIL!!!");
    $test->assert_equals(false, false, "EPIC FAIL!!!");
    $test->assert_equals("bacon", "bacon", "EPIC FAIL!!!");
    $test->assert_equals("Hello World", "Hello World", "EPIC FAIL!!!");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_equals with failing tests and custom message<br />";
    $test->assert_equals(0, 1, "EPIC FAIL!!!");
    $test->assert_equals(1, 0, "EPIC FAIL!!!");
    $test->assert_equals(true, false, "EPIC FAIL!!!");
    $test->assert_equals(false, true, "EPIC FAIL!!!");
    $test->assert_equals("bacon", "Hello World", "EPIC FAIL!!!");
    $test->assert_equals("Hello World", "bacon", "EPIC FAIL!!!");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_equals with passing and failing tests alike (custom message)<br />";
    $test->assert_equals(-1, -1, "EPIC FAIL!!!");
    $test->assert_equals(0, 0, "EPIC FAIL!!!");
    $test->assert_equals(1, 1, "EPIC FAIL!!!");
    $test->assert_equals(0, 1, "EPIC FAIL!!!");
    $test->assert_equals(1, 0, "EPIC FAIL!!!");
    $test->assert_equals(2, 2, "EPIC FAIL!!!");
    $test->assert_equals(3, 3, "EPIC FAIL!!!");
    $test->assert_equals("bacon", "bacon", "EPIC FAIL!!!");
    $test->assert_equals("Hello World", "Hello World", "EPIC FAIL!!!");
    $test->assert_equals(true, false, "EPIC FAIL!!!");
    $test->assert_equals(false, true, "EPIC FAIL!!!");
    $test->assert_equals(true, true, "EPIC FAIL!!!");
    $test->assert_equals(false, false, "EPIC FAIL!!!");
    $test->assert_equals("bacon", "Hello World", "EPIC FAIL!!!");
    $test->assert_equals("Hello World", "bacon", "EPIC FAIL!!!");
    $test->summarize();
    ?>
    <h3>assert_not_equals</h3>
    <?php
    $test = new Test;
    echo "Testing assert_not_equals with passing tests and default message<br />";
    $test->assert_not_equals(1, 0);
    $test->assert_not_equals(0, 1);
    $test->assert_not_equals(true, false);
    $test->assert_not_equals(false, true);
    $test->assert_not_equals("bacon", "Hello World");
    $test->assert_not_equals("Hello World", "bacon");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_not_equals with failing tests and default message<br />";
    $test->assert_not_equals(-1, -1);
    $test->assert_not_equals(0, 0);
    $test->assert_not_equals(1, 1);
    $test->assert_not_equals(2, 2);
    $test->assert_not_equals(3, 3);
    $test->assert_not_equals(true, true);
    $test->assert_not_equals(false, false);
    $test->assert_not_equals("bacon", "bacon");
    $test->assert_not_equals("Hello World", "Hello World");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_not_equals with passing tests and custom message<br />";
    $test->assert_not_equals(1, 0, "EPIC FAIL!!!");
    $test->assert_not_equals(0, 1, "EPIC FAIL!!!");
    $test->assert_not_equals(true, false, "EPIC FAIL!!!");
    $test->assert_not_equals(false, true, "EPIC FAIL!!!");
    $test->assert_not_equals("bacon", "Hello World", "EPIC FAIL!!!");
    $test->assert_not_equals("Hello World", "bacon", "EPIC FAIL!!!");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_not_equals with failing tests and custom message<br />";
    $test->assert_not_equals(-1, -1, "EPIC FAIL!!!");
    $test->assert_not_equals(0, 0, "EPIC FAIL!!!");
    $test->assert_not_equals(1, 1, "EPIC FAIL!!!");
    $test->assert_not_equals(2, 2, "EPIC FAIL!!!");
    $test->assert_not_equals(3, 3, "EPIC FAIL!!!");
    $test->assert_not_equals(true, true, "EPIC FAIL!!!");
    $test->assert_not_equals(false, false, "EPIC FAIL!!!");
    $test->assert_not_equals("bacon", "bacon", "EPIC FAIL!!!");
    $test->assert_not_equals("Hello World", "Hello World", "EPIC FAIL!!!");
    $test->summarize();

    $test = new Test;
    echo "Testing assert_not_equals with both passing and failing tests<br />";
    $test->assert_not_equals(1, 0, "EPIC FAIL!!!");
    $test->assert_not_equals(0, 1, "EPIC FAIL!!!");
    $test->assert_not_equals(true, false, "EPIC FAIL!!!");
    $test->assert_not_equals(false, true, "EPIC FAIL!!!");
    $test->assert_not_equals("bacon", "Hello World", "EPIC FAIL!!!");
    $test->assert_not_equals("Hello World", "bacon", "EPIC FAIL!!!");
    $test->assert_not_equals(-1, -1, "EPIC FAIL!!!");
    $test->assert_not_equals(0, 0, "EPIC FAIL!!!");
    $test->assert_not_equals(1, 1, "EPIC FAIL!!!");
    $test->assert_not_equals(2, 2, "EPIC FAIL!!!");
    $test->assert_not_equals(3, 3, "EPIC FAIL!!!");
    $test->assert_not_equals(true, true, "EPIC FAIL!!!");
    $test->assert_not_equals(false, false, "EPIC FAIL!!!");
    $test->assert_not_equals("bacon", "bacon", "EPIC FAIL!!!");
    $test->assert_not_equals("Hello World", "Hello World", "EPIC FAIL!!!");
    $test->summarize();
    ?>
    <h3>expect_error <b style="color:rgb(200,200,0)"><u>NEW!</u></b></h3>
    <?php
    $test = new Test;
    echo "Testing expect_error with passing test cases<br />";
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception("Hello World, this is an exception/error");
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(0);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(1);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(true);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(false);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception("bacon");
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception("Hello World");
    });
    $test->summarize();

    $test = new Test;
    echo "Testing expect_error with failing test cases<br />";
    $test->expect_error("Expected error was not thrown", function () {
      echo "Hello World, no error was thrown<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo 0 . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo 1 . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo true . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo false . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo "Hello World" . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo "bacon" . "<br />";
    });
    $test->summarize();

    $test = new Test;
    echo "Testing expect_error with passing and failing test cases alike<br />";
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception("Hello World, this is an exception/error");
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(0);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(1);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(true);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception(false);
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception("bacon");
    });
    $test->expect_error("Expected error was not thrown", function () {
      throw new Exception("Hello World");
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo "Hello World, no error was thrown<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo 0 . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo 1 . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo true . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo false . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo "Hello World" . "<br />";
    });
    $test->expect_error("Expected error was not thrown", function () {
      echo "bacon" . "<br />";
    });
    $test->summarize();
    ?>
    <h3>expect_no_error <b style="color:rgb(200,200,0)"><u>NEW!</u></b></h3>
    <?php
    $test = new Test;
    echo "Testing expect_no_error with passing test cases<br />";
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo "Hello World, no error was thrown<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo 0 . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo 1 . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo true . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo false . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo "Hello World" . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo "bacon" . "<br />";
    });
    $test->summarize();

    $test = new Test;
    echo "Testing expect_no_error with failing test cases<br />";
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception("Hello World, this is an exception/error");
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(0);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(1);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(true);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(false);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception("bacon");
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception("Hello World");
    });
    $test->summarize();

    $test = new Test;
    echo "Testing expect_no_error with passing and failing tests alike<br />";
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo "Hello World, no error was thrown<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo 0 . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo 1 . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo true . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo false . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo "Hello World" . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      echo "bacon" . "<br />";
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception("Hello World, this is an exception/error");
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(0);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(1);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(true);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception(false);
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception("bacon");
    });
    $test->expect_no_error("Unexpected error was thrown", function () {
      throw new Exception("Hello World");
    });
    $test->summarize();
    ?>
    <h2>Spec Methods</h2>
    <h3>describe <b style="color:rgb(200,200,0)"><u>NEW!</u></b></h3>
    <?php
    $test = new Test;
    $test->describe("Displaying 'describe' block with no test cases", function () {
      echo "Hello World<br />";
      echo "This is an example of a standalone 'describe' block with no test cases<br />";
      echo "Cool, huh?<br />";
      echo "One advantage of using a 'describe' block to nest your test cases is that the test cases are displayed properly in a 'console window'<br />";
      echo "Another advantage of using a 'describe' block is that you do not have to worry about printing a summary of your test cases at all because the 'describe' block does it for you!<br />";
    });

    echo "<br />";

    $test = new Test;
    $test->describe("Displaying a 'describe' block with only passing test cases", function () {
      $GLOBALS['test']->expect(true);
      $GLOBALS['test']->expect(1);
      $GLOBALS['test']->expect("bacon");
      $GLOBALS['test']->expect("Hello World");
      $GLOBALS['test']->expect(!false);
      $GLOBALS['test']->expect(!0);
      $GLOBALS['test']->expect(!"");
      $GLOBALS['test']->assert_equals(-1, -1);
      $GLOBALS['test']->assert_equals(0, 0);
      $GLOBALS['test']->assert_equals(1, 1);
      $GLOBALS['test']->assert_equals(2, 2);
      $GLOBALS['test']->assert_equals(3, 3);
      $GLOBALS['test']->assert_equals(true, true);
      $GLOBALS['test']->assert_equals(false, false);
      $GLOBALS['test']->assert_equals("bacon", "bacon");
      $GLOBALS['test']->assert_equals("Hello World", "Hello World");
      $GLOBALS['test']->assert_not_equals(1, 0, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals(0, 1, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals(true, false, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals(false, true, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals("bacon", "Hello World", "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals("Hello World", "bacon", "EPIC FAIL!!!");
    });

    echo "<br />";

    $test = new Test;
    $test->describe("Displaying a 'describe' block with mainly passing test cases and a few failing ones", function () {
      $GLOBALS['test']->expect(true);
      $GLOBALS['test']->expect(1);
      $GLOBALS['test']->expect("bacon");
      $GLOBALS['test']->expect("Hello World");
      $GLOBALS['test']->expect(false);
      $GLOBALS['test']->expect(!false);
      $GLOBALS['test']->expect(!0);
      $GLOBALS['test']->expect(!"");
      $GLOBALS['test']->assert_equals(-1, -1);
      $GLOBALS['test']->assert_equals(0, 0);
      $GLOBALS['test']->assert_equals(1, 1);
      $GLOBALS['test']->assert_equals(2, 2);
      $GLOBALS['test']->assert_equals(3, 3);
      $GLOBALS['test']->assert_equals("Hello World", "hello world");
      $GLOBALS['test']->assert_equals(true, true);
      $GLOBALS['test']->assert_equals(false, false);
      $GLOBALS['test']->assert_equals("bacon", "bacon");
      $GLOBALS['test']->assert_equals("Hello World", "Hello World");
      $GLOBALS['test']->assert_not_equals(1, 0, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals(0, 1, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals(true, false, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals(false, true, "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals("Hello World", "Hello World");
      $GLOBALS['test']->assert_not_equals("bacon", "Hello World", "EPIC FAIL!!!");
      $GLOBALS['test']->assert_not_equals("Hello World", "bacon", "EPIC FAIL!!!");
    });
    ?>
    <h3>it (in conjunction with describe) <b style="color:rgb(200,200,0)"><u>NEW!</u></b></h3>
    <?php

    ?>
    <h2>Misc</h2>
    <h3>random_number <b style="color:rgb(200,200,0)"><u>NEW!</u></b></h3>
    <?php
    $test = new Test;
    for ($i = 0; $i < 100; $i++) {
      $rand_num = $test->random_number();
      echo $rand_num . "<br />";
      $test->expect($rand_num >= 0 && $rand_num <= 100, "Random number generated was not between 0 and 100 (both inclusive)");
    }
    $test->summarize();
    ?>
    <h3>random_token <b style="color:rgb(200,200,0)"><u>NEW!</u></b></h3>
    <?php
    $test = new Test;
    for ($i = 0; $i < 100; $i++) {
      $rand_token = $test->random_token();
      echo $rand_token . "<br />";
      $test->expect(strlen($rand_token) >= 8 && strlen($rand_token) <= 10, "Length of random token was not between 8 and 10 (both inclusive)");
    }
    $test->summarize();
    ?>
    <h2>Coming Soon</h2>
    <ol>
      <li><h3>assert_similar</h3></li>
      <li><h3>assert_not_similar</h3></li>
    </ol>
  </body>
</html>
