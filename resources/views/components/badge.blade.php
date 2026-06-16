@props(['status'])

@php
    $statusLower = strtolower(trim($status));
@endphp

@if($statusLower === 'available')
    <span {{ $attributes->merge(['class' => 'badge-status badge-available']) }}>
        <i class="bi bi-check-circle me-1"></i>{{ ucfirst($status) }}
    </span>
@elseif($statusLower === 'sold')
    <span {{ $attributes->merge(['class' => 'badge-status badge-sold']) }}>
        <i class="bi bi-x-circle me-1"></i>{{ ucfirst($status) }}
    </span>
@elseif($statusLower === 'reserved')
    <span {{ $attributes->merge(['class' => 'badge-status badge-reserved']) }}>
        <i class="bi bi-clock me-1"></i>{{ ucfirst($status) }}
    </span>
@else
    <span {{ $attributes->merge(['class' => 'badge-status']) }}>
        <i class="bi bi-info-circle me-1"></i>{{ ucfirst($status) }}
    </span>
@endif