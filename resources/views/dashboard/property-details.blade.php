@extends('layouts.app')

@section('title', $property['name'])
@section('page-title', 'Property Details')

@section('content')

    <div class="flex items-center justify-between flex-wrap gap-3 mb-6">
        <a href="{{ route('properties') }}" class="btn-outline-custom">
            <i class="bi bi-arrow-left"></i> Back to Properties
        </a>
        <button class="btn-primary-custom opacity-50 cursor-not-allowed">
            <i class="bi bi-pencil-square"></i> Edit Property
        </button>
    </div>

    <div class="detail-hero mb-6 animate-in" id="heroImage">
        <img src="{{ $property['images'][0] ?? $property['image'] }}" alt="{{ $property['name'] }}" id="mainImage">
    </div>

    @if(isset($property['images']) && count($property['images']) > 0)
        <div class="gallery-grid mb-6 animate-in">
            @foreach($property['images'] as $index => $image)
                <img src="{{ $image }}" alt="{{ $property['name'] }} - Image {{ $index + 1 }}"
                    class="{{ $index === 0 ? 'active-thumb' : '' }}" onclick="changeMainImage(this, '{{ $image }}')" loading="lazy">
            @endforeach
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="detail-info mb-6 animate-in">
                <div class="flex items-start justify-between flex-wrap gap-3 mb-4">
                    <div>
                        <h2>{{ $property['name'] }}</h2>
                    </div>
                    <x-badge :status="$property['status']" style="font-size:13px;padding:6px 16px;" />
                </div>
                <div class="detail-price">${{ number_format($property['price']) }}</div>
                <div class="detail-specs">
                    <div class="spec-item">
                        <i class="bi bi-building"></i>
                        <div class="spec-value">{{ $property['type'] }}</div>
                        <div class="spec-label">Type</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="detail-info animate-in">
                <h5 class="font-bold text-[15px] mb-5">
                    <i class="bi bi-info-circle me-2"></i>Quick Info
                </h5>

                <div class="flex flex-col gap-3">
                    <div class="flex justify-between items-center pb-3 border-b border-white/5">
                        <span class="text-muted text-[13px]">Property ID</span>
                        <span class="font-semibold text-[13px]">#{{ str_pad($property['id'], 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-white/5">
                        <span class="text-muted text-[13px]">Type</span>
                        <span class="font-semibold text-[13px]">{{ $property['type'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-muted text-[13px]">Status</span>
                        <x-badge :status="$property['status']" />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function changeMainImage(thumb, src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.gallery-grid img').forEach(img => {
                img.classList.remove('active-thumb');
            });
            thumb.classList.add('active-thumb');
        }
    </script>
@endsection