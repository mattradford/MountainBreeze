<?php
/**
 * Get cache-busting hashed filename from rev-manifest.json.
 *
 * @param string $filename Original name of the file.
 *
 * @return string Current cache-busting hashed name of the file.
 */
function mgAssetPath($filename)
{
    // Cache the decoded manifest so that we only read it in once.
    static $manifest = null;
    if (null === $manifest) {
        $manifest_path = get_stylesheet_directory() . '/dist/mix-manifest.json';
        $manifest = file_exists($manifest_path)
            ? json_decode(file_get_contents($manifest_path), true)
            : [];
    }
    // If the manifest contains the requested file, return the hashed name.
    if (array_key_exists($filename, $manifest)) {
        return '/dist' . $manifest[ $filename ];
    }

    // Assume the file has not been hashed when it was not found within the
    // manifest.
    return $filename;
}