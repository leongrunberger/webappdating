<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



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
            'alter' =>'required',
            'beschreibung' => 'nullable',
            'wohnort' => 'nullable',
            'song' => 'nullable',
            'profile_image' =>  'required|image|mimes:jpeg,jpg,gif|max:2048'
        ]);
        
        if($request->has('profile_image')){
            
            //Bekomme das File
            $image = $request->file('profile_image');
           
            // Hole Dateiname mit Endung
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();

            // Hole nur Dateiname
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Hole nur Endung
            $extension = $request->file('profile_image')->getClientOriginalExtension();

            // Dateiname zum Speichern
            $filenameToStore=$filename.'_'.time().'.'.$extension;

            // Datei hochladen
            $image->move('uploads/profile' , $filenameToStore);

        } 
       
        $profile = new Profile;
        
        $profile->alter = $request->input('alter');
        $profile->song = $request->input('song');
        $profile->wohnort = $request->input('wohnort');
        $profile->beschreibung = $request->input('beschreibung');
        $profile->profile_image = $filenameToStore;
        $profile->user_id = Auth::user()->id;
        $profile->ogender = Auth::user()->ogender;
        $profile->lgender = Auth::user()->lgender;
        $profile->name = Auth::user()->name;
        $profile->save();

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
    public function update(Request $request, $id)
    {
      $profile = Profile::find($id);

      $profile->alter = $request->input('alter');
      $profile->beschreibung = $request->input('beschreibung');
      $profile->wohnort = $request->input('wohnort');
      $profile->song = $request->input('song');

      if($request->hasfile('profile_image')){

        $image = $request->file('profile_image');

        $filenameWithExt = $request->file('profile_image')->getClientOriginalName();

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        $extension = $request->file('profile_image')->getClientOriginalExtension();

            // Dateiname zum Speichern
        $filenameToStore=$filename.'_'.time().'.'.$extension;

        $image->move('uploads/profile' , $filenameToStore);

        $profile->profile_image = $filenameToStore;
      }

      $profile->save();


       
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

    public function updateProfile(Request $request)
    {
        // Form validation
        $request->validate([
            'name'              =>  'required',
            'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current user
        $user = User::findOrFail(auth()->user()->id);
        // Set user name
        $user->name = $request->input('name');

        // Check if a profile image has been uploaded
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = $filePath;
        }
        // Persist user record to database
        $user->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }
}
