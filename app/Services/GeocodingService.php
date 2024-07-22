<?php
// app/Services/GeocodingService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeocodingService
{
    public function getCoordinates($address)
    {
        $response = Http::get('https://nominatim.openstreetmap.org/search', [
            'q' => $address,
            'format' => 'json',
            'addressdetails' => 1,
            'limit' => 1,
        ]);
        
        if ($response->successful()) {
            $data = $response->json();
            if (!empty($data)) {
                $location = $data[0];
                return [
                    'latitude' => $location['lat'],
                    'longitude' => $location['lon'],
                ];
            }
        }

        return null;
    }
}
