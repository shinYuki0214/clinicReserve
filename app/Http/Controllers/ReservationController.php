<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Mail\FormMail;
use App\Models\Reservation;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Config;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nopage()
    {
        return view('reservation.nopage');
    }

    public function index($id)
    {
        //
        $checkUser = User::find($id);
        if (!$checkUser) {
            return to_route('reservation.nopage');
        }
        $config = User::find($id)->config;
        if (!$config) {
            return to_route('reservation.nopage');
        }
        $clinicName = User::find($id)->name;
        $startTimeData = $config->start_time;
        $endTimeData = $config->end_time;
        $today = Carbon::today();
        $todayRepeatTime = date('G', strtotime($endTimeData)) - date('G', strtotime($startTimeData));
        $startTime = date('G', strtotime($startTimeData));
        $endTime = date('G', strtotime($endTimeData));

        $reserved = false;
        // 診療曜日
        $weekPossible = [
            $config->sunday,
            $config->monday,
            $config->tuesday,
            $config->wednesday,
            $config->thursday,
            $config->friday,
            $config->saturday,
        ];

        // 予約データ一覧
        $reservations = User::find($id)->reserve;

        return view('reservation.index', compact('reserved', 'clinicName', 'id', 'weekPossible', 'reservations', 'today', 'config', 'startTime', 'endTime', 'todayRepeatTime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        //
        $clinicName = User::find($id)->name;
        $id = $id;
        $date = $request->query('date');
        $time = $request->query('time');
        $_dateData = $date . $time . ':00';
        $dateData = date('Y/m/d G:i', strtotime($_dateData));

        return view('reservation.create', compact('clinicName', 'id', 'dateData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request, $id)
    {
        // 送信先メールアドレス
        $email_admin = 'sin2021@outlook.jp';
        $email_user  = $request->email;

        Mail::to($email_admin)->send( new FormMail($request));
        Mail::to($email_user)->send( new FormMail($request));

        $date = new DateTime($request->date);
        Reservation::create([
            'user_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'date' => $date,
        ]);

        return to_route('reservation.thanks', ['id' => $id]);
    }

    public function thanks($id)
    {
        $clinicName = User::find($id)->name;
        return view('reservation.thanks', compact('id', 'clinicName'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
