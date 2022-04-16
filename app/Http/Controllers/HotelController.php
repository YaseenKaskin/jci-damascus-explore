<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Services\HotelService;

class HotelController extends Controller
{
    public $services;
    
    public function __construct(HotelService $hotelService)
    {
        $this->services = $hotelService;
    }

    public function index(){
        return $this->services->all();
    }

    public function store(HotelRequest $request){
        return $this->services->create($request);
    }

    public function show(Hotel $hotel){
        return $hotel;
    }

    public function update(Hotel $hotel, HotelRequest $request){
        return $this->services->update($request, $hotel['id']);
    }

    public function destroy(Hotel $hotel){
        return $this->services->delete($hotel['id']);
    }
}
