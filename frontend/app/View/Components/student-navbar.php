<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class student_navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public $student;
    public function __construct($student)
    {
        //
        $this->student = $student;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student-navbar', [
            'student' => $this->student
        ]);
    }
}
