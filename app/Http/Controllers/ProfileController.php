<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Profile $profile, User $user)
    {
       
       
        return view('profile.overview', compact('profile', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        return view('profile.create', compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Profile $profile, User $user)
    {
       
        $data = $request->validate([
             'alter' => 'required',
            // 'user_id' => 'required|exists:users,id',
             'beschreibung' => 'nullable',
             'wohnort' => 'nullable',
             'song' => 'nullable'
             
        ]);
       
       $data['erstellt'] = $profile->erstellt + '1';
       $data['user_id'] = Auth::user()->id;
       
       $data['name'] = Auth::user()->name;
       $data['ogender'] = Auth::user()->ogender;
       $data['lgender'] = Auth::user()->lgender;
       Profile::create($data);

        $request->session()->flash('message', 'Profil erstellt, jetzt gehts auf Beutefang!');
        return redirect(route('profile.index'));

    
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    public function delete(Profile $profile){

        return view('profile.delete', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Profile $profile)
    {
       $data = $this->validate(request(), [
        
        
         'beschreibung' => 'nullable',
         'wohnort' => 'nullable',
         'song' => 'nullable'

       ]); 

       $profile->update(request()->except('_token'));
       session()->flash('message', 'Profil erfolgreich bearbeitet');
       return redirect(route('profile.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        
        $profile->delete();
        
        session()->flash('message', 'Profil erfolgreich gelöscht');
        return redirect(route('profile.index'));  
    }
}
