@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form class="my-4" method="post" action="{{ route('member.cotisation.update',[$cotisation->member->id,$cotisation->id]) }}">
                    @csrf
                    @method('PUT')
                       <div class="form-group mb-3">
                           <label class="form-label" for="member_id">Membre :</label>
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="{{$cotisation->member->id}}"> {{$cotisation->member->fullname}} </option>
                                </select>
                        </div>    
                        
                        <div class="form-group mb-3">
                           <label class="form-label" for="contribution_type_id">Type cotisation :</label>
                                <select class="form-select" name="contribution_type_id" id="contribution_type_id">
                                    <option value="{{$cotisation->contribution_type->id}}">{{$cotisation->contribution_type->name}}</option>
                                </select>
                        </div>    

                                   
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Mois</label>
                                <input required type="text" name="mounth" class="form-control" value="{{$cotisation->mounth}}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Date paiement</label>
                                <input required type="date" name="paid_at" class="form-control" value="{{$cotisation->paid_at->format('Y-m-d')}}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Montant</label>
                                <input required type="number" name="value" class="form-control" value="{{$cotisation->value}}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Montant restant</label>
                                <input  type="number" name="value_rest" class="form-control" value="{{$cotisation->value_rest}}">
                            </div>
                            
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Observations</label>
                                <textarea name="observe" class="form-control" value="{{$cotisation->observe}}"></textarea>
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