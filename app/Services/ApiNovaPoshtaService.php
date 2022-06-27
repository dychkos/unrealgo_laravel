<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiNovaPoshtaService
{
    public function getCities($search = '') {
        $request['apiKey'] = $this->getApiKey();
        $request['modelName'] = "Address";
        $request['calledMethod'] = "getSettlements";

        $data = [
            'Page' => 1,
            'Warehouse' => 1,
            'Limit' => 10
        ];

        if($search) {
            $data = array_merge(['FindByString' => $search], $data);
        }

        $request['methodProperties'] = $data;

        $response = Http::post($this->getUrl(), $request);

        return json_decode($response->body(), true);
    }

    public function getWarehouses($cityRef) {
        $request['apiKey'] = $this->getApiKey();
        $request['modelName'] = "Address";
        $request['calledMethod'] = "getWarehouses";

        $data = [
            'Page' => 1,
            'Warehouse' => 1,
            'Limit' => 10,
            'SettlementRef' => $cityRef
        ];

        $request['methodProperties'] = $data;

        $response = Http::post($this->getUrl(), $request);
        return json_decode($response->body(), true);

    }

    private function getUrl() {
        $config = config('unrgo.nova_poshta');
        return $config['url'];
    }

    private function getApiKey() {
        $config = config('unrgo.nova_poshta');
        return $config['api_key'];
    }
}
