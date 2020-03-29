@extends('layouts.profil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mein Profil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  @if(Auth::user()->ogender=='F')
                    Du bist eine Frau
                  
                 @endif 
                 @if(Auth::user()->ogender=='D')
                 Du gehörst verbrannt
               
              @endif 
                  @if(Auth::user()->ogender=='M')
                  
                    Du bist ein Mann
                @endif

                @if(Auth::user()->lgender=='F')
                und stehst auf Frauen
              
             @endif  
              @if(Auth::user()->lgender=='M')
              
                und stehst auf Männer
            @endif

            @if(Auth::user()->lgender=='D')
                und stehst auf weirde Sachen, melde dich bitte ab!
              
             @endif
            
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

        Geburtsdatum: {{Auth::user()->date}}
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-secondary">Bearbeiten</button>
                          
       </div>
        <div class="card">
            <div class="card-header">Beschreibung</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif


                
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-secondary">Bearbeiten</button>
                          
       </div>
    </div>
    </div>
</div>
@endsection
