<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddressCard extends Component
{
    public $recipientName;
    public $address;
    public $city;
    public $province;
    public $country;
    public $postalCode;
    public $additionalInfo;
    public $addressData;

    public function __construct(
        $recipientName,
        $address,
        $city,
        $province,
        $country,
        $postalCode,
        $additionalInfo,
        $addressData,
    )
    {
        $this->recipientName = $recipientName;
        $this->address = $address;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
        $this->postalCode = $postalCode;
        $this->additionalInfo = $additionalInfo;
        $this->addressData = $addressData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.address-card');
    }
}
