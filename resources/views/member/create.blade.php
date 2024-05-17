@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form class="my-4" method="post" action="{{ route('member.store') }}">
                    @csrf
                    <div class="row" style="display:flex;align-items: end">
                        <div class="col-md-6">
                            <label class="form-label">Firstname</label>
                            <input required type="text" name="firstname" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lastname</label>
                            <input required type="text" name="lastname" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-label">Adresse</label>
                            <input required type="text" name="adress" class="form-control">
                        </div>   
                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input required type="text" name="phone" class="form-control">
                        </div>                    
                    </div>
                     <div class="row">
                        <div class="col-md-2">
                            <label class="form-label" for="gender">Sexe</label>
                            <select name="gender" required id="gender" class="form-control">
                                <option selected>Choisir le sexe</option>
                                <option>M</option>
                                <option>F</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Néé le</label>
                            <input required type="date" name="born_at" class="form-control" value="2024 -05 -14 20: 35: 21">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Lieu de naissance</label>
                            <input required type="text" name="placeofbirth" class="form-control">
                        </div>
                     </div>                    
                       <div class="row">
                        <div class="col-md-5">
                                <label class="form-label">Photo</label>
                                <input  type="text" name="picture_path" class="form-control">
                        </div>

                        <div class="col-md-5">
                            <label class="form-label">Acte naissance</label>
                            <input  type="text" name="birth_path" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" for="banned_at">Activé le</label>
                            <input type="date" name="banned_at" class="form-control" >
                        </div>               
                       </div>  
                       <div class="form-group">
                            <p>
                                <label class="form-label" for="Categorie">Catégorie :</label>
                                <select class="form-select" name="category_id" id="category_id">
                                    @foreach($categories as $category) 
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                       </div>                     
                       
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <button type="button" class="btn btn-secondary" action="{{ route('member.index') }}">Retour</button>
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