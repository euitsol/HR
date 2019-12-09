<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Commentt;
use App\Department;
use App\Dependency;
use App\Project;
use App\Reply;
use App\Task;
use App\User;
use App\Userassign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $departments = [];
        $tasks = null;
        $j = 0;
        foreach ($us as $u) {
            $projects[] = Project::find($u[0]->project_id);
            if ($j == 0) {
                // get only the departments where user has assigned jobs
                $uss = Userassign::where('user_id', Auth::id())->where('project_id', $u[0]->project_id)->get()->groupBy('department_id');
                $jj = 0;
                foreach ($uss as $uu) {
                    $departments[] = Department::find($uu[0]->department_id);
                    if ($jj == 0) {
                        $tasks = Task::where('project_id', $u[0]->project_id)->where('department_id', $uu[0]->department_id)->get();
                    }
                    $jj++;
                }
            }
            $j++;
        }
        if ($tasks != null) {
            foreach ($tasks as $t) {
                // add dependencies
//                $t['can_submit'] = 1;
                $dts = [];
                $ds = Dependency::where('task_id', $t->id)->get();
                if (count($ds) > 0) {
                    foreach ($ds as $d) {
                        $dts[] = Task::find($d->dependency);
                    }
                }
                $t['dependencies'] = $dts;
//                if (!empty($dts)){
//                    foreach ($dts as $d){
//                        if (($d->submit * 1) == 0){
//                            $t['can_submit'] = 0;
//                            break;
//                        }
//                    }
//                }
            }
        }
        return view('taskNew.general.index', compact('projects', 'departments', 'tasks'));
    }


    public function ajaxDfromP()
    {
        if (request()->ajax()) {
            // no need of any permission
            $pid = $_GET['pid'];
            $departments = [];
            $uss = Userassign::where('user_id', Auth::id())->where('project_id', $pid)->get()->groupBy('department_id');
            foreach ($uss as $uu) {
                $departments[] = Department::find($uu[0]->department_id);
            }
            $html = '';
            if (!empty($departments)) {
                foreach ($departments as $i => $d) {
                    $html .= '
                        <div class="project-inner-area">
                            <a href="javascript:void(0)" class="list-group-item departments ' . ($i == 0 ? "active" : "") . '" did="' . $d->id . '">
                                <span class="fa fa-circle text-success"></span> ' . $d->title . '
                            </a>
                            <div class="pull-right">
                                <a href="'.
                                route('department.comment', ['did' => $d->id])
                                .'" target="_blank" title="Department Comment"><span class="fa fa-comments"></span></a>
                            </div>
                        </div>
                        ';
                }
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
                // must get the userAssigned first department
                $uss = Userassign::where('user_id', Auth::id())->where('project_id', $pid)->get()->groupBy('department_id');
                $did = 0;
                $jj = 0;
                foreach ($uss as $uu) {
                    if ($jj == 0) {
                        $did = $uu[0]->department_id;
                    } else {
                        break;
                    }
                    $jj++;
                }
            } else {
                $did = $_GET['did'];
                $pid = Department::find($did)->project_id;
            }
            $tasks = Task::where('project_id', $pid)->where('department_id', $did)->get();
            $html = '';
            if (count($tasks) > 0) {
                foreach ($tasks as $t) {
                    // add dependencies
                    $dts = [];
                    $ds = Dependency::where('task_id', $t->id)->get();
                    if (count($ds) > 0) {
                        foreach ($ds as $d) {
                            $dts[] = Task::find($d->dependency);
                        }
                    }
                    $t['dependencies'] = $dts;
                }
                $html .= '<div class="col-md-4">
                    <h3>To-do List</h3>
                    <div class="tasks" id="tasks">';
                foreach ($tasks as $t) {
                    if (($t->progress * 1) == 0) {
                        $html .= '<div class="task-item task-info cursor2">
                                    <div class="task-text">
                                        <p>' . $t->title . '</p>
                                        ' . $t->remark . '';
                        if ($t->dependencies) {
                            $html .= '<br>';
                            foreach ($t->dependencies as $td) {
                                $html .= '<a href="#" target="_blank" title="Task Comment">' . $td->title . '</a>';

                            }
                        }
                        $html .= '</div>
                                    <div class="task-footer" tid="' . $t->id . '">
                                        <div class="pull-left"><span class="fa fa-clock-o"></span> ' . $t->deadline . '
                                        </div>
                                        <div class="pull-right"><a href="#" target="_blank" title="Task Comment"><span class="fa fa-comments"></span></a>
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
                        $html .= '<div class="task-item task-info cursor2">
                                    <div class="task-text">
                                        <p>' . $t->title . '</p>
                                        ' . $t->remark . '';
                        if ($t->dependencies) {
                            $html .= '<br>';
                            foreach ($t->dependencies as $td) {
                                $html .= '<a href="#" target="_blank" title="Task Comment">' . $td->title . '</a>';

                            }
                        }
                        $html .= '</div>
                                    <div class="task-footer" tid="' . $t->id . '">
                                        <div class="pull-left"><span class="fa fa-clock-o"></span> ' . $t->deadline . '
                                        </div>
                                        <div class="pull-right"><a href="#" target="_blank" title="Task Comment"><span class="fa fa-comments"></span></a>
                                        </div>
                                    </div>
                                </div>';
                    }
                }
                $html .= '<div class="task-drop push-down-10">
                            <span class="fa fa-cloud"></span>
                            Drag your task here to start working on it
                        </div>
                        </div>
                </div>
                <div class="col-md-4">
                    <h3>Completed</h3>
                    <div class="tasks" id="tasks_completed">';
                foreach ($tasks as $t) {
                    if ((($t->submit * 1) == 1) && (($t->submit_accept * 1) == 0)) {
                        $html .= ' <div class="task-item task-warning task-complete cursor2">
                                    <div class="task-text">
                                        <p>' . $t->title . '</p>
                                        ' . $t->remark . '';
                        if ($t->dependencies) {
                            $html .= '<br>';
                            foreach ($t->dependencies as $td) {
                                $html .= '<a href="#" target="_blank" title="Task Comment">' . $td->title . '</a>';

                            }
                        }
                        $html .= '</div>
                                    <div class="task-footer" tid="' . $t->id . '">
                                        <div class="pull-left"><span class="fa fa-clock-o"></span> ' . $t->updated_at . '
                                        </div>
                                        <div class="pull-right"><a href="#" target="_blank" title="Submit Report"><i class="glyphicon glyphicon-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>';
                    } elseif (($t->submit_accept * 1) == 1) {
                        $html .= '<div class="task-item task-primary task-complete  cursor">
                                    <div class="duplicate-task-text">
                                        <p>' . $t->title . '</p>
                                        ' . $t->remark . '';
                        if ($t->dependencies) {
                            $html .= '<br>';
                            foreach ($t->dependencies as $td) {
                                $html .= '<a href="#" target="_blank" title="Task Comment">' . $td->title . '</a>';

                            }
                        }
                        $html .= '</div>
                                    <div class="task-footer">
                                        <div class="pull-left">
                                            <span class="text-primary"><b>Accepted</b></span>
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
            if (($isCompleted) == 0) {
                // in progress
                $t = Task::find($tid);
                $t->progress = 1;
                $t->submit = 0;
                $t->submit_accept = 0;
                $t->update();
            } elseif (($isCompleted) == 1) {
                // completed
                $t = Task::find($tid);
                $t->progress = 1;
                $t->submit = 1;
                $t->update();
            }
            return json_encode(['success' => true]);
        } else {
            abort(403);
        }
    }


    public function departmentComment($did)
    {
        $department = Department::find($did);
        $project = Project::find($department->project_id);
        $comments = Comment::where('department_id', $did)->paginate(10);
        foreach ($comments as $c){
            $replies = Reply::where('comment_id', $c->id)->get();
            foreach ($replies as $r){
                $u = User::find($r->user_id);
                $r['user_image'] = $u->image;
                $r['user_name'] = $u->name;
            }
            $c['replies'] = Reply::where('comment_id', $c->id)->get();
            $u = User::find($c->user_id);
            $c['user_image'] = $u->image;
            $c['user_name'] = $u->name;
        }
        return view('taskNew.general.comment.index', compact('department', 'project', 'comments'));
    }



    public function departmentCommentStore(Request $request, $did)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);
        $department = Department::find($did);
        $pid = Project::find($department->project_id)->id;
        $c = new Comment;
        $c->user_id = Auth::id();
        $c->project_id = $pid;
        $c->department_id = $did;
        $c->comment = $request->comment;
        if ($request->hasFile('file')) {
            $f = $request->file;
            $f_name = time() . $f->getClientOriginalName();
            $a = $f->move('uploads/comments', $f_name);
            $d = 'uploads/comments/' . $f_name;
            $c->file = $d;
        }
        $c->save();
        Session::flash('success', "The Comment has been posted successfully.");
        return redirect()->back();
    }



    public function departmentCommentDelete($cid)
    {
        $c = Comment::find($cid);
        if ($c->file){
            unlink($c->file);
        }
        $c->delete();
        Session::flash('success', "The Comment has been deleted successfully.");
        return redirect()->back();
    }


    public function departmentCommentEdit($did, $cid)
    {
        $department = Department::find($did);
        $project = Project::find($department->project_id);
        $comments = Comment::where('department_id', $did)->paginate(10);
        foreach ($comments as $c){
            $replies = Reply::where('comment_id', $c->id)->get();
            foreach ($replies as $r){
                $u = User::find($r->user_id);
                $r['user_image'] = $u->image;
                $r['user_name'] = $u->name;
            }
            $c['replies'] = Reply::where('comment_id', $c->id)->get();
            $u = User::find($c->user_id);
            $c['user_image'] = $u->image;
            $c['user_name'] = $u->name;
        }
        $cedit = Comment::find($cid);
        return view('taskNew.general.comment.edit', compact('department', 'project', 'comments', 'cedit'));

    }


    public function departmentCommentUpdate(Request $request, $cid)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);
        $c = Comment::find($cid);
        $c->comment = $request->comment;
        if ($request->hasFile('file')) {
            if ($c->file){
                unlink($c->file);
            }
            $f = $request->file;
            $f_name = time() . $f->getClientOriginalName();
            $a = $f->move('uploads/comments', $f_name);
            $d = 'uploads/comments/' . $f_name;
            $c->file = $d;
        }
        $c->update();
        Session::flash('success', "The Comment has been updated successfully.");
        return redirect()->back();
    }

    public function departmentCommentDownload($cid)
    {
        $c = Comment::find($cid);
        $ext = pathinfo($c->file, PATHINFO_EXTENSION);
        $name = 'comment_file_department.'.$ext;
        return response()->download($c->file, $name);
    }






}
