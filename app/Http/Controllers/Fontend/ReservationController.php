<?php

namespace App\Http\Controllers\Fontend;

use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservations.step-one', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'tel_number' => ['required'],
            'res_date' => ['required'],
            'guest_number' => ['required'],
        ]);

        if(empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        return redirect()->route('reservations.step.Two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('reservations.step-two', compact('reservation', 'tables'));
    }
}
