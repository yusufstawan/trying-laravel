<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $input;
    /**
     * Create a new component instance.
     * @param string
     * @return void
     */
    public function __construct($input = null)
    {
        $this->input = $input;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
