<?php
// Copyright (c) 2018 zeruel11
//
// This software is released under the MIT License.
// https://opensource.org/licenses/MIT


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passports = \App\Passport::paginate(15);
        return view('index', compact('passports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $passport->filename = $name;
        }
        $passport = new \App\Passport;
        $passport->name = $request->get('name');
        $passport->email = $request->get('email');
        $passport->number = $request->get('number');
        $date = date_create($request->get('date'));
        $format = date_format($date, "Y-m-d");
        $passport->date = strtotime($format);
        $passport->office = $request->get('office');
        $passport->save();

        return \redirect('passports')->with('success', 'Information added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passport = \App\Passport::find($id);
        return view('edit', compact('passport', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $passport = \App\Passport::find($id);
        $passport->name=$request->get('name');
        $passport->email=$request->get('email');
        $passport->number=$request->get('number');
        $passport->office=$request->get('office');

        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $passport->filename = $name;
        }
        $date = date_create($request->get('date'));
        $format = date_format($date, "Y-m-d");
        $passport->date = strtotime($format);

        $passport->save();

        return redirect('passports')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $passport = \App\Passport::find($id);
        $passport->delete();
        return redirect('passports')->with('success', 'Information has been deleted');
    }
}
