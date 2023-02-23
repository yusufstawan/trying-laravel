<?php

namespace App\View\Components\Template;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $one;
    public $two;
    public $three;
    public $four;
    /**
     * Create a new component instance.
     * @param string
     * @param string
     * @param string
     * @param string
     * @return void
     */
    public function __construct($one = "example", $two = "example", $three = "example", $four = "example")
    {
        $this->one = $one;
        $this->two = $two;
        $this->three = $three;
        $this->four = $four;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template.navbar');
    }
}
