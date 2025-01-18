<?php

namespace App\View\Components\admin\search;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
    public $placeholder;
    public $route;
    /**
     * Create a new component instance.
     */
    public function __construct($placeholder, $route)
    {
        $this->placeholder = $placeholder;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.search.search');
    }
}
