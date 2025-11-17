<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $imageUrl;
    public $name;
    public $description;
    public $price;
    public $orders;
    public $slug;

    public function __construct(
        $imageUrl,
        $name,
        $description,
        $price,
        $orders,
        $slug,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->orders = $orders;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
