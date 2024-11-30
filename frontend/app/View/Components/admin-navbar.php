<?php

namespace App\View\Components;

use App\Http\Controllers\AdminController;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admin_navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public $admin;
    public function __construct($admin)
    {
        //
        $this->admin = $admin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-navbar', [
            'admin' => $this->admin
        ]);
    }
}