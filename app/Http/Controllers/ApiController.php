<?php

namespace App\Http\Controllers;

use App\Services\ApiNovaPoshtaService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
  private ApiNovaPoshtaService $apiNovaPoshtaService;

  public function __construct(ApiNovaPoshtaService $apiNovaPoshtaService) {
      $this->apiNovaPoshtaService = $apiNovaPoshtaService;
  }

  public function getCitites(Request $request) {
      $search = $request->input("search");
      return $this->apiNovaPoshtaService->getCities($search);
  }

    public function getWarehouses(Request $request) {
        $search = $request->input("cityRef");
        return $this->apiNovaPoshtaService->getWarehouses($search);
    }

}
