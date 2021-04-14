<?php

/**
 * 🚀 A Laravel package that focuses on minimizing payload size of HTML document
 *    and optimizing processing on the browser when rendering the web page.
 *
 * @copyright 2021 Mai Nhut Tan https://code.shin.company.
 * @package   shinsenter/defer-laravel
 * @see       https://github.com/shinsenter/defer-laravel
 */

return [
    // Insert debug information inside the output HTML after optimization.
    // Debug information will contain outer HTMLs of tags before being optimized.
    // Default: false (turn off the debug information)
    'debug_mode' => false,

    // ---------------------------------------------------------------------------

    // This option moves all stylesheets to bottom of the head tag,
    //   and moves script tags to bottom of the body tag
    // See: https://web.dev/render-blocking-resources/
    // Default: true (always automatically fix render blocking)
    'fix_render_blocking' => true,

    // Turn on optimization for stylesheets
    // This option applies to style and link[rel="stylesheet"] tags.
    // Best practices: https://web.dev/extract-critical-css/
    // Default: true (automatically optimize stylesheets)
    'optimize_css' => true,

    // Optimize script tags (both inline and external scripts).
    // Note: The library only minify for inline script tags.
    // See: https://web.dev/unminified-javascript/
    // Default: true (automatically optimize script tags)
    'optimize_scripts' => true,

    // Optimize img, picture, video, audio and source tags.
    // See: https://web.dev/browser-level-image-lazy-loading/
    // See: https://web.dev/lazy-loading-images/
    // Default: true (automatically optimize)
    'optimize_images' => true,

    // Optimize iframe, frame, embed tags.
    // See: https://web.dev/lazy-loading-video/
    // Default: true (automatically optimize)
    'optimize_iframes' => true,

    // Optimize tags that containing CSS for loading images from external sources.
    // For example, style properties contain background-image:url() etc.
    // See: https://web.dev/optimize-css-background-images-with-media-queries/
    // Default: true (automatically optimize)
    'optimize_background' => true,

    // Create noscript tags so lazy-loaded elements can still display
    //   even when the browser doesn't have javascript enabled.
    // This option applies to all tags that have been lazy-loaded.
    // See: https://web.dev/without-javascript/
    // Default: true (automatically create fallback noscript tags)
    'optimize_fallback' => true,

    // Optimize anchor tags, fix unsafe links to cross-origin destinations
    // See: https://web.dev/external-anchors-use-rel-noopener/
    // Default: true (automatically optimize)
    'optimize_anchors' => true,

    // Add missing meta tags such as meta[name="viewport"], meta[charset] etc.
    // See: https://web.dev/viewport/
    // Default: true (automatically optimize)
    'add_missing_meta_tags' => true,

    // Preconnect to required URL origins.
    // See: https://web.dev/uses-rel-preconnect/
    // Default: true (automatically optimize)
    'enable_dns_prefetch' => true,

    // Preload key requests such as stylesheets or external scripts.
    // See: https://web.dev/uses-rel-preload/
    // Default: false (do not apply by default)
    'enable_preloading' => false,

    // Lazy-load all elements like images, videos when possible.
    // See: https://web.dev/lazy-loading/
    // Default: true (automatically optimize)
    'enable_lazyloading' => true,

    // Minify HTML output.
    // See: https://web.dev/reduce-network-payloads-using-text-compression/
    // Default: false (do not minify HTML by default)
    'minify_output_html' => false,

    // ---------------------------------------------------------------------------

    // Detect and optimize third-party URLs if possible (experiment).
    // This option also allows entering an array containing the URL origins to be defered.
    // See: https://web.dev/preload-optional-fonts/
    // Default: true (automatically optimize)
    'defer_third_party' => true,

    // Apply fade-in animation to tags after being lazy-loaded.
    // Default: false (do not apply by default)
    'use_css_fadein_effects' => false,

    // Use random background colors for images to be lazy-loaded.
    // Set the value to 'grey' if you want to use greyish background colors.
    // Default: false (do not apply by default)
    'use_color_placeholder' => false,

    // ---------------------------------------------------------------------------

    // Default placeholder for lazy-loaded img tags.
    // If this value is not set or empty,
    //   an SVG image will be used to avoid CLS related problems.
    // See: https://web.dev/cls/
    // Default: blank string
    // Example:
    // 'img_placeholder' => 'https://example.com/noimage.jpg',
    'img_placeholder' => '',

    // Default placeholder for lazy-loaded iframe tags.
    // Default: 'about:blank'
    // Example:
    // 'iframe_placeholder' => 'https://example.com/loading.html',
    'iframe_placeholder' => 'about:blank',

    // ---------------------------------------------------------------------------

    // Show custom HTML content (splashscreen)
    //   while browser is rendering the page (experiment).
    // Default: blank string (no splashscreen)
    // Example:
    // 'custom_splash_screen' => '<div id="loading"><div class="indicator"></div></div>',
    'custom_splash_screen' => '',

    // ---------------------------------------------------------------------------

    // Do not lazy-load for URLs containing
    //   one of the array's texts (exact match keywords).
    // Default: blank array
    'ignore_lazyload_paths' => [],

    // Do not lazy-load for tags containing
    //   one of the array's texts (exact match keywords).
    // Default: blank array
    'ignore_lazyload_texts' => [],

    // Do not lazy-load for tags containing
    //   one of these CSS class names.
    // Default: blank array
    'ignore_lazyload_css_class' => [],

    // Do not lazy-load for tags containing
    //   one of these CSS selectors.
    // See: https://www.w3schools.com/cssref/css_selectors.asp
    // Default: blank array
    'ignore_lazyload_css_selectors' => [
        // 'img#logo',
        // 'header img',
    ],
];
