<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClinicConfig;
use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClinicController extends Controller
{
    //予約可能枠一覧
    public function index()
    {
        $config = Auth::user()->config;
        if(!$config){
            return to_route('clinic.create');
        }
        $startTimeData = $config->start_time;
        $endTimeData = $config->end_time;
        $today = Carbon::today();
        $todayRepeatTime = date('G', strtotime($endTimeData)) - date('G', strtotime($startTimeData));
        $startTime = date('G', strtotime($startTimeData));
        $endTime = date('G', strtotime($endTimeData));

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
        $reservations = Auth::user()->reserve;

        $reserved = false;
        
        return view('clinic.index', compact('reserved','weekPossible','today', 'config', 'startTime', 'endTime', 'todayRepeatTime','reservations'));
    }

    // 予約枠設定
    public function create()
    {
        return view('clinic.create');
    }

    // 予約枠保存
    public function store(StoreClinicConfig $request)
    {
        Config::create([
            'user_id' => Auth::id(),
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return to_route('clinic.index');
    }
    // 予約枠上書き
    public function update(StoreClinicConfig $request)
    {
        $config = Auth::user()->config;
        $config->update([
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return to_route('clinic.index');
    }

    // 設定確認画面
    public function confirm()
    {
        $config = Auth::user()->config;
        // 設定がなければ
        if (!$config) {
            return to_route('clinic.create');
        }


        return view('clinic.confirm', compact('config'));
    }


    //予約者一覧
    public function reservation()
    {
        $today = Carbon::today();
        // 予約データ一覧
        $reservations = Auth::user()->futureReserve;
        return view('clinic.reservation', compact('reservations'));
    }
}
