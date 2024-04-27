<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

final class Top extends Controller
{
    public function test()
    {
        if (Auth::guard('companies')->check()) {
            return view('company.welcome');
        } else {
            return view('user.welcome');
        }
    }
}
