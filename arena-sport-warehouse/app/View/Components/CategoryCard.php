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
    public $slug;

    public function __construct(
        $imageUrl,
        $name,
        $products,
        $slug,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->name = $name;
        $this->products = $products;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-card');
    }
}
