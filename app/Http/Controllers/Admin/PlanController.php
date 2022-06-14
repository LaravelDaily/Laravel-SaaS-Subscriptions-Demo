<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LucasDotVin\Soulbscription\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        return view('admin.plans.index', [
            'currentSubscription' => auth()->user()->subscription
        ]);
    }

    public function update(Request $request, Plan $plan)
    {
        auth()->user()->subscribeTo($plan);

        return redirect()->route('admin.plan.index');
    }

    public function destroy(Plan $plan)
    {
        auth()->user()->subscription->cancel();

        return redirect()->route('admin.plan.index');
    }
}
