<?php
use Illuminate\Support\Facades\Route;

public function boot(): void
{
    $this->routes(function () {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    });
}
