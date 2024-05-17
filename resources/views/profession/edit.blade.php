@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="POST" action="{{ route('profession.update',$profession->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input required type="text" name="name" class="form-control" placeholder="nom de la profession" value="{{$profession->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection