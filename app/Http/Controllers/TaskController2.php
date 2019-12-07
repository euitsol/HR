<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use App\Task;
use App\Userassign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController2 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function general()
    {
        // no need of any permission
        $us = Userassign::where('user_id', Auth::id())->get()->groupBy('project_id');
        $projects = [];
        $departments = null;
        $tasks = null;
        foreach ($us as $u) {
            $projects[] = Project::find($u[0]->project_id);
        }
        foreach ($projects as $i => $p) {
            if ($i == 0) {
                $departments = Department::where('project_id', $p->id)->get();
                foreach ($departments as $ii => $d) {
                    if ($ii == 0) {
                        $tasks = Task::where('project_id', $p->id)->where('department_id', $d->id)->get();
                    }
                }
            }
        }
        return view('taskNew.general.index', compact('projects', 'departments', 'tasks'));
    }


    public function ajaxDfromP()
    {
        if (request()->ajax()) {
            // no need of any permission
            $pid = $_GET['pid'];
            $departments = Department::where('project_id', $pid)->get();
            $html = '';
            foreach ($departments as $i => $d) {
                $html .= '
                        <div class="project-inner-area">
                            <a href="javascript:void(0)" class="list-group-item departments ' . ($i == 0 ? "active" : "") . '" did="' . $d->id . '">
                                <span class="fa fa-circle text-success"></span> ' . $d->title . '
                            </a>
                            <div class="pull-right">
                                <a href="#"><span class="fa fa-comments"></span></a>
                            </div>
                        </div>
                        ';
            }
            return $html;
        } else {
            abort(403);
        }
    }

    public function ajaxTfromP()
    {
        if (request()->ajax()) {
            // no need of any permission
            $isPid = $_GET['is_pid'];
            if (($isPid * 1) == 1) {
                $pid = $_GET['pid'];
                $did = Department::where('project_id', $pid)->first()->id;
            } else {
                $did = $_GET['did'];
                $pid = Department::find($did)->project_id;
            }
            $tasks = Task::where('project_id', $pid)->where('department_id', $did)->get();
            $html = '';
            if (count($tasks) > 0) {
                $html .= '<div class="col-md-4">
                    <h3>To-do List</h3>
                    <div class="tasks" id="tasks">';
                foreach ($tasks as $t) {
                    if (($t->progress * 1) == 0) {
                        $html .= '<div class="task-item task-info">
                                    <div class="task-text">
                                        <p>' . $t->title . '</p>
                                        ' . $t->remark . '
                                    </div>
                                    <div class="task-footer" tid="'.$t->id.'">
                                        <div class="pull-left"><span class="fa fa-clock-o"></span> ' . $t->deadline . '
                                        </div>
                                        <div class="pull-right"><a href="#"><span class="fa fa-comments"></span></a>
                                        </div>
                                    </div>
                                </div>';
                    }
                }
                $html .= ' </div>
                </div>
                <div class="col-md-4">
                    <h3>In Progress</h3>
                    <div class="tasks" id="tasks_progreess">';

                foreach ($tasks as $t) {
                    if ((($t->progress * 1) == 1) && (($t->submit * 1) == 0)) {
                        $html .= '<div class="task-item task-info">
                                    <div class="task-text">
                                        <p>' . $t->title . '</p>
                                        ' . $t->remark . '
                                    </div>
                                    <div class="task-footer" tid="'.$t->id.'">
                                        <div class="pull-left"><span class="fa fa-clock-o"></span> ' . $t->deadline . '
                                        </div>
                                        <div class="pull-right"><a href="#"><span class="fa fa-comments"></span></a>
                                        </div>
                                    </div>
                                </div>';
                    }
                }
                $html .= '<div class="task-drop push-down-10">
                            <span class="fa fa-cloud"></span>
                            Drag your task here to start it tracking time
                        </div>
                        </div>
                </div>
                <div class="col-md-4">
                    <h3>Completed</h3>
                    <div class="tasks" id="tasks_completed">';
                foreach ($tasks as $t) {
                    if (($t->submit * 1) == 1) {
                        $html .= ' <div class="task-item task-warning task-complete">
                                    <div class="task-text">
                                        <p>' . $t->title . '</p>
                                        ' . $t->remark . '
                                    </div>
                                    <div class="task-footer" tid="'.$t->id.'">
                                        <div class="pull-left"><span class="fa fa-clock-o"></span> ' . $t->updated_at . '
                                        </div>
                                    </div>
                                </div>';
                    }
                }
                $html .= ' <div class="task-drop">
                            <span class="fa fa-cloud"></span>
                            Drag your task here to finish it
                        </div></div></div>';
            }
            return $html;
        } else {
            abort(403);
        }

    }


    public function ajaxTSC()
    {
        if (request()->ajax()) {
            // no need of any permission
            $isCompleted = $_GET['is_completed'];
            $tid = $_GET['tid'];
            if (($isCompleted) == 0){
                // in progress
                $t = Task::find($tid);
                $t->progress = 1;
                $t->submit = 0;
                $t->submit_accept = 0;
                $t->update();
            }elseif (($isCompleted) == 1){
                // completed
                $t = Task::find($tid);
                $t->progress = 1;
                $t->submit = 1;
                $t->update();
            }
            return false;
        } else {
            abort(403);
        }
    }


}
