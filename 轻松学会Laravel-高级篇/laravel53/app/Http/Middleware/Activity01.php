<?php

namespace App\Http\Middleware;

use Closure;

class Activity01
{
    /*
    public function handle($request, Closure $next)
    {

        if (time() < strtotime('2016-09-26')) {
            return redirect('home');
        }

        return $next($request);
    }
    */

    public function handle($request, Closure $next)
    {

//        if (time() < strtotime('2016-09-26')) {
//            return redirect('home');
//        }

        $response = $next($request);

        dd($response);


        echo '我是后置操作，将在方法全部执行完毕后执行 - ';
    }
}