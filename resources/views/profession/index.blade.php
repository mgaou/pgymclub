@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">          
        <div class="col-md-8">

        <form class="my-4" method="get" action="{{ route('profession.index') }}">
                <div class="input-group mb-3 w-50">
                    <!-- name c represente le nom du champ à rechercher quie est mis dans le controleur -->
                    <input type="text" name="pr" value="{{$pr}}" class="form-control" placeholder="Saississez votre mot à rechercher..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-secondary" type="submit" id="button-addon2">Rechercher</button>
                </div>
        </form>


            <div class="card">
                <div class="card-header">Répertoire des professions</div>
                <div class="card-body">                    
                    <table class="table table-hover table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>                       
                        @foreach($p as $profession)  
                                <tr>                                
                                    <td>{{$profession->id}}</td>
                                    <td>{{$profession->name}}</td>
                                    <td>                                                                       
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-secondary">
                                                <a class="text-white text-decoration-none" href="{{route('profession.index', $profession->id)}}">
                                                    Voir
                                                </a>
                                            </button>
                                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('profession.edit', $profession->id)}}">Modifier</a></li>
                                                <li>
                                                <form action="{{route('profession.destroy', $profession->id)}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <a onclick="return confirm('Voulez-vous vraiment supprimer cette profession?')" type="submit" class="dropdown-item" href="#">Supprimer</a>
                                                </form>
                                                </li>                          
                                            </ul>
                                        </div>
                                 </td>
                                </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="card-footer text-body-secondary">
                    {{$p->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
