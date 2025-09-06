<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
	/**
	 * Handle an incoming request with environment-aware security headers.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		$response = $next($request);

		// Set additional security headers not handled by Apache
		$response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

		// Add additional headers for production environment only
		if (!App::environment(['local', 'development', 'testing'])) {
			$response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
		}

		return $response;
	}
}
