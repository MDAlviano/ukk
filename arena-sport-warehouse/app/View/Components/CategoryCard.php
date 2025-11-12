<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCard extends Component
{
    public $imageUrl;
    public $name;
    public $products;

    public function __construct(
        $imageUrl,
        $name,
        $products,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->name = $name;
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-card');
    }
}
