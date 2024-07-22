<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Church;
use App\Services\GeocodingService;

class ChurchController extends Controller
{
    
        protected $geocodingService;
    
        public function __construct(GeocodingService $geocodingService)
        {
            $this->geocodingService = $geocodingService;
        }
    
        public function index()
        {
            $churches = Church::all();
            return response()->json($churches);
        }
    
        public function store(Request $request)
        {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'address' => 'required',
                'parish' => 'required',
                'vicar' => 'required',
            ]);

            $coordinates = $this->geocodingService->getCoordinates($request->address);
            
            if($coordinates) {
                $request->merge([
                    'latitude' => $coordinates['latitude'],
                    'longitude' => $coordinates['longitude'],
                    'city' => $coordinates['city'],
                    'country' => $coordinates['country'],
                ]);
            }

            $church = Church::create($request->all());
            return response()->json($church, 201);
        }
    
        public function show(Church $church)
        {
            return response()->json($church);
        }
    
        public function update(Request $request, Church $church)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'address' => 'required',
                'parish' => 'required',
                'vicar' => 'required',
            ]);
    
            $coordinates = $this->geocodingService->getCoordinates($request->address);
    
            if ($coordinates) {
                $request->merge([
                    'latitude' => $coordinates['latitude'],
                    'longitude' => $coordinates['longitude'],
                ]);
            }

            $church->update($request->all());
            return response()->json($church);
        }
    
        public function destroy(Church $church)
        {
            $church->delete();
            return response()->json(['message' => 'Church deleted successfully.']);
        }
}
