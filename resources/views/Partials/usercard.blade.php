<div class="card mt-4 flankr-profile-card">
    <div class="card-body text-center">

        <div class="flankr-profile-card-img">img</div>
{{--  --}}
        <!-- avatar
        <img src="{{ asset($profile->avatar) }}" alt="" />
        -->
        
        <h4 class="mt-2">
            {{$profile->name}}
        </h4>
        <p>
            Sucht {{$profile->lgender}}
        </p>
        <p>
            {{$profile->alter}} Jahre alt
        </p>
        <p>
            {{$profile->wohnort}}
        </p>
        <p>
            {{$profile->beschreibung}}
        </p>
        
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-light flankr-button like">Dislike</button>
            <button type="button" class="btn btn-light flankr-button like ml-2"  data-user-id="{{$profile->user_id}}">Like</button>
        </div>

    </div>
</div>