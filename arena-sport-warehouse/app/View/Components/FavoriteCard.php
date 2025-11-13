<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FavoriteCard extends Component
{
    public $imageUrl;
    public $title;
    public $description;
    public $category;
    public $price;
    public $quantity;
    public $rating;
    public $reviews;

    public function __construct(
        $imageUrl,
        $title,
        $description,
        $category,
        $price,
        $quantity,
        $rating,
        $reviews,
    )
    {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->rating = $rating;
        $this->reviews = $reviews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.favorite-card');
    }
}
