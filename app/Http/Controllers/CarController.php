<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Services\CarService;
use App\Models\Car;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService=$carService;
    }
    public function store(CarRequest $request)
    {
        $validated=$request->validated();        
        return $this->carService->createCar($validated);
    }
    public function index()
    {
        return $this->carService->index();
    }
}
