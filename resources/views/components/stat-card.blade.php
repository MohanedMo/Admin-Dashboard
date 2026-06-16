@props(['type', 'icon', 'value', 'label'])

<div class="stat-card {{ $type }} animate-in">
    <div class="stat-icon">
        <i class="bi {{ $icon }}"></i>
    </div>
    <div class="stat-value">{{ $value }}</div>
    <div class="stat-label">{{ $label }}</div>
</div>
