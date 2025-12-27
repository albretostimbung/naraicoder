<?php


if (!function_exists('cloudinary_preset')) {
    function cloudinary_preset(string $key): string
    {
        return config("cloudinary.presets.$key");
    }
}

if (! function_exists('cloudinary_url')) {
    function cloudinary_url(?string $publicId, array $options = []): ?string
    {
        if (! $publicId) {
            return null;
        }

        $cloudName = config('cloudinary.cloud.cloud_name');

        // Default options
        $width   = $options['width']   ?? null;
        $height  = $options['height']  ?? null;
        $crop    = $options['crop']    ?? 'fill';
        $quality = $options['quality'] ?? 'auto';
        $format  = $options['format']  ?? 'auto';

        $transformations = [];

        if ($width || $height) {
            $transformations[] = "c_{$crop}"
                . ($width ? ",w_{$width}" : '')
                . ($height ? ",h_{$height}" : '');
        }

        $transformations[] = "q_{$quality}";
        $transformations[] = "f_{$format}";

        $transformString = implode(',', $transformations);

        return "https://res.cloudinary.com/{$cloudName}/image/upload/{$transformString}/{$publicId}";
    }
}
