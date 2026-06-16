@extends('layouts.app')

@section('title', 'Properties')
@section('page-title', 'Properties')

@section('content')

    <div class="filter-bar" aria>
        <div class="search-wrapper">
            <i class="bi bi-search"></i>
            <input type="text" class="search-input" id="propertySearch" placeholder="Search properties by name..." autocomplete="off">
        </div>

        <a href="{{ route('properties', ['status' => 'all']) }}" class="filter-btn {{ (!$status || $status === 'all') ? 'active' : '' }}">
            All
        </a>
        <a href="{{ route('properties', ['status' => 'available']) }}" class="filter-btn {{ $status === 'available' ? 'active' : '' }}">
            <i class="bi bi-check-circle me-1"></i> Available
        </a>
        <a href="{{ route('properties', ['status' => 'sold']) }}" class="filter-btn {{ $status === 'sold' ? 'active' : '' }}">
            <i class="bi bi-x-circle me-1"></i> Sold
        </a>
        <a href="{{ route('properties', ['status' => 'reserved']) }}" class="filter-btn {{ $status === 'reserved' ? 'active' : '' }}">
            <i class="bi bi-clock me-1"></i> Reserved
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" id="propertiesGrid">
        @forelse($properties as $property)
            <div class="property-item animate-in" data-name="{{ strtolower($property['name']) }}">
                <div class="property-card">
                    <div class="card-img-wrapper">
                        <img src="{{ $property['image'] }}" alt="{{ $property['name'] }}" loading="lazy">
                        <div class="badge-overlay">
                            <x-badge :status="$property['status']" />
                        </div>
                        <span class="type-badge">
                            <i class="bi bi-tag me-1"></i>{{ $property['type'] }}
                        </span>
                    </div>
                    <div class="card-content">
                        <h5>{{ $property['name'] }}</h5>
                        
                        <div class="card-footer-row mt-4">
                            <span class="price">${{ number_format($property['price']) }}</span>
                            <a href="{{ route('property.details', $property['id']) }}" class="btn-view">
                                View Details <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <i class="bi bi-inbox text-4xl text-muted mb-3"></i>
                <p class="text-muted">No properties found matching your criteria.</p>
                <a href="{{ route('properties') }}" class="btn-primary-custom mt-3">
                    <i class="bi bi-arrow-left"></i> View All Properties
                </a>
            </div>
        @endforelse
    </div>

@endsection

@section('scripts')
    <script>
        const searchInput = document.getElementById('propertySearch');
        const propertyItems = document.querySelectorAll('.property-item');

        if(searchInput) {
            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                propertyItems.forEach(item => {
                    const name = item.getAttribute('data-name');
                    item.style.display = name.includes(query) ? '' : 'none';
                });
            });
        }
    </script>
@endsection