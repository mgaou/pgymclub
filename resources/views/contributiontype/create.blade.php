@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="post" action="{{ route('contributiontype.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3" >
                            <label class="form-label">Nom :</label>
                            <input required type="text" name="name" class="form-control" placeholder="type de cotisation" value="">
                        </div> 
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date début :</label>
                            <input required type="date" name="start_at" class="form-control" placeholder="" value="">
                        </div>                     
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date fin :</label>
                            <input required type="date" name="end_at" class="form-control" placeholder="" value="">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Taux :</label>
                            <input required type="text" name="taux" class="form-control" placeholder="montant minimal" value="">  
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Echéance :</label>
                            <input required type="number" name="echeance" class="form-control" placeholder="dernier mois" value="">
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
</div>
@endsection