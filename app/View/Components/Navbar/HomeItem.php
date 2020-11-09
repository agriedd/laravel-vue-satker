<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;

class HomeItem extends Component
{
    public $label = '';
    public $url = '#';

    public function __construct($label, $url){
        $this->label = $label;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar.home-item');
    }
}
