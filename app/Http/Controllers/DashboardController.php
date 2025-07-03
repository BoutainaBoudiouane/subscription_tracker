<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
         $userId = Auth::id();

        $entertainments = auth()->user()->subscriptions()->where('category','entertainment')->get();
        $utilities = auth()->user()->subscriptions()->where('category','utilities')->get();
        $softwares = auth()->user()->subscriptions()->where('category','software')->get();
        $others = auth()->user()->subscriptions()->where('category','other')->get();

 // Get monthly payments for the current year
        $monthlyPayments = Subscription::where('user_id', $userId)
            ->whereYear('payment_date', Carbon::now()->year)
            ->selectRaw('MONTH(payment_date) as month, SUM(payment) as total_payment')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Create array for all 12 months with default 0 values
        $monthlyData = [];
        $monthLabels = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[$i] = 0;
        }
        
        // Fill with actual data
        foreach ($monthlyPayments as $payment) {
            $monthlyData[$payment->month] = $payment->total_payment;
        }

        // Get subscription type distribution
        $subscriptionTypes = Subscription::where('user_id', $userId)
            ->selectRaw('type, COUNT(*) as count')
            ->groupBy('type')
            ->get();

        // Prepare data for charts
        $chartData = [
            'monthlyLabels' => $monthLabels,
            'monthlyData' => array_values($monthlyData),
            'pieLabels' => $subscriptionTypes->pluck('type')->map(function($type) {
                return ucfirst($type);
            })->toArray(),
            'pieData' => $subscriptionTypes->pluck('count')->toArray()
        ];




        return view('dashboard', compact(['entertainments','utilities','softwares','others','chartData']));
    }


}