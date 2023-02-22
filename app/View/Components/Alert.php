<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $message;
    public $name;
    public $number;
    /**
     * Create a new component instance.
     *
     * @param string
     * @param string
     * @param int
     * @return void
     */
    public function __construct($message = null, $name = null, $number = null)
    {
        $this->message = $message;
        $this->name = $name;
        $this->number = $number;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
