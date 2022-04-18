@php
    $icons = [
        'new' => 'fa-solid fa-clock-rotate-left',
        'answered' => 'fa-solid fa-bookmark',
        'solved' => 'fa-solid fa-circle-check',
        'closed' => 'fa-solid fa-circle-xmark'
    ]
@endphp

<span class="{{ $status }} last:mr-0 mr-1">
    <i class="{{ $icons[$status] }}"></i> {{ $status }}
</span>