<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminProductCard extends Component
{
    public $imageUrl;
    public $uniqueId;
    public $title;
    public $description;
    public $category;
    public $price;
    public $quantity;
    public $orders;

    public function __construct(
        $imageUrl,
        $uniqueId,
        $title,
        $description,
        $category,
        $price,
        $quantity,
        $orders,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->uniqueId = $uniqueId;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->orders = $orders;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-product-card');
    }
}
