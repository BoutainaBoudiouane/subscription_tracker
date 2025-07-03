<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index(): View
    {
        $entertainments = auth()->user()->subscriptions()->where('category','entertainment')->get();
        $utilities = auth()->user()->subscriptions()->where('category','utilities')->get();
        $softwares = auth()->user()->subscriptions()->where('category','software')->get();
        $others = auth()->user()->subscriptions()->where('category','other')->get();












        return view('dashboard', compact(['entertainments','utilities','softwares','others']));
    }


}