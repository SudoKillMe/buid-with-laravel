<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{

    protected $fillable = ['date', 'count'];

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
        $year = (new \DateTime)->format('Y');

        $count = Statistic::select(
                DB::raw('SUM(scount) as c')
            )->first();

        return $count;
    }

    public static function month ()
    {
        $month = (new \DateTime)->format('Y-m');

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
        $today = (new \DateTime)->format('Y-m-d');

        $count = Statistic::where(
                DB::raw('DATE_FORMAT(sday, "%Y-%m-%d")'),
                DB::raw('CURDATE()')
            )->select(
                DB::raw('scount as c')
            )->first();

        return $count;
    }
}
