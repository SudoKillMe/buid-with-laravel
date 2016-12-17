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

        $statistic = Statistic::firstOrNew(['date' => $today]);

        $statistic->count++;
        $statistic->save();
    }

    public static function statistics ()
    {
        return [
            Statistic::year(),
            Statistic::month(),
            Statistic::day()
        ];
    }

    public static function year ()
    {
        $year = (new \DateTime)->format('Y');

        $count = Statistic::where(
                DB::raw('DATE_FORMAT(CURDATE(), "%Y")'),
                $year
            )->select(
                DB::raw('SUM(count) as c')
            )->first();

        return $count;
    }

    public static function month ()
    {
        $month = (new \DateTime)->format('Y-m');

        $count = Statistic::where(
                DB::raw('DATE_FORMAT(CURDATE(), "%Y-%m")'),
                $month
            )->select(
                DB::raw('SUM(count) as c')
            )->first();

        return $count;
    }

    public static function day ()
    {
        $today = (new \DateTime)->format('Y-m-d');

        $count = Statistic::where(
                DB::raw('DATE_FORMAT(CURDATE(), "%Y-%m-%d")'),
                $today
            )->select(
                DB::raw('SUM(count) as c')
            )->first();

        return $count;
    }
}
