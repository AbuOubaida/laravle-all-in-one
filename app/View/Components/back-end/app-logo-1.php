<?php

namespace App\View\Components\back-end;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class app-logo-1 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back-end.app-logo-1');
    }
}
