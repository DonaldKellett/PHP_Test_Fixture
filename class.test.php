<?php
class Test {
  public $passes = 0;
  public $fails = 0;
  const token_chars = "abcdefghijklmnopqrstuvwxyz0123456789";
  public function expect($condition, $msg = "Value was not what was expected") {
    if ($condition) {
      $this->passes++;
      echo "<span style='color:lime'>Test Passed</span><br />";
      return true;
    } else {
      $this->fails++;
      echo "<span style='color:red'>$msg</span><br />";
    }
  }
  public function assert_equals($actual, $expected, $msg = "Value did not match expected") {
    if ($actual === $expected) {
      $this->passes++;
      echo "<span style='color:lime'>Test Passed - Value === $expected</span><br />";
      return true;
    } else {
      $this->fails++;
      echo "<span style='color:red'>$msg - Expected: $expected, but instead got: $actual</span><br />";
      return false;
    }
  }
  public function assert_not_equals($actual, $expected, $msg = "Test Failed") {
    if ($actual !== $expected) {
      $this->passes++;
      echo "<span style='color:lime'>Test Passed - Value !== $expected</span><br />";
      return true;
    } else {
      $this->fails++;
      echo "<span style='color:red'>$msg - Algorithm should not have returned: $expected</span><br />";
      return false;
    }
  }
  public function expect_error($msg, $code) {
    try {
      $code();
    } catch (Exception $e) {
      $error_thrown = true;
      echo "Expected error was thrown: $e<br />";
    } finally {
      if ($error_thrown) {
        $this->passes++;
        echo "<span style='color:lime'>Test Passed</span><br />";
        return true;
      } else {
        $this->fails++;
        echo "<span style='color:red'>$msg</span><br />";
        return false;
      }
    }
  }
  public function expect_no_error($msg, $code) {
    try {
      $code();
    } catch (Exception $e) {
      $error_thrown = true;
      $error_msg = $e;
    } finally {
      if (!$error_thrown) {
        $this->passes++;
        echo "<span style='color:lime'>Test Passed</span><br />";
        return true;
      } else {
        $this->fails++;
        echo "<span style='color:red'>$msg - $error_msg</span><br />";
        return false;
      }
    }
  }
  public function describe($description, $tests) {
    $uniq_id = $this->random_token();
    echo "<div id='console_$uniq_id' style='color:white;background-color:black;padding:10px;font-family:monospace'>";
    echo "<strong>$description</strong>";
    echo "<div id='describe_$uniq_id' style='margin-left:20px'>";
    $tests();
    echo "</div>";
    $this->summarize();
    echo "</div>";
    echo "<script>
    document.getElementById('console_$uniq_id').style.border = '5px solid " . (($this->passes > 0 && $this->fails === 0) ? "lime" : "red") . "';
    </script>";
  }
  public function it($description, $tests) {
    echo "<strong>$description</strong>";
    echo "<div style='margin-left:20px'>";
    $tests();
    echo "</div>";
  }
  public function random_number() {
    return rand(0, 100);
  }
  public function random_token() {
    $length = rand(8, 10);
    $token = "";
    for ($i = 0; $i < $length; $i++) {
      $token .= str_split(Test::token_chars)[floor(lcg_value() * strlen(Test::token_chars))];
    }
    return $token;
  }
  public function summarize() {
    echo "<hr />";
    if ($this->passes === 0 && $this->fails === 0) {
      echo "<span style='color:red'>ERROR: NO TEST CASES PROVIDED</span><br />";
      return false;
    } else {
      echo "<span style='color:lime'>$this->passes Passed</span><br /><span style='color:red'>$this->fails Failed</span><br />";
      echo ($this->fails === 0 ? "<span style='color:lime'>Algorithm Passed</span>" : "<span style='color:red'>Algorithm Failed</span>") . "<br />";
      return $this->fails === 0;
    }
  }
}
?>
