@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                <form class="my-4" method="POST" action="{{ route('member.update',$member->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row" style="display:flex;align-items: end">
                        <div class="form-group col-md-6">
                            <label class="form-label">Firstname</label>
                            <input required type="text" name="firstname" class="form-control" value="{{$member->firstname}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Lastname</label>
                            <input required type="text" name="lastname" class="form-control" value="{{$member->lastname}}">
                        </div>
                    </div>
                    <div class="form-row" style="display:flex;align-items: end">
                        <div class="form-group col-md-8">
                            <label class="form-label">Adresse</label>
                            <input required type="text" name="adress" class="form-control" value="{{$member->adress}}">
                        </div>   
                        <div class="form-group col-md-4">
                            <label class="form-label">Phone</label>
                            <input required type="text" name="phone" class="form-control" value="{{$member->phone}}">
                        </div>                    
                    </div>
                     <div class="form-row" style="display:flex;align-items: end">
                        <div class="form-group col-md-2">
                            <label for="gender">Sexe</label>
                            <select required id="gender" class="form-control" value="{{$member->gender}}">
                               <option>M</option>
                                <option>F</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Néé le</label>
                            <input required type="date" name="born_at" class="form-control" value="{{$member->born_at}}">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="form-label">Lieu de naissance</label>
                            <input required type="text" name="placeofbirth" class="form-control" value="{{$member->placeofbirth}}">
                        </div>
                     </div>                    
                       <div class="form-row" style="display:flex;align-items: end">
                        <div class="form-group col-md-5">
                                <label class="form-label">Photo</label>
                                <input required type="text" name="picture_path" class="form-control" value="{{$member->picture_path}}">
                        </div>

                        <div class="form-group col-md-5">
                            <label class="form-label">Acte naissance</label>
                            <input required type="text" name="birth_path" class="form-control" value="{{$member->birth_path}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="banned_at">Activé le</label>
                            <input type="datetime" name="banned_at" class="form-control" value="{{$member->banned_at}}" >
                        </div>               
                       </div>  
                       <div class="form-group">
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
                       
                        <input type="hidden" name="created_by" class="form-control" value="{{Auth::user()->name}}" >
                        <input type="hidden" name="updated_by" class="form-control" value="{{Auth::user()->name}}" >
                    
                    </div>
                    <div class="form-row col-md-12"style="display:flex">
                        <div class="form-group col-md-11">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" action="{{ route('member.index') }}">Retour</button>
                        </div>
                    </div>                   
                    
                </form>
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection