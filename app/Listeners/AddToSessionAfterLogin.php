<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class AddToSessionAfterLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if (Auth::user()->hasRole('superadmin')){
            session(['divisi' => '']);
        }else  if (Auth::user()->hasRole('admin_yys')){
            session(['divisi' => 'Yayasan']);
        }else  if (Auth::user()->hasRole('admin_ra')){
            session(['divisi' => 'RA']);
        }else  if (Auth::user()->hasRole('admin_tka')){
            session(['divisi' => 'TKA']);
        }else  if (Auth::user()->hasRole('admin_mts')){
            session(['divisi' => 'MTs']);
        }else  if (Auth::user()->hasRole('admin_ma')){
            session(['divisi' => 'MA']);
        }else  if (Auth::user()->hasRole('admin_pst')){
            session(['divisi' => 'PonPes']);
        };
    }
}
