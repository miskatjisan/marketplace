<?php

namespace App\Providers;

use App\Models\general_setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

       

        view()->composer('layouts.user', function ($view) {
            $job_reports = \DB::table('job_reports')->where('buyer_id', Auth::user()->id)->get();
            $buyer_reports = \DB::table('apply_member_reports')->where('applied_user_id', Auth::user()->id)->get();
            $freelancer_reports = \DB::table('freelancer_reports')->where('buyer_id', Auth::user()->id)->get();

           

            $view->job_reports = $job_reports;
            $view->buyer_reports = $buyer_reports;
            $view->freelancer_reports = $freelancer_reports;

        });


        Schema::defaultStringLength(191);
        $gnl = general_setting::first();
        view()->share('gnl', $gnl);
    }
}
