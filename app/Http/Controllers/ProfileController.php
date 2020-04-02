<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
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
             'alter' => 'required',
            // 'user_id' => 'required|exists:users,id',
             'beschreibung' => 'nullable',
             'wohnort' => 'nullable',
             'song' => 'nullable',
             'profile_image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
       
       
       $data['user_id'] = Auth::user()->id;
       $data['name'] = Auth::user()->name;
       $data['ogender'] = Auth::user()->ogender;
       $data['lgender'] = Auth::user()->lgender;
       Profile::create($data);
      
       $profile = Profile::findOrFail($profile->id);
       

        // Check if a profile image has been uploaded
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');

            $extension = $image->getClientOriginalExtension();
            // Make a image name based on user name and current timestamp
            $filename = time() . '.' . $extension;

            $image->move('uploads/profile' , $filename);

            $profile->profile_image = $filename;
        }else{
            return $request;
            $profile->profile_image = '';
        }
        // Persist user record to database
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
    public function update(Profile $profile, Request $request)
    {
       $data = $this->validate(request(), [
        
         'alter' =>'required',
         'beschreibung' => 'nullable',
         'wohnort' => 'nullable',
         'song' => 'nullable',
         'profile_image' =>  'required|image|mimes:jpg|max:2048'

       ]); 

       $profile = Profile::findOrFail($profile->id);
       

        // Check if a profile image has been uploaded
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');

            $extension = $image->getClientOriginalExtension();
            // Make a image name based on user name and current timestamp
            $filename = Auth::user()->name . Auth::user()->id . '.' . $extension;

            $image->move('uploads/profile' , $filename);

            $profile->profile_image = $filename;
        }else{
            return $request;
            $profile->profile_image = '';
        }
        // Persist user record to database
        $profile->save();

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
