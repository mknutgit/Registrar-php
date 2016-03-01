<?php

    /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */

   require_once "src/Course.php";

   $server = 'mysql:host=localhost;dbname=registrar_test';
   $username = 'root';
   $password = 'root';
   $DB = new PDO($server, $username, $password);

   class CourseTest extends PHPUnit_Framework_TestCase
   {
         protected function tearDown()
        {
            Course::deleteAll();
            // Course::deleteAll();
        }

        function testGetName()
        {
            $name = "General History";
            $course_number = "HIST100";
            $test_course = new Course($name, $course_number);
            $test_course->setName($name);

            $result = $test_course->getName();

            $this->assertEquals($name, $result);
        }

        function testGetCourseNumber()
        {
            $name = "General History";
            $course_number = "HIST100";
            $test_course = new Course($name, $course_number);
            $test_course->setName($name);

            $result = $test_course->getCourseNumber();

            $this->assertEquals($course_number, $result);
        }

        function testGetId()
        {
            $name = "General History";
            $course_number = "HIST100";
            $id = 1;
            $test_course = new Course($name, $course_number, $id);

            $result = $test_course->getId();

            $this->assertEquals($id, $result);
        }

        function testgetAll()
        {
            $name = "General History";
            $course_number = "HIST100";
            $test_course = new Course($name, $course_number);
            $test_course->save();

            $name2 = "General Math";
            $course_number2 = "MATH100";
            $test_course2 = new Course($name2, $course_number2);
            $test_course2->save();

            $result = Course::getAll();

            $this->assertEquals([$test_course, $test_course2], $result);
        }
    }
?>
