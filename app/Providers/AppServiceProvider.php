<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::registerNavigationGroups([
            'Biodata',
            'Akademik',
            'Keuangan Akademik',
            'Keuangan Sekolah',
            'Manajemen Sekolah',
            'Manajemen Asrama',
            'Kegiatan Sekolah',
            'Jurnalistik',
            'Laporan',
            'Data Referensi Akademik',
            'Data Referensi Sekolah',
            
        ]);
    }
}
