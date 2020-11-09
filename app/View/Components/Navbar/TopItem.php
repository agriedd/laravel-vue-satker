<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;

class TopItem extends Component
{
    
    public $label = '';
    public $url = '#';
    public $active = false;

    public function __construct($label, $url, $param = null){
        $this->label = $label;
        $this->url = $url;
        $this->active = request()->is($param ?? $url);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar.top-item');
    }
}
