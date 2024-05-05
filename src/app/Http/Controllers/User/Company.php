<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use Illuminate\Http\Request;

final class Company extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $company = Companies::findOrFail($id);

        return view('user.company.show', compact('company'));
    }
}
