<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ChangePassword as ChangePasswordRequest;

class Password extends Controller
{
    public function edit()
    {
        return view('profile.password.edit');
    }

    public function update(ChangePasswordRequest $request)
    {

    }
}
