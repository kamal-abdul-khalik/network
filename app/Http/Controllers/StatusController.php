<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {

        $request->make();
        // Auth::user()->makeStatus($request->body); //dipindahkan ke StatusRequest
        return redirect()->back();
    }
}
