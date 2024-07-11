@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">                    
                <form method="POST" action="{{ route('club.update',$club->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                             <label class="form-label">Nom :</label>
                             <input required type="text" name="name" class="form-control" placeholder="nom du club" value="{{$club->name}}">
                        </div>
                        <div class="col-md-6 mb-3">                       
                             <label class="form-label">Leader :</label>
                             <input type="text" name="leader" class="form-control" placeholder="nom du créateur" value="{{$club->leader}}">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a type="button" class="btn btn-secondary" href="{{url()->previous() }}">Retour</a>
                        </div>
                    </div> 
                    
                </form>
                    
                </div>

            </div>
        </div>
    </div>
@endsection