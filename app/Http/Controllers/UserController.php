<?php

namespace App\Http\Controllers;

use App\User;
use App\Projects;
use App\ProjectMembers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projectID = $request->input('id');
        $project = Projects::find($projectID);
        $projectMembers = ProjectMembers::where('project_id', $projectID)->get();
        $users = collect();
        foreach($projectMembers as $projectMember) {
            $userData = $projectMember->user()->first();
            $users->push([$userData->name,$userData->email,$userData->created_at,$userData->getId(),$userData->type, $projectMember->id]);
        }

        return view('users.index', ['users' => $users, 'project' => $project, 'current_project' => $projectID]);
    }

    public function admin(Request $request){
        if (Auth::user()->isAdmin())
        {
            $userID = $request->input('id');
            $user = User::find($userID);
            if ($user->type != 'admin') {
                $user->type = 'admin';
            } else {
                $user->type = 'default';
            }
            $user->save();
            return \App::make('redirect')->back();
        }   
    }

    public function deleteUserAdmin(Request $request){
        $projectMemberID = $request->id;
        ProjectMembers::find($projectMemberID)->delete();
        return redirect()->back()->with('status', 'Team member is deleted');
    }

    public function editUserAdmin(Request $request) {
        $user = User::find($request->input('id'));
        return view('users.edit_admin', ['user' => $user ]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        if ($user->id == 1) {
            return redirect()->route('user.index');
        }

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        return redirect()->back();
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
