<?php

namespace App\Controllers;

class aboutController extends BaseController
{
    public function about(): string
    {
        return view('aboutView');
    }
}
