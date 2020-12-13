<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Todo;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class HomeController extends Controller
{
    public const WEEKLY_WORKING_TIME = 45;

    public function index()
    {
        $todos = Todo::all();
        $developers = Developer::all();
        $developer_weeks = [];
        $week = [];
        foreach ($developers->pluck('slug') as $slug){
            $developer_weeks[$slug] = [];
            $week[$slug] = 1;
        }
        // 'dev1' => ['week1' => [toplam 45 ],'week2' => [toplam 45]],



        foreach ($todos as $todo){

            $todo_remain = $todo->hourlyWork();

            foreach ($developers as $key => $developer) {

                if ($todo_remain >= $developer->level){

                    if (isset($developers[$key+1]) && $week[$developer->slug] > $week[$developers[$key+1]->slug]) {
                        continue;
                    }

                    $count = (int) ($todo->hourlyWork() / $developer->level);
                    $todo_remain = $todo->hourlyWork() % $developer->level;

                    if (isset($developer_weeks[$developer->slug]['week'.$week[$developer->slug]]) && array_sum($developer_weeks[$developer->slug]['week'.$week[$developer->slug]]) + $count >= self::WEEKLY_WORKING_TIME){
                        $remain = array_sum($developer_weeks[$developer->slug]['week'.$week[$developer->slug]]) + $count - self::WEEKLY_WORKING_TIME;
                        $developer_weeks[$developer->slug]['week'.$week[$developer->slug]][$todo->id] = $count-$remain;
                        $todo_remain += $remain;
                        $week[$developer->slug]++;
                    }else{
                        $developer_weeks[$developer->slug]['week'.$week[$developer->slug]][$todo->id] = $count;
                    }

                }
            }

        }

        return view('welcome', compact('developer_weeks', 'developers', 'todos'));
    }
}
