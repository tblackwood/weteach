<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses(Request $request) {
        return view('courses');
    }

    public function course(Request $request, $subdomain) {
        $course = Course::where('subdomain', '=', $subdomain)->firstOrFail();
        return view('course.index', compact('course'));
    }
}
