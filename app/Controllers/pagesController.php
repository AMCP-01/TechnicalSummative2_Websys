<?php

namespace App\Controllers;

class pagesController extends BaseController
{
    public function pages(): string
    {
        return view('pagesView');
    }
    
}
