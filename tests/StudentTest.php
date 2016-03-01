<?php

    /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */

   require_once "src/Student.php";

   $server = 'mysql:host=localhost;dbname=registrar_test';
   $username = 'root';
   $password = 'root';
   $DB = new PDO($server, $username, $password);

   class StudentTest extends PHPUnit_Framework_TestCase
   {
    //  protected function tearDown()
    // {
    //     Student::deleteAll();
    //     Course::deleteAll();
    // }

    function testGetName()
    {
      $name = "Sam Smith";
      $enrollment_date = "2016-01-30";
      $test_student = new Student($name, $enrollment_date);

      $test_student->setName($name);
      $result = $test_student->getName();

      $this->assertEquals($name, $result);
    }

    function testGetEnrollmentDate(){
        $name = "Sam Smith";
        $enrollment_date = "2016-01-30";
        $test_student = new Student($name, $enrollment_date);

        $test_student->setEnrollmentDate($enrollment_date);
        $result = $test_student->getEnrollmentDate();

        $this->assertEquals($enrollment_date, $result);
    }

    function testGetId()
    {
        $name = "Sam Smith";
        $enrollment_date = "2016-01-30";
        $id = 1;
        $test_student = new Student($name, $enrollment_date, $id);

        $result = $test_student->getId();

        $this->assertEquals($id, $result);
    }

    function test_save()
    {
        $name = "Sam Smith";
        $enrollment_date = "2016-01-30";
        $id = 1;
        $test_student = new Student($name, $enrollment_date, $id);

        $test_student->save();

        $result = Student::getAll();
        $this->assertEquals($test_student, $result [0]);
    }


   }

 ?>
