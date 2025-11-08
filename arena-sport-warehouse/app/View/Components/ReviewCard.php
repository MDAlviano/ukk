<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReviewCard extends Component
{
    public $name;
    public $rate;
    public $date;
    public $description;

    public function __construct(
        $name,
        $rate,
        $date,
        $description,
    )
    {
        $this->name = $name;
        $this->rate = $rate;
        $this->date = $date;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-card');
    }
}
