@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form class="my-4" method="POST" action="{{ route('member.update',$member->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row" style="display:flex;align-items: end">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Firstname</label>
                            <input required type="text" name="firstname" class="form-control" value="{{$member->firstname}}">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label">Lastname</label>
                            <input required type="text" name="lastname" class="form-control" value="{{$member->lastname}}">
                        </div>
                    </div>
                    <div class="row" style="display:flex;align-items: end">
                        <div class="form-group col-md-8 mb-3">
                            <label class="form-label">Adresse</label>
                            <input required type="text" name="adress" class="form-control" value="{{$member->adress}}">
                        </div>   
                        <div class="form-group col-md-4 mb-3">
                            <label class="form-label">Phone</label>
                            <input required type="text" name="phone" class="form-control" value="{{$member->phone}}">
                        </div>                    
                    </div>
                     <div class="row" style="display:flex;align-items: end">
                        <div class="form-group col-md-2 mb-3">
                            <label for="gender">Sexe</label>
                            <select required id="gender" class="form-control" name="gender" value="{{$member->gender}}">
                               <option>M</option>
                                <option>F</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <label class="form-label">Néé le</label>
                            <input required type="date" name="born_at" class="form-control" value="{{$member->born_at}}">
                        </div>
                        <div class="form-group col-md-8 mb-3">
                            <label class="form-label">Lieu de naissance</label>
                            <input  type="text" name="placeofbirth" class="form-control" value="{{$member->placeofbirth}}">
                        </div>
                     </div>                    
                       <div class="row" style="display:flex;align-items: end">
                        <div class="form-group col-md-5 mb-3">
                                <label class="form-label">Photo</label>
                                <input  type="text" name="picture_path" class="form-control" value="{{$member->picture_path}}">
                        </div>

                        <div class="form-group col-md-5 mb-3">
                            <label class="form-label">Acte naissance</label>
                            <input  type="text" name="birth_path" class="form-control" value="{{$member->birth_path}}">
                        </div>
                        <div class="form-group col-md-2 mb-3">
                            <label for="banned_at">Activé le</label>
                            <input type="date" name="banned_at" class="form-control" value="{{$member->banned_at->format('Y-m-d')}}" >
                        </div>               
                       </div>  
                       <div class="form-group col-md-5 mb-3">
                            <p>
                                <label for="Categorie">Catégorie :</label>
                                <select class="form-select" name="category_id" id="category_id">
                                    @foreach($categories as $category) 
                                        <option {{$member->category->is($category) ? 'selected' :''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                       </div>                     
                       
                        <input type="hidden" name="active" class="form-control" value="1" >
                    </div>
                    <div class="row mb-3">
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