<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('Admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('Admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrfail($request->table_id);

        if($request->guest_number > $table->gust_number) {
            return back()->with('warning', 'Please choose the table base on guests');
        }

        $request_date = Carbon::parse($request->res_date);

        foreach ($table->reservations as $res) {
            if($res->res_date == $request_date) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        Reservation::create($request->validated());

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('Admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrfail($request->table_id);

        if($request->guest_number > $table->gust_number) {
            return back()->with('warning', 'Please choose the table base on guests');
        }

        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res) {
            if($res->res_date == $request_date) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        $reservation->update($request->validated());

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('danger', 'Reservation deleted successfully.');
    }
}
