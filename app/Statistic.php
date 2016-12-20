<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{

    protected $fillable = ['sday', 'scount'];

    public static function increase ()
    {
        $today = (new \DateTime)->format('Y-m-d');

        $statistic = Statistic::firstOrNew(['sday' => $today]);

        $statistic->scount++;
        $statistic->save();
    }

    public static function statistics ()
    {
        return [
            Statistic::total(),
            Statistic::month(),
            Statistic::day()
        ];
    }

    public static function total ()
    {

        $count = Statistic::select(
                DB::raw('SUM(scount) as c')
            )->first();

        return $count;
    }

    public static function month ()
    {

        $count = Statistic::where(
                DB::raw('DATE_FORMAT(CURDATE(), "%Y-%m")'),
                DB::raw('DATE_FORMAT(sday, "%Y-%m")')
            )->select(
                DB::raw('SUM(scount) as c')
            )->first();

        return $count;
    }

    public static function day ()
    {

        $count = Statistic::where(
                DB::raw('DATE_FORMAT(sday, "%Y-%m-%d")'),
                DB::raw('CURDATE()')
            )->select(
                DB::raw('scount as c')
            )->first();

        return $count;
    }
}
