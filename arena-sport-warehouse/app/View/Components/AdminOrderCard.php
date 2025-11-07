<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminOrderCard extends Component
{
    public $id;
    public $date;
    public $time;
    public $name;
    public $email;
    public $price;
    public $status;

    public function __construct(
        $id,
        $date,
        $time,
        $name,
        $email,
        $price,
        $status,
    )
    {
        $this->id = $id;
        $this->date = $date;
        $this->time = $time;
        $this->name = $name;
        $this->email = $email;
        $this->price = $price;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-order-card');
    }
}
