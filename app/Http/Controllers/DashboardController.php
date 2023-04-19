<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private int $academic_year;
    private mixed $start_academic_season;
    private mixed $end_academic_season;
    private array $global;


    public function __construct()
    {
        $this->setAcademicYear();
        $this->setGlobal();
    }


    // getter and setter of variable start academic year
    public function getStartAcademicSeason()
    {
        return $this->start_academic_season;
    }

    public function setStartAcademicSeason(int $academic_year): void
    {
        $this->start_academic_season = Carbon::now()->setYear($academic_year)->setMonth(9)->setDay(1);
    }


    // getter and setter of variable end academic year
    public function getEndAcademicSeason()
    {
        return $this->end_academic_season;
    }

    public function setEndAcademicSeason(int $academic_year): void
    {
        $this->end_academic_season = Carbon::now()->setYear($academic_year + 1)->setMonth(8)->setDay(31);
    }


    // getter and setter of variable academic year
    private function getAcademicYear(): int
    {
        return $this->academic_year;
    }

    private function setAcademicYear(): void
    {
        $now = Carbon::now()->toArray();
        $year = $now['year'];
        $month = $now['month'];
        $academic_year = $month >= 9 ? $year : $year - 1;
        $this->academic_year = $academic_year;

        $this->setStartAcademicSeason($academic_year);
        $this->setEndAcademicSeason($academic_year);
    }


    // getter and setter of variable global
    private function getGlobal(): array
    {
        return $this->global;
    }

    private function setGlobal(): void
    {
        $start_academic_season = $this->getStartAcademicSeason();
        $end_academic_season = $this->getEndAcademicSeason();

        $array = array(
            'students' => User::whereHas('role', function ($query) {
                $query->where('name', 'Student');
            })->whereBetween('created_at', [$start_academic_season, $end_academic_season])->get()->count(),
            'requests' => \App\Models\Request::whereBetween('created_at', [$start_academic_season, $end_academic_season])->get()->count(),
            'attendances' => Attendance::whereBetween('created_at', [$start_academic_season, $end_academic_season])->get()->count(),
            'classrooms' => Classroom::all()->count(),
        );

        $this->global = $array;
    }


    // render dashboard view
    public function index()
    {
//        $academic_season = $this->getEndAcademicSeason();
//        $academic_year = $this->getAcademicYear();
//        dd($academic_season);
        $global = $this->getGlobal();
//        dd($global);
        return view('dashboard');
    }

}
