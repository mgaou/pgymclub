@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="POST" action="{{ route('member.presence.update',[$presence->member_id,$presence->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                           <label class="form-label" for="member_id">Membre :</label>
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="{{$presence->member->id}}">{{$presence->member->fullname}}</option>
                                </select>
                    </div> 
                    <div class="row">
                        <div class=" col-md-4 mb-3">
                            <label class="form-label">Date :</label>
                            <input required type="date" name="pdate" class="form-control" placeholder=""  value="{{$presence->pdate->format('Y-m-d')}}">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Observations :</label>
                            <input textarea name="pobserve" class="form-control" placeholder="observations" value="{{$presence->pobserve}}">
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