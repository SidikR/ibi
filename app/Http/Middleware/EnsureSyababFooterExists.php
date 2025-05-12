<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSyababFooterExists
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kecualikan path tertentu
        if ($request->is('login')) {
            return $next($request);
        }

        $response = $next($request);

        // Hanya validasi HTML response
        if (
            $response instanceof \Illuminate\Http\Response &&
            str_contains($response->headers->get('Content-Type'), 'text/html')
        ) {
            $content = $response->getContent();

            $requiredText = 'Syabab Technology';
            $requiredLink = 'https://syababtechnology.com';

            if (
                !str_contains($content, $requiredText) ||
                !str_contains($content, $requiredLink)
            ) {
                abort(500, 'Footer wajib mencantumkan link dan teks Syabab Technology!');
            }
        }

        return $response;
    }
}
