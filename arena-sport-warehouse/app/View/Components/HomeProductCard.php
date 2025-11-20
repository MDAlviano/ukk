<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeProductCard extends Component
{
    public $id;
    public $imageUrl;
    public $name;
    public $description;
    public $price;

    public function __construct(
        $id,
        $imageUrl,
        $name,
        $description,
        $price,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-product-card');
    }
}
