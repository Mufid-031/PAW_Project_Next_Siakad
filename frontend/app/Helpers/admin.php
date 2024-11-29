<?php

use App\Http\Controllers\AdminController;

function getStudentBySearch($name)
{
    return AdminController::getStudentBySearch($name);
}

function getTeacherBySearch($name)
{
    return AdminController::getTeacherBySearch($name);
}

function getStudent($id)
{
    return AdminController::getStudent($id);
}

function getTeacher($id)
{
    return AdminController::getTeacher($id);
}

// function login($email, $password)
// {
//     return AdminController::login($email, $password);
// }
