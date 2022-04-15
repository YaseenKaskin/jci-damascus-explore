<?php

namespace App\Services;

use App\Models\Hotel;

class HotelService extends BaseService{
    public function model()
    {
        return Hotel::class;
    }
}
