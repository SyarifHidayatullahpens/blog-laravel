<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Http;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->cookie('token'),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
        ])->get(env('API_URL').'/user')->json();
        // dd($auth);
        $user = json_decode(json_encode($auth))->data;
        if ($user->level_id != 1) {
            return redirect()->to('/');
        }
        return $next($request);
    }
}
