<?php

namespace App\Services;

use App\Models\HotelRome;

class HotelRomeService extends BaseService{
    public function model()
    {
        return HotelRome::class;
    }
}
