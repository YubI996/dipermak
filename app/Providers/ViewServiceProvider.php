<?php

namespace App\Providers;

use App\Models\Partisipasi;
use App\Models\Kegiatan;
use App\Models\JenKeg;
use App\Models\Role;
use App\Models\Rt;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kota;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        // dokumentasi
        View::composer(['dokumentasis.fields'], function ($view) {
            $kegiatanItems = Kegiatan::pluck('id')->toArray();
            $view->with('kegiatanItems', $kegiatanItems);
        });
        View::composer(['dokumentasis.fields'], function ($view) {
            $kegiatanItems = Kegiatan::pluck('id')->toArray();
            $view->with('kegiatanItems', $kegiatanItems);
        });
        // partisipasi
        View::composer(['partisipasis.fields'], function ($view) {
            $kegiatanItems = Kegiatan::pluck('id')->toArray();
            $view->with('kegiatanItems', $kegiatanItems);
        });
        // kegiatan
        View::composer(['kegiatans.fields'], function ($view) {
            $partisipasiItems = Partisipasi::pluck('id')->toArray();
            $view->with('partisipasiItems', $partisipasiItems);
        });
        View::composer(['kegiatans.fields'], function ($view) {
            $jen_kegItems = JenKeg::pluck('jenis_keg','id')->toArray();
            $view->with('jen_kegItems', $jen_kegItems);
        });
        View::composer(['kegiatans.fields'], function ($view) {
            $kelurahanItems = Kelurahan::pluck('nama_kel','id')->toArray();
            $view->with('kelurahanItems', $kelurahanItems);
        });
        View::composer(['kegiatans.fields'], function ($view) {
            $kecamatanItems = Kecamatan::pluck('nama_kec','id')->toArray();
            $view->with('kecamatanItems', $kecamatanItems);
        });
        View::composer(['kegiatans.fields'], function ($view) {
            $rtItems = Rt::pluck('nama_rt','id')->toArray();
            $view->with('rtItems', $rtItems);
        });
        // jen keg
        View::composer(['jen_kegs.fields'], function ($view) {
            $jenKegItems = JenKeg::pluck('jenis_keg')->toArray();
            $view->with('jenKegItems', $jenKegItems);
        });
        // RT
        View::composer(['rts.fields'], function ($view) {
            $kelurahanItems = Kelurahan::pluck('nama_kel')->toArray();
            $view->with('kelurahanItems', $kelurahanItems);
        });
        View::composer(['rts.fields'], function ($view) {
            $rtItems = Rt::pluck('nama_rt')->toArray();
            $view->with('rtItems', $rtItems);
        });
        // kelurahan
        View::composer(['kelurahans.fields'], function ($view) {
            $kecamatanItems = Kecamatan::pluck('id')->toArray();
            $view->with('kecamatanItems', $kecamatanItems);
        });
        View::composer(['kelurahans.fields'], function ($view) {
            $kecamatanItems = Kecamatan::pluck('id')->toArray();
            $view->with('kecamatanItems', $kecamatanItems);
        });
        View::composer(['kelurahans.fields'], function ($view) {
            $kecamatanItems = Kecamatan::pluck('id')->toArray();
            $view->with('kecamatanItems', $kecamatanItems);
        });
        View::composer(['kelurahans.fields'], function ($view) {
            $kelurahanItems = Kelurahan::pluck('nama_kel')->toArray();
            $view->with('kelurahanItems', $kelurahanItems);
        });
        // kecamatan
        View::composer(['kecamatans.fields'], function ($view) {
            $kotaItems = Kota::pluck('id')->toArray();
            $view->with('kotaItems', $kotaItems);
        });
        View::composer(['kecamatans.fields'], function ($view) {
            $kotaItems = Kota::pluck('nama_kota')->toArray();
            $view->with('kotaItems', $kotaItems);
        });
        View::composer(['kecamatans.fields'], function ($view) {
            $kecamatanItems = Kecamatan::pluck('nama_kec')->toArray();
            $view->with('kecamatanItems', $kecamatanItems);
        });
        // roles
        View::composer(['roles.fields'], function ($view) {
            $roleItems = Role::pluck('nama_role')->toArray();
            $view->with('roleItems', $roleItems);
        });
        View::composer(['roles.fields'], function ($view) {
            $roleItems = Role::pluck('nama_role')->toArray();
            $view->with('roleItems', $roleItems);
        });
        // kota
        View::composer(['kotas.fields'], function ($view) {
            $KotaItems = Kota::pluck('nama_kota')->toArray();
            $view->with('KotaItems', $KotaItems);
        });
        // not used ???
        View::composer(['kegiatan_rts.fields'], function ($view) {
            $rtItems = Rt::pluck('nama_rt')->toArray();
            $view->with('rtItems', $rtItems);
        });
        View::composer(['kegiatan_rts.fields'], function ($view) {
            $rtItems = Rt::pluck('nama_rt')->toArray();
            $view->with('rtItems', $rtItems);
        });
        //
    }
}