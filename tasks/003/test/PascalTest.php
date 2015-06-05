<?php

require_once(dirname(__FILE__).'/../lib/Pascal.php');

class PascalTest extends PHPUnit_Framework_TestCase {

    public function testInitialTringle() {
        $expected = <<<EOD
1
EOD;

        $pascal = new Pascal(1);
        $this->assertEquals($pascal->output(), $expected);
    }

    public function testTwoLevelTringle() {
        $expected = <<<EOD
 1
1 1
EOD;

        $pascal = new Pascal(2);
        $this->assertEquals($pascal->output(), $expected);
    }

    public function testFirstTringleWithItemsGreaterThanOne() {
        $expected = <<<EOD
  1
 1 1
1 2 1
EOD;

        $pascal = new Pascal(3);
        $this->assertEquals($pascal->output(), $expected);
    }

    function testSmallTriangle(){
        $expected = <<<EOD
    1
   1 1
  1 2 1
 1 3 3 1
1 4 6 4 1
EOD;

        $pascal = new Pascal(5);
        $this->assertEquals($pascal->output(), $expected);
    }

    function testFirstTwoDigitTriangle(){
        $expected = <<<EOD
          1
        1   1
      1   2   1
    1   3   3   1
  1   4   6   4   1
1   5   10  10  5   1
EOD;

        $pascal = new Pascal(6);
        $this->assertEquals($pascal->output(), $expected);
    }

    function testBigTriangle(){
        $expected = <<<EOD
                            1
                         1     1
                      1     2     1
                   1     3     3     1
                1     4     6     4     1
             1     5    10    10     5     1
          1     6    15    20    15     6     1
       1     7    21    35    35    21     7     1
    1     8    28    56    70    56    28     8     1
 1     9    36    84    126   126   84    36     9     1
EOD;

        $pascal = new Pascal(10);
        $this->assertEquals($pascal->output(), $expected);
    }
}
