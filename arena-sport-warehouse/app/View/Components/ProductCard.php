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
    public $rate;
    public $reviews;

    public function __construct(
        $imageUrl,
        $name,
        $description,
        $price,
        $rate,
        $reviews,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->rate = $rate;
        $this->reviews = $reviews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
