<?php

namespace App\View\Components\admin\search;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
    public $placeholder;
    public $route;
    public $width;
    /**
     * Create a new component instance.
     */
    public function __construct($placeholder, $route, $width)
    {
        $this->placeholder = $placeholder;
        $this->route = $route;
        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.search.search');
    }
}
