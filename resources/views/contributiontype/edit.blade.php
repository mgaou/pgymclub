@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="POST" action="{{ route('contributiontype.update',$contributionType->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input required type="text" name="name" class="form-control" placeholder="nom du club" value="{{$contributionType->name}}">
                     </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date début :</label>
                            <input type="date" name="start_at" class="form-control" placeholder="" value="{{$contributionType->start_at->format('Y-m-d')}}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date fin :</label>
                            <input type="date" name="end_at" class="form-control" placeholder="" value="{{$contributionType->end_at->format('Y-m-d')}}">
                        </div>

                        <div class="row">
                            <div class="col-md-6" mb-3>
                                <label class="form-label">Taux :</label>
                                <input type="text" name="taux" class="form-control" placeholder="montant minimal" value="{{$contributionType->taux}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Echéance :</label>
                                <input type="number" name="echeance" class="form-control" placeholder="dernier mois" value="{{$contributionType->echeance}}">
                            </div>
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