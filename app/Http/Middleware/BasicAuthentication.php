<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
 
class BasicAuthentication
{
    private const USER= 'user';
    private const PASS= 'kaynetest';
 
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('Authorization') === false) {
            // Display login prompt
            header('WWW-Authenticate: Basic realm="kayne test area"');
            exit;
        }
 
        $credentials = base64_decode(substr($request->header('Authorization'), 6));
        list($username, $password) = explode(':', $credentials);
 
        if ($username !== self::USER || $password !== self::PASS) {            
            throw new HttpException(Response::HTTP_UNAUTHORIZED);
        }
 
        return $next($request);
    }
}
