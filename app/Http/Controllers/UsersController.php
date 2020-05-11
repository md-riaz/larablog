<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use function request;

class UsersController extends Controller {

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = User::withCount(['posts', 'comments'])->paginate(10);

        return view('users.all', compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse|Redirector
     */
    public function update(User $user)
    {
        if (Hash::check(request()->password, $user->password)) {
            $user->update(request()->validate([
                'name'  => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id]
            ]));

            $notification = [
                'message'    => 'Changes saved',
                'alert-type' => 'success'
            ];

            return redirect()->route('users.index')->with($notification);
        }
        $notification = [
            'message'    => 'Password does not match from database',
            'alert-type' => 'error'
        ];

        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        if (Auth::id() === 1) {
            $user->delete();
            $notification = [
                'message'    => 'Admin deleted user successfully',
                'alert-type' => 'success'
            ];
        } elseif (Auth::id() === $user->id) {
            $user->delete();
            $notification = [
                'message'    => 'Your account deleted successfully',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message'    => 'You cannot delete account that you don\'t own',
                'alert-type' => 'error'
            ];
        }


        return back()->with($notification);
    }

    public function passChange(User $user)
    {
        if (request()->current_password == request()->password) {
            $notification = [
                'message'    => 'New password can not be your old password',
                'alert-type' => 'error'
            ];
        }
        if (Hash::check(request()->current_password, $user->password)) {
            $user->update(request()->validate([
                'password' => 'required|confirmed|min:6'
            ]));
            $notification = [
                'message'    => 'Password Changed',
                'alert-type' => 'success'
            ];
        }

        return back()->with($notification);
    }
}
