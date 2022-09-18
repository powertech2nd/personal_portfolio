<?php

namespace App\Http\Controllers;

use App\Mail\ContactPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:2000',
        ]);

        $mailDetail  = [
            'name' => $request->input('name'),
            'emailUser' => $request->input('email'),
            'title' => $request->input('subject'),
            'body' => $request->input('message'),
        ];
       
        Mail::to(env('MY_EMAIL'))->send(new ContactPage($mailDetail));


        Session::flash('global_success_alert_msg', 'Thank you for sending an email, I\'ll reply it ASAP.');
        Session::flash('global_success_alert_class', 'alert-success');
        return view('personalPortfolio.contact');
    }
}
