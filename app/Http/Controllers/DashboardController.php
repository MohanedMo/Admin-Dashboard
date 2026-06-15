<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private function getProperties(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Skyline Luxury Apartments',
                'type' => 'Apartment',
                'price' => 450000,
                'status' => 'Available',
                'image' => '/images/properties/property-1.png',
                'images' => [
                    '/images/properties/property-1.png',
                    '/images/properties/property-4.png',
                    '/images/properties/property-3.png',
                ],
            ],
            [
                'id' => 2,
                'name' => 'Palm Villa Resort',
                'type' => 'Villa',
                'price' => 1250000,
                'status' => 'Available',
                'image' => '/images/properties/property-2.png',
                'images' => [
                    '/images/properties/property-2.png',
                    '/images/properties/property-5.png',
                    '/images/properties/property-1.png',
                ],
            ],
            [
                'id' => 3,
                'name' => 'Metro Business Tower',
                'type' => 'Office',
                'price' => 890000,
                'status' => 'Reserved',
                'image' => '/images/properties/property-3.png',
                'images' => [
                    '/images/properties/property-3.png',
                    '/images/properties/property-1.png',
                    '/images/properties/property-6.png',
                ],
            ],
            [
                'id' => 4,
                'name' => 'Horizon Penthouse Suite',
                'type' => 'Apartment',
                'price' => 2100000,
                'status' => 'Sold',
                'image' => '/images/properties/property-4.png',
                'images' => [
                    '/images/properties/property-4.png',
                    '/images/properties/property-1.png',
                    '/images/properties/property-2.png',
                ],
            ],
            [
                'id' => 5,
                'name' => 'Azure Beachfront Villa',
                'type' => 'Villa',
                'price' => 3500000,
                'status' => 'Available',
                'image' => '/images/properties/property-5.png',
                'images' => [
                    '/images/properties/property-5.png',
                    '/images/properties/property-2.png',
                    '/images/properties/property-4.png',
                ],
            ],
            [
                'id' => 6,
                'name' => 'Heritage Garden Townhouse',
                'type' => 'Villa',
                'price' => 780000,
                'status' => 'Reserved',
                'image' => '/images/properties/property-6.png',
                'images' => [
                    '/images/properties/property-6.png',
                    '/images/properties/property-2.png',
                    '/images/properties/property-3.png',
                ],
            ],
        ];
    }
    public function index()
    {
        $properties = $this->getProperties();

        $stats = [
            'total_properties' => count($properties),
            'total_clients' => 124,
            'new_requests' => 18,
            'total_sales' => 8970000,
        ];

        $recentProperties = collect($properties)
            ->sortByDesc('added_date')
            ->take(5)
            ->values()
            ->toArray();

        return view('dashboard.index', compact('stats', 'recentProperties'));
    }

    public function properties(Request $request)
    {
        $properties = $this->getProperties();

        $status = $request->query('status');
        if ($status && $status !== 'all') {
            $properties = array_values(array_filter($properties, function ($property) use ($status) {
                return strtolower($property['status']) === strtolower($status);
            }));
        }

        return view('dashboard.properties', compact('properties', 'status'));
    }
    public function propertyDetails($id)
    {
        $properties = $this->getProperties();

        $property = collect($properties)->firstWhere('id', (int) $id);

        if (!$property) {
            abort(404);
        }

        return view('dashboard.property-details', compact('property'));
    }
}
