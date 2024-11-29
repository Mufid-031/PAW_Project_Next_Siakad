<?php

use App\Http\Controllers\CourseController;

function createCourse($data)
{
    return CourseController::createCourse(
        $data['name'],
        $data['code'],
        $data['teacherId'],
        $data['sks'],
        $data['semester'],
        $data['programStudi']
    );
}

function updateCourse($data)
{
    return CourseController::updateCourse(
        $data['code'],
        $data['name'] || null,
        $data['teacherId'] || null,
        $data['sks'] || null,
        $data['semester'] || null,
        $data['programStudi'] || null
    );
}

function deleteCourse($code)
{
    return CourseController::deleteCourse($code);
}

function getCourseBySearch($name)
{
    return CourseController::getCourseBySearch($name);
}
