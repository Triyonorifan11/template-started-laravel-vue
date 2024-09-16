<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;

use Illuminate\Routing\Middleware\ThrottleRequests;

class Throttle extends ThrottleRequests{
protected function buildException($request, $key, $maxAttempts, $responseCallback = null)
    {
        $retryAfter = $this->getTimeUntilNextRetry($key);

        $headers = $this->getHeaders(
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );
        return is_callable($responseCallback)
        ? new HttpResponseException($responseCallback($request, $headers))
        : new ThrottleRequestsException("Silahkan coba lagi dalam $retryAfter detik", null, $headers);

    }

}
