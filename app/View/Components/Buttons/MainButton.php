<?php

namespace App\View\Components\Buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $type = 'button',public $id = '',public $href = '')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.main-button');
    }
}
