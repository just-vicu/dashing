<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class LoanController extends BaseController
{
    /**
     * @return View|Factory
     */
    public function index(): View|Factory
    {
        return view('pages/loan');
    }

    /**
     * @return View|Factory
     */
    public function schedule(): View|Factory
    {
        return view('pages/schedule');
    }
}