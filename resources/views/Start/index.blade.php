@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Deine Beute</h1>
            @if(count($profiles) > 1)
               
            @if(Auth::user()->ogender == 'F')
            @foreach($profiles as $profile)
            @if($profile->ogender =='M')

                    <div class="card mt-4 flankr-profile-card">
                        <div class="card-body text-center">

                            <div class="flankr-profile-card-img">img</div>

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
                                <button type="button" class="btn btn-light flankr-button">Dislike</button>
                                <button type="button" class="btn btn-light flankr-button ml-2">Like</button>
                            </div>

                        </div>
                    </div>
                    @endif
                @endforeach
                    @endif

                    @if(Auth::user()->ogender == 'M')
            @foreach($profiles as $profile)
            @if($profile->ogender =='F')

                    <div class="card mt-4 flankr-profile-card">
                        <div class="card-body text-center">

                            <div class="flankr-profile-card-img">img</div>

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
                                <button type="button" class="btn btn-light flankr-button">Dislike</button>
                                <button type="button" class="btn btn-light flankr-button ml-2">Like</button>
                            </div>

                        </div>
                    </div>
                    @endif
                @endforeach
                    @endif

                    @if(Auth::user()->ogender == 'D')
                    @foreach($profiles as $profile)
                    @if($profile->ogender =='D')
        
                            <div class="card mt-4 flankr-profile-card">
                                <div class="card-body text-center">
        
                                    <div class="flankr-profile-card-img">img</div>
        
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
                                        <button type="button" class="btn btn-light flankr-button">Dislike</button>
                                        <button type="button" class="btn btn-light flankr-button ml-2">Like</button>
                                    </div>
        
                                </div>
                            </div>
                            @endif
                        @endforeach
                            @endif
                @else
                    <p>Keine Beute verfügbar.</p>
                @endif

        </div>
    </div>
</div>



@endsection
