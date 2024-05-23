@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form method="post" action="{{ route('category.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Libellé</label>
                        <input required type="text" name="name" class="form-control">

                        <input type="hidden" name="created_by" class="form-control" value="{{Auth::user()->name}}" >

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