<?php

namespace App\Http\Controllers;

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
        return view('churches.index', compact('churches'));
    }

    public function create()
    {
        return view('churches.create');
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
        
        if ($coordinates) {
            $request->merge([
                'latitude' => $coordinates['latitude'],
                'longitude' => $coordinates['longitude'],
            ]);
        }
        
        Church::create($request->all());
        return redirect()->route('churches.index')->with('success', 'Church created successfully.');
    }

    public function show(Church $church)
    {
        return view('churches.show', compact('church'));
    }

    public function edit(Church $church)
    {
        return view('churches.edit', compact('church'));
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

        $church->update($request->all());
        return redirect()->route('churches.index')->with('success', 'Church updated successfully.');
    }

    public function destroy(Church $church)
    {
        $church->delete();
        return redirect()->route('churches.index')->with('success', 'Church deleted successfully.');
    }
}
