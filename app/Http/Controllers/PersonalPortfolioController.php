<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPortfolioController extends Controller
{
    public function index()
    {
        return view('personalPortfolio.index');
    }

    public function projects(Request $request)
    {
        $active_tab = 'kag';
        if ($request->has('tab')) {
            $active_tab = $request->input('tab');
         }
        return view('personalPortfolio.projects', compact('active_tab'));
    }

    public function techStacks()
    {
        return view('personalPortfolio.techStacks');
    }

    public function contact()
    {
        return view('personalPortfolio.contact');
    }
}
