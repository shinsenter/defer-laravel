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
use Exception;
use Symfony\Component\HttpFoundation\Response;

class DeferMiddleware
{
    /**
     * Handle an incoming request
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return Response
     */
    public function handle($request, $next)
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
     * @param  mixed                                      $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function optimize($response)
    {
        // Get the HTML
        $html = trim($response->getContent());

        // Process the HTML if it is not empty
        if (!empty($html)) {
            try {
                // Initialize an deferjs instance
                $defer = app(Defer::class);

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
     * Determine if the request has a URI that should be optimized
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function shouldRun($request)
    {
        return $request->acceptsHtml();
    }
}
