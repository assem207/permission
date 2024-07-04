<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        
return $next($request);
    }
}
/*if(Auth::check())
        {
            switch (auth()->user()->role) {
                case 1:
                    return redirect()->route('admin');
                    break;
                    case 2:
                        return $next($request);
                       
                        break;
                        case 3:
                            return redirect()->route('dashborad');
                            break;
                default:
                return redirect()->route('login');
                    break;
            }
        }*/