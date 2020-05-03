<?php

namespace App\Http\Controllers;

use App\Chair;
use App\Publications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ReportForYear(Request $request)
    {
        $selected_year = $request->input('select_year');
        $chairs = Chair::all();
        $collection = collect();
        if ($selected_year != null)
        {
            $years = explode(',', $selected_year);
            foreach ($chairs as $chair)
            {
                $counts = collect();
                foreach ($years as $year)
                {
                    $count = DB::table('publications')
                        ->where('chair_id', '=', $chair->id)
                        ->where('publications.year_of_publication', '=', $year)
                        ->count();
                    $counts->push($count);
                }
                $collection->put($chair->name_of_chair, $counts);
            }
        }
        else
        {
            $years = Publications::groupBy('year_of_publication')
                ->select("year_of_publication")
                ->get();

            foreach ($chairs as $chair)
            {
                $counts = collect();
                foreach ($years as $year)
                {
                    $count = DB::table('publications')
                        ->where('chair_id', '=', $chair->id)
                        ->where('publications.year_of_publication', '=', $year->year_of_publication)
                        ->count();
                    $counts->push($count);
                }
                $collection->put($chair->name_of_chair, $counts);
            }
        }
        return view('report')->with([
            'collection' => $collection,
            'select_year' => $selected_year,
            'chairs' => $chairs,
            'years' => $years,
        ]);
    }
}
