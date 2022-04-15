<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService extends BaseService{
    public function model()
    {
        return Activity::class;
    }
}
