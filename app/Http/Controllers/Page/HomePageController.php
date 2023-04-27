<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomePageController extends Controller
{
    /**
     * Show the Home page.
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.home');
    }
}
