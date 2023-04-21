<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private int $academic_year;
    private mixed $start_academic_season;
    private mixed $end_academic_season;
    private array $global;
    private array $popular_subject;
    private array $chart_students;
    private array $chart_requests;
    private array $chart_gender;


    public function __construct()
    {
        $this->setAcademicYear();
        $this->setGlobal();
        $this->setPopularSubject();
        $this->setChartStudents();
        $this->setChartRequests();
        $this->setChartGender();
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


    // getter and setter of variable academic year
    public function getPopularSubject(): array
    {
        return $this->popular_subject;
    }

    public function setPopularSubject(): void
    {
        $this->popular_subject = Subject::all()->toArray();
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
            'attendance_hour' => Attendance::whereBetween('created_at', [$start_academic_season, $end_academic_season])->get()->pluck('duration')->sum(),
        );

        $this->global = $array;
    }


    // getter and setter of variable chart students
    public function getChartStudents(): array
    {
        return $this->chart_students;
    }

    public function setChartStudents(): void
    {
        $academic_year = $this->getAcademicYear();

        $by_two_start_end = $this->subYearAcademicSeason(2);
        $by_two_students = User::whereHas('role', function ($query) {
            $query->where('name', 'Student');
        })->whereBetween('created_at', [$by_two_start_end[0], $by_two_start_end[1]])->get()->count();

        $by_one_start_end = $this->subYearAcademicSeason(1);
        $by_one_students = User::whereHas('role', function ($query) {
            $query->where('name', 'Student');
        })->whereBetween('created_at', [$by_one_start_end[0], $by_one_start_end[1]])->get()->count();

        $actual_start_end = $this->subYearAcademicSeason();
        $actual_students = User::whereHas('role', function ($query) {
            $query->where('name', 'Student');
        })->whereBetween('created_at', [$actual_start_end[0], $actual_start_end[1]])->get()->count();

        $array = array(
            'labels' => [$this->formatAcademicYear($academic_year, 2), $this->formatAcademicYear($academic_year, 1), $this->formatAcademicYear($academic_year)],
            'data' => [$by_two_students, $by_one_students, $actual_students],
            'state' => $by_one_students == 0 ? 100 : ($actual_students - $by_one_students) / $by_one_students * 100,
        );

        $this->chart_students = $array;
    }


    // getter and setter of variable chart students
    public function getChartRequests(): array
    {
        return $this->chart_requests;
    }

    public function setChartRequests(): void
    {
        $start_academic_season = $this->getStartAcademicSeason();
        $end_academic_season = $this->getEndAcademicSeason();

        $requests = \App\Models\Request::whereBetween('created_at', [$start_academic_season, $end_academic_season])
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();

        $chart_data = $this->formatMonthRequests($requests);

        $by_one_start_end = $this->subYearAcademicSeason(1);
        $by_one_requests = \App\Models\Request::whereBetween('created_at', [$by_one_start_end[0], $by_one_start_end[1]])->get()->count();

        $actual_start_end = $this->subYearAcademicSeason();
        $actual_requests = \App\Models\Request::whereBetween('created_at', [$actual_start_end[0], $actual_start_end[1]])->get()->count();

        $array = array(
            'labels' => json_encode($chart_data[0]),
            'data' => json_encode($chart_data[1]),
            'all' => $actual_requests,
            'state' => $by_one_requests == 0 ? 100 : ($actual_requests - $by_one_requests) / $by_one_requests * 100,
        );

        $this->chart_requests = $array;
    }


    // getter and setter of variable chart gender
    public function getChartGender(): array
    {
        return $this->chart_gender;
    }

    public function setChartGender(): void
    {
        $start_academic_season = $this->getStartAcademicSeason();
        $end_academic_season = $this->getEndAcademicSeason();

        $students = User::whereHas('role', function ($query) {
            $query->where('name', 'Student');
        })->whereBetween('created_at', [$start_academic_season, $end_academic_season])
            ->selectRaw('gender, COUNT(*) as total')
            ->groupBy('gender')->get();

        $array = array(
            'labels' => json_encode($students->pluck('gender')->toArray()),
            'data' => json_encode($students->pluck('total')->toArray()),
        );

        $this->chart_gender = $array;
    }


    // render dashboard view
    public function index()
    {
//        $academic_season = $this->getEndAcademicSeason();
//        $academic_year = $this->getAcademicYear();
//        dd($academic_season);
        $global = $this->getGlobal();
        $chartStudents = $this->getChartStudents();
        $chartRequests = $this->getChartRequests();
        $chartGender = $this->getChartGender();
//        dd($chartStudents);
        return view('dashboard', compact('global', 'chartStudents', 'chartRequests', 'chartGender'));
    }


    private function formatMonthRequests($collection): array
    {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $array = $collection->toArray();
        $months_ids = $collection->pluck('month')->toArray();
        for ($x = 1; $x <= 12; $x++) {
            if(!in_array($x, $months_ids)){
                $array[] = array(
                    'month' => $x,
                    'total' => 0,
                );
            }
        }

        asort($array);

        $requests_by_month = collect($array)->pluck('total')->toArray();

        return [$months, $requests_by_month];
    }

    private function subYearAcademicSeason(int $sub_year = 0): array
    {
        $year = $this->getAcademicYear() - $sub_year;
        $start_academic_season = $this->getStartAcademicSeason();
        $end_academic_season = $this->getEndAcademicSeason();

        return [$start_academic_season->setYear($year), $end_academic_season->setYear($year + 1)];
    }

    private function formatAcademicYear(int $year, int $number = 0): string
    {
        $year -= $number;
        return $year . ' / ' . $year + 1;
    }

}
