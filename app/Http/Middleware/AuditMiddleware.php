<?php

namespace App\Http\Middleware;

use App\Models\Actividad;
use App\Models\ActividadAuditoria;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!Auth::check()) {
            return $response;
        }

        $route = $request->route();
        if (!$route) {
            return $response;
        }

        $routeName = $route->getName();
        $method = $request->getMethod();

        if (!$this->shouldLog($routeName, $method)) {
            return $response;
        }

        $modulo = $this->resolveModulo($routeName, $route);
        $accion = $this->resolveAccion($routeName, $method);
        $actividadId = $this->resolveActividadId($request);

        ActividadAuditoria::create([
            'actividad_id' => $actividadId,
            'user_id' => Auth::id(),
            'accion' => $accion,
            'modulo' => $modulo,
            'detalle' => $this->buildDetalle($routeName, $method),
            'ruta' => $routeName ?? $request->path(),
            'metodo' => $method,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return $response;
    }

    private function shouldLog(?string $routeName, string $method): bool
    {
        if (!$routeName) {
            return false;
        }

        if (str_ends_with($routeName, '.index') || str_ends_with($routeName, '.show')) {
            return true;
        }

        return in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true);
    }

    private function resolveModulo(?string $routeName, $route): string
    {
        if ($routeName) {
            $prefix = explode('.', $routeName)[0] ?? 'sistema';
            return strtoupper(str_replace('-', '_', $prefix));
        }

        $uri = $route->uri();
        $first = explode('/', $uri)[0] ?? 'sistema';
        return strtoupper(str_replace('-', '_', $first));
    }

    private function resolveAccion(?string $routeName, string $method): string
    {
        if ($routeName) {
            $map = [
                '.index' => 'INDEX',
                '.show' => 'SHOW',
                '.store' => 'CREAR',
                '.update' => 'ACTUALIZAR',
                '.destroy' => 'ELIMINAR',
            ];
            foreach ($map as $suffix => $accion) {
                if (str_ends_with($routeName, $suffix)) {
                    return $accion;
                }
            }
        }

        return strtoupper($method);
    }

    private function resolveActividadId(Request $request): ?int
    {
        $actividad = $request->route('actividad');
        if ($actividad instanceof Actividad) {
            return $actividad->id;
        }

        if (is_numeric($actividad)) {
            return (int) $actividad;
        }

        return null;
    }

    private function buildDetalle(?string $routeName, string $method): string
    {
        $nombre = $routeName ?? 'sin_ruta';
        return 'Ruta: ' . $nombre . ' | Metodo: ' . $method;
    }
}
