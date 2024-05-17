@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="post" action="{{ route('club.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input required type="text" name="name" class="form-control" placeholder="nom du club">
                        <label class="form-label">Leader :</label>
                        <input type="text" name="leader" class="form-control" placeholder="nom du créateur" >

                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    
                </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection