<?php
require_once ('tests/mysqliLoadedTest.php');
class mysqliLoadedTest extends PHPUnit_Framework_TestCase
{
    /**
     * @depends testForMysqli
     */
    public function tryDBConnection()
    {
      $mysqli = new mysqli("localhost","root","","RPICMS");
      // Check connection
      if ($mysqli->connect_errno > 0)
      {
        $this->markTestSkipped($mysqli->connect_error());
      }else{
        fwrite(STDERR, print_r('[mysqliLoadedTest]->[tryDBConnection()]: Could connect to MySQLi', TRUE));
      }
      return '[mysqliLoadedTest]->[tryDBConnection()]: Could connect to MySQLi';
    }
}
?>
