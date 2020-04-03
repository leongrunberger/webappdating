@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Deine Beute</h1>
            @if(count($profiles) > 1)
               
                @if(Auth::user()->lgender == 'M')
                    @foreach($profiles as $profile)
                        @if($profile->ogender =='M')
                            @if($profile->user_id != Auth::user()->id)
                            
                                @include('Partials.usercard')

                            @endif
                        @endif
                    @endforeach
                @endif
               
                @if(Auth::user()->lgender == 'F')
                    @foreach($profiles as $profile)
                        @if($profile->ogender =='F')
                            @if($profile->user_id != Auth::user()->id)
                            
                                @include('Partials.usercard')

                            @endif
                        @endif
                    @endforeach
                @endif
               
                @if(Auth::user()->lgender == 'D')
                    @foreach($profiles as $profile)
                        @if($profile->ogender =='D')
                            @if($profile->user_id != Auth::user()->id)
                            
                                @include('Partials.usercard')

                            @endif
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

<script>
    var urlLike = '{{ route('like') }}';
    
</script>