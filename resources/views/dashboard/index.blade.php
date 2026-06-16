@extends('layouts.app')

@section('title', 'Mohaned Dashboard')
@section('page-title', 'Mohaned Dashboard')

@section('content')

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        @foreach($stats as $stat)
            <x-stat-card :type="$stat['type']" :icon="$stat['icon']" :value="$stat['value']" :label="$stat['label']" />
        @endforeach
    </div>

    {{-- Recent Properties Table --}}
    <div class="dash-card animate-in">
        <div class="card-header">
            <h6><i class="bi bi-clock-history me-2"></i>Recent Properties</h6>
            <a href="{{ route('properties') }}" class="btn-primary-custom !py-1.5 !px-4 !text-xs">
                View All <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="card-body overflow-x-auto">
            <table class="custom-table" id="recentPropertiesTable">
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="text-right">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentProperties as $property)
                        <tr>
                            <td>
                                <div class="prop-info">
                                    <img src="{{ $property['image'] }}" alt="{{ $property['name'] }}" class="prop-thumb">
                                    <div class="prop-name">{{ $property['name'] }}</div>
                                </div>
                            </td>
                            <td>
                                <span>{{ $property['type'] }}</span>
                            </td>
                            <td>
                                <span class="text-primary-light font-bold">${{ number_format($property['price']) }}</span>
                            </td>
                            <td>
                                <x-badge :status="$property['status']" />
                            </td>
                            <td class="text-right">
                                <a href="{{ route('property.details', $property['id']) }}"
                                    class="btn-outline-custom !py-1.5 !px-3 !text-[11.5px]">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection