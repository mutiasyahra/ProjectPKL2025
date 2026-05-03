<?php

namespace App\Providers;

use App\VillageIdentity;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ambil logo dan identitas desa hanya jika tabel sudah ada (mencegah error saat build/migration)
        try {
            if (Schema::hasTable('village_identities')) {
                $villageIdentity = VillageIdentity::first();
                
                // Share ke semua view
                View::share('globalVillageIdentity', $villageIdentity);
                View::share('villageIdentity', $villageIdentity);

                View::composer('*', function ($view) use ($villageIdentity) {
                    $view->with('villageIdentity', $villageIdentity);
                });
            }
        } catch (\Exception $e) {
            // Abaikan error database saat build atau sebelum migrasi dijalankan
        }
        // make the asset() can run on both http or https
        // asset() generate http
        // secure_asset() generate https

        // if (env('APP_ENV') != 'local') {
        //     // take scheme as a parameter
        //     URL::forceScheme('https');
        // }
    }
}
