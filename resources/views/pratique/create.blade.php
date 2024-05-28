@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form class="my-4" method="post" action="{{ route('pratique.store') }}">
                    @csrf
                       <div class="form-group">
                           <label class="form-label" for="member_id">Membre :</label>
                                <select class="form-select" name="member_id" id="member_id">
                                    @foreach($members as $member) 
                                        <option value="{{$member->id}}">{{$member->firstname}} {{$member->lastname}}</option>
                                    @endforeach
                                </select>
                        </div>    
                        
                        <div class="form-group">
                           <label class="form-label" for="profession_id">Type cotisation :</label>
                                <select class="form-select" name="profession_id" id="contribution_type_id">
                                    @foreach($professions as $profession) 
                                        <option value="{{$profession->id}}">{{$profession->name}} </option>
                                    @endforeach
                                </select>
                        </div>    

                                   
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Date début</label>
                                <input required type="date" name="start_at" class="form-control">
                            </div>                            
                        </div>
                   

                    <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a type="button" class="btn btn-secondary" href="{{url()->previous() }}">Retour</a>
                            </div>
                    </div> 
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection