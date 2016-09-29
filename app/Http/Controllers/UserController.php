<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserRequest;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show users list
    }

    /**
     * Display authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function account()
    {
        return self::show(Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public static function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param updateUserRequest $request
     * @return \Illuminate\View\View
     */
    public function update($id, updateUserRequest $request)
    {
        $user = User::find($id);
        $user->fill($request->all());


        if ($user->save()) {
            $response = array(
                'response' => 'success',
                'message'  => array(
                    'type' => 'success',
                    'text' => 'Your profile have been updated',
                ),
            );
        } else {
            $response = array(
                'response' => 'fail',
                'message'  => array(
                    'type' => 'danger',
                    'text' => 'Something went wrong while updating user',
                ),
            );
        }

        if ($request->expectsJson()) {
            return response()->json($response, 200);
        }

        Session::flash('messages', $response['message']);

        return self::show($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
