@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="post" action="{{ route('member.presence.store',$member->id) }}">
                    @csrf
                    
                    <div class="form-group mb-3">
                                <label class="form-label" for="member_id">Membre :</label>
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="{{$member->id}}">{{$member->fullname}}</option>
                                </select>
                    </div> 
                   
                    <div class="mb-3">
                        <label class="form-label">Date :</label>
                        <input required type="date" name="pdate" class="form-control" placeholder="">
                        <input type="text" name="pobserve" class="form-control" placeholder="observations">
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Valider</button>
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