<?php

namespace App\Http\Services;

use App\Models\Car;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CarService
{
  protected $carModel;

  public function __construct(Car $carModel)
  {
    $this->carModel = $carModel;
  }

  public function createCar(array $data)
  {
    $existingCar = $this->checkExistingCar($data['RegNumber'], $data['Vin']);

    if ($existingCar) {
      return response()->json([
        'error' => 'Car with the same RegNumber or Vin already exists'
      ], 409)->header('Content-Type', 'application/json');
    } else {
      $car = $this->createNewCar($data);
      return response()->json([
        'data' => $car
      ], 201);
    }
  }

  protected function checkExistingCar($regNumber, $vin)
  {
    return $this->carModel::where('RegNumber', $regNumber)
      ->orWhere('Vin', $vin)
      ->exists();
  }

  protected function createNewCar(array $data)
  {
    return $this->carModel::create($data);
  }

  public function index(): JsonResponse
  {
    $cars = $this->carModel::all();

    $totalCount = $cars->count();

    return response()->json([
      'data' => $cars,
      'meta' => [
        'total_count' => $totalCount
      ]
    ]);
  }
}
