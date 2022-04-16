<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRomeRequest;
use App\Models\HotelRome;
use App\Services\HotelRomeService;

class HotelRomeController extends Controller
{
    public $services;
    
    public function __construct(HotelRomeService $hotelRomeService)
    {
        $this->services = $hotelRomeService;
    }

    public function index(){
        return $this->services->all();
    }

    public function store(HotelRomeRequest $request){
        return $this->services->create($request);
    }

    public function show(HotelRome $hotelRome){
        return $hotelRome;
    }

    public function update(HotelRome $hotelRome, HotelRomeRequest $request){
        return $this->services->update($request, $hotelRome['id']);
    }

    public function destroy(HotelRome $hotelRome){
        return $this->services->delete($hotelRome['id']);
    }
}
