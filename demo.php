<?php require 'class.test.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Test Fixture - Version II</title>
  </head>
  <body>
    <h1>v2.0.0+</h1>
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
    $test = new Test;
    $test->describe("Introducing the 'it' wrapper test block", function () {
      $GLOBALS['test']->it("Displaying 'it' block with no test cases", function () {
        echo "And ... we're finally in the 'it' wrapper test block!  How cool is that?<br />";
        echo "'it' blocks, when used in conjunction with 'describe' blocks, can really help a lot to properly display your test cases in a simple and structured manner.<br />";
        echo "The standard usage of 'describe' and 'it' blocks are as follows:<br />";
        echo "<ol>";
        echo "<li>'describe' blocks, as its name suggests, are used to <strong>describe</strong> what your group of test cases will be about or what function/method you are testing.  For example, if you are planning to test a function <code>multiply(a, b)</code> that multiplies two numbers, the title of your describe block could be something along the lines of 'The multiply(a, b) function'</li>";
        echo "<li>'it' blocks, on the other hand, should be used to describe what <strong>aspects</strong> of the function/method in question the particular (sub)group of tests are going to test.  For example, in the 'it' block, if you want to test positive integers only, your title for the 'it' block should be 'should work for positive integers'.  In another 'it' block in the same 'describe' block, if you are planning to test negative float values, the title for that particular block should be 'should work for negative floats (too)'</li>";
        echo "<ol/>";
      });
      $GLOBALS['test']->it("Yet another 'it' block within the same 'describe' block", function () {
        echo "See?  I told you you could include multiple 'if' blocks in your main 'describe' block.<br />";
        echo "Different 'if' blocks in the same 'describe' block should be testing the same function/method/algorithm/etc.<br />";
      });
      $GLOBALS['test']->it("Yet another 'it' block within the same 'describe' block", function () {
        echo "See?  I told you you could include multiple 'if' blocks in your main 'describe' block.<br />";
        echo "Different 'if' blocks in the same 'describe' block should be testing the same function/method/algorithm/etc.<br />";
      });
      $GLOBALS['test']->it("Yet another 'it' block within the same 'describe' block", function () {
        echo "See?  I told you you could include multiple 'if' blocks in your main 'describe' block.<br />";
        echo "Different 'if' blocks in the same 'describe' block should be testing the same function/method/algorithm/etc.<br />";
      });
      $GLOBALS['test']->it("Yet another 'it' block within the same 'describe' block", function () {
        echo "See?  I told you you could include multiple 'if' blocks in your main 'describe' block.<br />";
        echo "Different 'if' blocks in the same 'describe' block should be testing the same function/method/algorithm/etc.<br />";
      });
    });

    echo "<br />";

    $test = new Test;
    $test->describe("The 'it' block in conjunction with the 'describe' block", function () {
      $GLOBALS['test']->it("should work for all passing test cases (expect)", function () {
        $GLOBALS['test']->expect(true);
        $GLOBALS['test']->expect(1);
        $GLOBALS['test']->expect("bacon");
        $GLOBALS['test']->expect("Hello World");
        $GLOBALS['test']->expect(!false);
        $GLOBALS['test']->expect(!0);
        $GLOBALS['test']->expect(!"");
      });
      $GLOBALS['test']->it("should work for all passing test cases (assert_equals)", function () {
        $GLOBALS['test']->assert_equals(-1, -1);
        $GLOBALS['test']->assert_equals(0, 0);
        $GLOBALS['test']->assert_equals(1, 1);
        $GLOBALS['test']->assert_equals(2, 2);
        $GLOBALS['test']->assert_equals(3, 3);
        $GLOBALS['test']->assert_equals(true, true);
        $GLOBALS['test']->assert_equals(false, false);
        $GLOBALS['test']->assert_equals("bacon", "bacon");
        $GLOBALS['test']->assert_equals("Hello World", "Hello World");
      });
      $GLOBALS['test']->it("should work for all passing test cases (assert_not_equals)", function () {
        $GLOBALS['test']->assert_not_equals(1, 0, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals(0, 1, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals(true, false, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals(false, true, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals("bacon", "Hello World", "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals("Hello World", "bacon", "EPIC FAIL!!!");
      });
    });

    echo "<br />";

    $test = new Test;
    $test->describe("The 'it' block in conjunction with the 'describe' block", function () {
      $GLOBALS['test']->it("should work for some failing test cases (expect)", function () {
        $GLOBALS['test']->expect(true);
        $GLOBALS['test']->expect(1);
        $GLOBALS['test']->expect("bacon");
        $GLOBALS['test']->expect("Hello World");
        $GLOBALS['test']->expect(!false);
        $GLOBALS['test']->expect(0);
        $GLOBALS['test']->expect(!0);
        $GLOBALS['test']->expect(!"");
      });
      $GLOBALS['test']->it("should work for all passing test cases (assert_equals)", function () {
        $GLOBALS['test']->assert_equals(-1, -1);
        $GLOBALS['test']->assert_equals(0, 0);
        $GLOBALS['test']->assert_equals(1, 1);
        $GLOBALS['test']->assert_equals(2, 2);
        $GLOBALS['test']->assert_equals(3, 3);
        $GLOBALS['test']->assert_equals(true, true);
        $GLOBALS['test']->assert_equals(false, false);
        $GLOBALS['test']->assert_equals("bacon", "bacon");
        $GLOBALS['test']->assert_equals("Hello World", "Hello World");
      });
      $GLOBALS['test']->it("should work for some failing test cases (assert_not_equals)", function () {
        $GLOBALS['test']->assert_not_equals(1, 0, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals(0, 1, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals(true, false, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals(false, true, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals("Goodbye World", "Goodbye World", "Should return 'Hello World' instead of 'Goodbye World'");
        $GLOBALS['test']->assert_not_equals("bacon", "Hello World", "EPIC FAIL!!!");
        $GLOBALS['test']->assert_not_equals("Hello World", "bacon", "EPIC FAIL!!!");
      });
    });
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
    <h1>v2.1.0+</h1>
    <h2>Assertion Methods</h2>
    <h3>assert_similar</h3>
    <?php
    $test = new Test;
    $test->describe('$test->assert_similar($actual, $expected[, $msg])', function () {
      $GLOBALS['test']->it("should work for passing tests that do NOT include arrays (default message)", function () {
        $GLOBALS['test']->assert_similar(1, 1);
        $GLOBALS['test']->assert_similar(0, 0);
        $GLOBALS['test']->assert_similar(-1, -1);
        $GLOBALS['test']->assert_similar(2, 2);
        $GLOBALS['test']->assert_similar(3, 3);
        $GLOBALS['test']->assert_similar(true, true);
        $GLOBALS['test']->assert_similar(false, false);
        $GLOBALS['test']->assert_similar("Hello World", "Hello World");
        $GLOBALS['test']->assert_similar("", "");
        $GLOBALS['test']->assert_similar("bacon", "bacon");
      });
      $GLOBALS['test']->it("should work for passing tests that do NOT include arrays (custom message)", function () {
        $GLOBALS['test']->assert_similar(1, 1, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(0, 0, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(-1, -1, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(2, 2, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(3, 3, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(true, true, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(false, false, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar("Hello World", "Hello World", "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar("", "", "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar("bacon", "bacon", "EPIC FAIL!!!");
      });
      $GLOBALS['test']->it("should work for passing tests with one-dimensional arrays (default message)", function () {
        $GLOBALS['test']->assert_similar(array(), array());
        $GLOBALS['test']->assert_similar(array(1, 2, 3), array(1, 2, 3));
        $GLOBALS['test']->assert_similar(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));
        $GLOBALS['test']->assert_similar(array(0, 1, 1, 2, 3, 5, 8, 13), array(0, 1, 1, 2, 3, 5, 8, 13));
        $GLOBALS['test']->assert_similar(array(
          "Key One" => "Value One",
          "Key Two" => "Value Two",
          "Key Three" => "Value Three",
          "Key Four" => "Value Four",
          "Key Five" => "Value Five"
        ), array(
          "Key One" => "Value One",
          "Key Two" => "Value Two",
          "Key Three" => "Value Three",
          "Key Four" => "Value Four",
          "Key Five" => "Value Five"
        ));
        $GLOBALS['test']->assert_similar(array(
          345,
          "Key 1" => "Value 1",
          545,
          -234,
          "Key 3" => "Value 3",
          5454,
          "Another Key" => "Another Value",
          -24234,
          true,
          "And yet another key" => false
        ), array(
          345,
          "Key 1" => "Value 1",
          545,
          -234,
          "Key 3" => "Value 3",
          5454,
          "Another Key" => "Another Value",
          -24234,
          true,
          "And yet another key" => false
        ));
      });
      $GLOBALS['test']->it("should work for passing tests with one-dimensional arrays (custom message)", function () {
        $GLOBALS['test']->assert_similar(array(), array(), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(1, 2, 3), array(1, 2, 3), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(0, 1, 1, 2, 3, 5, 8, 13), array(0, 1, 1, 2, 3, 5, 8, 13), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(
          "Key One" => "Value One",
          "Key Two" => "Value Two",
          "Key Three" => "Value Three",
          "Key Four" => "Value Four",
          "Key Five" => "Value Five"
        ), array(
          "Key One" => "Value One",
          "Key Two" => "Value Two",
          "Key Three" => "Value Three",
          "Key Four" => "Value Four",
          "Key Five" => "Value Five"
        ), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(
          345,
          "Key 1" => "Value 1",
          545,
          -234,
          "Key 3" => "Value 3",
          5454,
          "Another Key" => "Another Value",
          -24234,
          true,
          "And yet another key" => false
        ), array(
          345,
          "Key 1" => "Value 1",
          545,
          -234,
          "Key 3" => "Value 3",
          5454,
          "Another Key" => "Another Value",
          -24234,
          true,
          "And yet another key" => false
        ), "EPIC FAIL!!!");
      });
      $GLOBALS['test']->it("should work for passing tests with multidimensional and nested arrays (default message)", function () {
        $GLOBALS['test']->assert_similar(array(array(array(array(array())))), array(array(array(array(array())))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(1))))), array(array(array(array(array(1))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(0))))), array(array(array(array(array(0))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(true))))), array(array(array(array(array(true))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(false))))), array(array(array(array(array(false))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array("Hello World"))))), array(array(array(array(array("Hello World"))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array("bacon"))))), array(array(array(array(array("bacon"))))));
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ));
      });
      $GLOBALS['test']->it("should work for passing tests with multidimensional and nested arrays (custom message)", function () {
        $GLOBALS['test']->assert_similar(array(array(array(array(array())))), array(array(array(array(array())))), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(1))))), array(array(array(array(array(1))))), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(0))))), array(array(array(array(array(0))))), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(true))))), array(array(array(array(array(true))))), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(false))))), array(array(array(array(array(false))))), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(array(array(array(array("Hello World"))))), array(array(array(array(array("Hello World"))))), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(array(array(array(array("bacon"))))), array(array(array(array(array("bacon"))))), "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), "EPIC FAIL!!!");
      });
    });

    echo "<br />";

    $test = new Test;
    $test->describe('$test->assert_similar($actual, $expected[, $msg])', function () {
      $GLOBALS['test']->it("should work for failing tests that do NOT include arrays (default message)", function () {
        $GLOBALS['test']->assert_similar(1, 0);
        $GLOBALS['test']->assert_similar(0, 1);
        $GLOBALS['test']->assert_similar(2, 3);
        $GLOBALS['test']->assert_similar(3, 2);
        $GLOBALS['test']->assert_similar(true, false);
        $GLOBALS['test']->assert_similar(false, true);
        $GLOBALS['test']->assert_similar("Hello World", "bacon");
        $GLOBALS['test']->assert_similar("bacon", "Hello World");
        $GLOBALS['test']->assert_similar("ACTUAL_VALUE", "EXPECTED_VALUE");
      });
      $GLOBALS['test']->it("should work for failing tests that do NOT include arrays (custom message)", function () {
        $GLOBALS['test']->assert_similar(1, 0, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(0, 1, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(2, 3, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(3, 2, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(true, false, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar(false, true, "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar("Hello World", "bacon", "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar("bacon", "Hello World", "EPIC FAIL!!!");
        $GLOBALS['test']->assert_similar("ACTUAL_VALUE", "EXPECTED_VALUE", "EPIC FAIL!!!");
      });
      $GLOBALS['test']->it("should work for failing tests with one-dimensional arrays (default message)", function () {
        $GLOBALS['test']->assert_similar(array(), array(3));
        $GLOBALS['test']->assert_similar(array(3), array());
        $GLOBALS['test']->assert_similar(array(1, 2, 3, 4, 5), array(5, 4, 3, 2, 1));
        $GLOBALS['test']->assert_similar(array(5, 4, 3, 2, 1), array(1, 2, 3, 4, 5));
        $GLOBALS['test']->assert_similar(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), array(2, 1, 4, 3, 6, 5, 8, 7, 10, 9));
        $GLOBALS['test']->assert_similar(array(2, 1, 4, 3, 6, 5, 8, 7, 10, 9), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));
        $GLOBALS['test']->assert_similar(array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3"
        ), array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3",
          "Key 4" => "Value 4"
        ));
        $GLOBALS['test']->assert_similar(array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3",
          "Key 4" => "Value 4"
        ), array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3"
        ));
        $GLOBALS['test']->assert_similar(1, array(1));
        $GLOBALS['test']->assert_similar(array(1), 1);
        $GLOBALS['test']->assert_similar(true, array(true));
        $GLOBALS['test']->assert_similar(array(true), true);
        $GLOBALS['test']->assert_similar(false, array(false));
        $GLOBALS['test']->assert_similar(array(false), false);
      });
      $GLOBALS['test']->it("should work for failing tests of one-dimensional arrays (custom message)", function () {
        $GLOBALS['test']->assert_similar(array(), array(3), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(3), array(), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(1, 2, 3, 4, 5), array(5, 4, 3, 2, 1), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(5, 4, 3, 2, 1), array(1, 2, 3, 4, 5), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), array(2, 1, 4, 3, 6, 5, 8, 7, 10, 9), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(2, 1, 4, 3, 6, 5, 8, 7, 10, 9), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3"
        ), array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3",
          "Key 4" => "Value 4"
        ), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3",
          "Key 4" => "Value 4"
        ), array(
          "Key 1" => "Value 1",
          "Key 2" => "Value 2",
          "Key 3" => "Value 3"
        ), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(1, array(1), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(1), 1, "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(true, array(true), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(true), true, "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(false, array(false), "EPIC FAIL!!!  YOU LOSE!!!");
        $GLOBALS['test']->assert_similar(array(false), false, "EPIC FAIL!!!  YOU LOSE!!!");
      });
      $GLOBALS['test']->it("should work for failing tests of multidimensional and nested arrays (default message)", function () {
        $GLOBALS['test']->assert_similar(array(array(array(array(array())))), array(array(array(array(array(array()))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(1))))), array(array(array(array(array(array(1)))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(0))))), array(array(array(array(array(array(0)))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(true))))), array(array(array(array(array(array(true)))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array(false))))), array(array(array(array(array(array(false)))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array("Hello World"))))), array(array(array(array(array(array("Hello World")))))));
        $GLOBALS['test']->assert_similar(array(array(array(array(array("bacon"))))), array(array(array(array(array(array("bacon")))))));
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", array(), true
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ));
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random val",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ));
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, 23, 45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ));
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "extra key" => "extra value",
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"), array(), array(1, 2, 3))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ));
      });
      $GLOBALS['test']->it("should work for failing tests of multidimensional and nested arrays (custom message)", function () {
        $GLOBALS['test']->assert_similar(array(array(array(array(array())))), array(array(array(array(array(array()))))), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(1))))), array(array(array(array(array(array(1)))))), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(0))))), array(array(array(array(array(array(0)))))), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(true))))), array(array(array(array(array(array(true)))))), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(array(array(array(array(false))))), array(array(array(array(array(array(false)))))), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(array(array(array(array("Hello World"))))), array(array(array(array(array(array("Hello World")))))), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(array(array(array(array("bacon"))))), array(array(array(array(array(array("bacon")))))), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", array(), true
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random val",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, 23, 45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), "Final Test Failed");
        $GLOBALS['test']->assert_similar(array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "extra key" => "extra value",
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"), array(), array(1, 2, 3))
        ), array(
          1,
          3,
          5,
          7,
          8,
          "random key" => "random value",
          67,
          69,
          733,
          "another key" => "another value",
          "a nested array" => array(1, 2, 3, 5, 8, 10),
          "another nested array" => array(
            "key" => "value",
            "another key" => "another value",
            "yet another key" => "value",
            true,
            false,
            1,
            0,
            array(
              3, 4, 5, -23, -45, false, "Hello World", true, array()
            ),
            "random string"
          ),
          "finally" => array(array(3, 1, 5), array("Hello", "World", "key" => "value"))
        ), "Final Test Failed");
      });
    });
    ?>
    <h3>assert_not_similar</h3>
    <?php

    ?>
  </body>
</html>
