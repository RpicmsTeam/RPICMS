<?php
class mysqliLoadedTest extends PHPUnit_Framework_TestCase
{
    public function __construct()
    {
      $obj = new Foobar();
      $this->assertTrue($obj->testForMysqli());
      $this->assertTrue($obj->tryDBConnection());
    }



    public function testForMysqli()
    {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped('[mysqliLoadedTest]->[testForMysqli()]: The MySQLi extension is not available');
        }else{
            fwrite(STDERR, print_r('[mysqliLoadedTest]->[testForMysqli()]: The MySQLi extension is available', TRUE));
        }
    }

    /**
     * @depends testForMysqli
     */
    public function tryDBConnection()
    {
      $mysqli = new mysqli("localhost","root","","RPICMS");
      // Check connection
      if ($mysqli->connect_errno > 0)
      {
        $this->assertFalse($mysqli->connect_error());
        fwrite(STDERR, print_r('[mysqliLoadedTest]->[tryDBConnection()]: Failed to connect to MySQLi: ' . $mysqli->connect_error(), TRUE));
      }else{
        $this->expectOutputString('[mysqliLoadedTest]->[tryDBConnection()]: Could connect to MySQLi');
        print '[mysqliLoadedTest]->[tryDBConnection()]: Could connect to MySQLi';
        #fwrite(STDERR, print_r('[mysqliLoadedTest]->[tryDBConnection()]: Could connect to MySQLi', TRUE));
      }
      return "test";
    }
}
?>
