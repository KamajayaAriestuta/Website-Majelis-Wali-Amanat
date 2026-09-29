@props(['value', 'format' => 'd F Y'])
{{ $value ? rescue(fn () => \Carbon\Carbon::parse($value)->locale('id')->translatedFormat($format), $value, false) : '-' }}
