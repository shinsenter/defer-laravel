<?php

/**
 * 🚀 A Laravel package that focuses on minimizing payload size of HTML document
 *    and optimizing processing on the browser when rendering the web page.
 *
 * @copyright 2021 Mai Nhut Tan https://code.shin.company.
 * @package   shinsenter/defer-laravel
 * @see       https://github.com/shinsenter/defer-laravel
 */

namespace AppSeeds\DeferLaravel;

use AppSeeds\Defer;
use Closure;
use Exception;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeferMiddleware
{
    /** @var \Illuminate\Contracts\Container\Container */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Handle an incoming request. Based on Asm89\Stack\Cors by asm89
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        // Check if we should handle it
        if (!$this->shouldRun($request)) {
            return $next($request);
        }

        // Handle the request
        $response = $next($request);

        // Check the response type
        $is_html = stristr($response->headers->get('Content-Type'), 'html') !== false;

        if ($is_html) {
            $this->optimize($response);
        }

        return $response;
    }

    /**
     * Add the headers to the Response, if they don't exist yet.
     *
     * @return Response
     */
    protected function optimize(Response $response)
    {
        // Get the HTML
        $html = trim($response->getContent());

        // Process the HTML if it is not empty
        if (!empty($html)) {
            // Initialize an deferjs instance
            $defer = new Defer();

            try {
                // Optimize the response using defer library
                $optimized = $defer->fromHtml($html)->toHtml();

                // Only update the body if success
                if (!empty($optimized)) {
                    $response->setContent($optimized);
                }
            } catch (Exception $e) {
                unset($e);
            }
        }

        return $response;
    }

    /**
     * Determine if the request has a URI that should pass through the CORS flow.
     *
     * @return bool
     */
    protected function shouldRun(Request $request)
    {
        return !$request->expectsJson();
    }
}
