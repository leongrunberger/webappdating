<div id="{{$profile->id}}">
    <div class="card mt-4 flankr-profile-card">
        <div class="card-body text-center">

            <img src="{{asset('uploads/profile/' . $profile->profile_image )}}" class="flankr-profile-card-avatar" style="width: 250px; height: 250px;">

            <div class="flankr-profile-card-text">
                <h3 class="mt-2">
                    {{$profile->name}}
                </h3>
                <ul>
                    <li>{{$profile->alter}} Jahre alt</li>
                    <li>{{$profile->wohnort}}</li>
                    <li>{{$profile->beschreibung}}</li>
                    <li>{{$profile->song}}</li>
                </ul>
            </div>
            
            <div class="d-flex justify-content-center mt-3">
                <button type="button" id="{{$profile->id}}" class="btn btn-light flankr-button dislike">Dislike</button>
                <button type="button" id="{{$profile->id}}" class="btn btn-light flankr-button like ml-2"  data-user-id="{{$profile->user_id}}">Like</button>
            </div>

         </div>
    </div>
</div>
