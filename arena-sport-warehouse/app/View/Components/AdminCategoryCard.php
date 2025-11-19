<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminCategoryCard extends Component
{
    public $imageUrl;
    public $title;
    public $products;
    public $slug;

    public function __construct(
        $imageUrl,
        $title,
        $products,
        $slug,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->products = $products;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-category-card');
    }
}
