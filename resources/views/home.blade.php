@extends('layouts.app')

@section('content')
    <div class="container">    
            <div class="row justify-content-center">
                      <div class="">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{ __('Bienvenue M./Mme') }}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="container">
            <div class="justify-content-center" style="display:flex;align-items: end">
                <div class="p-3">
                    <div class="card">
                        <div class="card-header">Membres actifs</div>
                        <div class="card-body"> Bienvenue sur le site de gymclub adjagbo</div>
                    </div>
                </div> 
                
                <div class="p-3">
                    <div class="">
                        <div class="card">
                            <div class="card-header">Membres inactifs</div>
                            <div class="card-body"> Bienvenue sur le site de gymclub adjagbo</div>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="card">
                        <div class="card-header">Cotisations mensuelles</div>
                        <div class="card-body"> Bienvenue sur le site de gymclub adjagbo</div>
                    </div>
                </div>
                <div class="p-3">
                    <div class="card">
                        <div class="card-header">Point de la fête</div>
                        <div class="card-body"> Bienvenue sur le site de gymclub adjagbo</div>
                    </div>
                </div>
            </div> 
        </div>   
</div>
@endsection
