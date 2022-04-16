<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use App\Services\ActivityService;

class ActivityController extends Controller
{
    public $services;
    
    public function __construct(ActivityService $activityService)
    {
        $this->services = $activityService;
    }

    public function index(){
        return $this->services->all();
    }

    public function store(ActivityRequest $request){
        return $this->services->create($request);
    }

    public function show(Activity $activity){
        return $activity;
    }

    public function update(Activity $activity, ActivityRequest $request){
        return $this->services->update($request, $activity['id']);
    }

    public function destroy(Activity $activity){
        return $this->services->delete($activity['id']);
    }
}
