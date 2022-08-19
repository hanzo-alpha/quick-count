<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
      $user = User::all();
        return view('pages.user.index',compact('user'));
    }

  /**
   * Show the form for creating a new resource.
   *
   * @return void
   */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Application|Factory|Response|View
   */
    public function show(int $id)
    {
        return view('pages.user.detail')->with('id',$id);
    }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Application|Factory|Response|View
   */
    public function edit(int $id)
    {
        return view('pages.user.edit')->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
