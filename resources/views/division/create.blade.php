@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="post" action="{{ route('division.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input required type="text" name="name" class="form-control" placeholder="nom du club">
                        <input type="hidden" name="created_by" class="form-control" value="{{Auth::user()->name}}" >

                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    
                </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection