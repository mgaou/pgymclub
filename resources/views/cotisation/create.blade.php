@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form class="my-4" method="post" action="{{ route('cotisation.store') }}">
                    @csrf
                       <div class="form-group">
                           <label class="form-label" for="member_id">Membre :</label>
                                <select class="form-select" name="member_id" id="member_id">
                                    @foreach($members as $member) 
                                        <option value="{{$member->id}}">{{$member->fullname}}</option>
                                    @endforeach
                                </select>
                        </div>    
                        
                        <div class="form-group">
                           <label class="form-label" for="contribution_type_id">Type cotisation :</label>
                                <select class="form-select" name="contribution_type_id" id="contribution_type_id">
                                    @foreach($contribution_types as $contribution_type) 
                                        <option value="{{$contribution_type->id}}">{{$contribution_type->name}} </option>
                                    @endforeach
                                </select>
                        </div>    

                                   
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Mois</label>
                                <input required type="text" name="mounth" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Date paiement</label>
                                <input required type="date" name="paid_at" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Montant</label>
                                <input required type="number" name="value" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Montant restant</label>
                                <input  type="number" name="value_rest" class="form-control">
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