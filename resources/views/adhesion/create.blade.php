@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form class="my-4" method="post" action="{{ route('member.adhesion.store',$member->id) }}">
                    @csrf
                       <div class="form-group">
                           <label class="form-label" for="member_id">Membre :</label>
                                <select class="form-select" name="member_id" id="member_id">
                                      <option value="{{$member->id}}">{{$member->firstname}} {{$member->lastname}}</option>
                                </select>
                        </div>    
                        
                        <div class="form-group">
                           <label class="form-label" for="club_id">Club :</label>
                                <select class="form-select" name="club_id" id="club_id">
                                    @foreach($clubs as $club) 
                                        <option value="{{$club->id}}">{{$club->name}} </option>
                                    @endforeach
                                </select>
                        </div>    

                        <div class="form-group">
                           <label class="form-label" for="division_id">Division :</label>
                                <select class="form-select" name="division_id" id="division_id">
                                    @foreach($divisions as $division) 
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                        </div>    
                       
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Date début</label>
                                <input required type="date" name="start_at" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Observations</label>
                                <input type="text" name="observe" class="form-control">
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