<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $id;
    public $imageUrl;
    public $name;
    public $description;
    public $price;
    public $slug;

    public function __construct(
        $id,
        $imageUrl,
        $name,
        $description,
        $price,
        $slug,
    )
    {
        $this->id = $id;
        $this->imageUrl = $imageUrl;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
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
