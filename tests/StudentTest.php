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
     protected function tearDown()
    {
        Student::deleteAll();
        // Course::deleteAll();
    }

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
        $this->assertEquals($test_student, $result[0]);
    }

    function testGetAll()
        {
            //Arrange
            $name = "Sam Smith";
            $enrollment_date = "2016-01-30";
            $id = 1;
            $test_student = new Student($name, $enrollment_date, $id);
            $test_student->save();

            $name2 = "Jill Johnson";
            $enrollment_date2 = "2016-01-30";
            $id2 = 2;
            $test_student2 = new Student($name2, $enrollment_date2, $id2);
            $test_student2->save();
            //Act
            $result = Student::getAll();
            //Assert
            $this->assertEquals([$test_student, $test_student2], $result);
        }

        function testDeleteAll()
        {
            $name = "Sam Smith";
            $enrollment_date = "2016-01-30";
            $id = 1;
            $test_student = new Student($name, $enrollment_date, $id);
            $test_student->save();

            $name2 = "Jill Johnson";
            $enrollment_date2 = "2016-01-30";
            $id2 = 2;
            $test_student2 = new Student($name2, $enrollment_date2, $id2);
            $test_student2->save();

            Student::deleteAll();
            $result = Student::getAll();

            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $name = "Sam Smith";
            $enrollment_date = "2016-01-30";
            $id = 1;
            $test_student = new Student($name, $enrollment_date, $id);
            $test_student->save();

            $name2 = "Jill Johnson";
            $enrollment_date2 = "2016-01-30";
            $id2 = 2;
            $test_student2 = new Student($name2, $enrollment_date2, $id2);
            $test_student2->save();

            //Act
            $result = Student::find($test_student->getId());
            //Assert
            $this->assertEquals($test_student, $result);
        }

        function testUpdate()
        {
            //Arrange
            $name = "Sam Smith";
            $enrollment_date = "2016-01-30";
            $id = 1;
            $test_student = new Student($name, $enrollment_date, $id);
            $test_student->save();
            $new_name = "Samuel Smith";
            //Act
            $test_student->update($new_name, $enrollment_date);
            //Assert
            $this->assertEquals($new_name, $test_student->getName());
        }

   }

 ?>
