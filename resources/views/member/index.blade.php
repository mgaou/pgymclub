@extends('layouts.app')

@section('content')

    
    <div class="row justify-content-center">          
        <div class="col-md-8">
            <form class="my-4" method="get" action="{{ route('member.index') }}">
                <div class="input-group mb-3 w-50">
                    <!-- name q represente le nom du champ à rechercher quie est mis dans le controleur -->
                    <input type="text" name="q" value="{{$q}}" class="form-control" placeholder="Saississez votre mot clé..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-secondary" type="submit" id="button-addon2">Rechercher</button>
                </div>
            </form>
            <div class="card">
                <div class="card-header">LES MEMBRES DU CLUB</div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">active</th>
                                <th scope="col">Banned_at</th>
                                <th scope="col">Created_by</th>
                                <th scope="col">Updated_by</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>                       
                        @foreach($members as $member)  
                                <tr>                                
                                    <td style="background-color:{{ $member->active ? 'green !important' : 'red !important' }}">{{$member->id}}</td>
                                    <td>{{$member->firstname}}</td>
                                    <td>{{$member->lastname}}</td>
                                    <td>{{$member->adress}}</td>
                                    <td>{{$member->phone}}</td>
                                    <td>{{$member->gender}}</td>
                                    <td>{{$member->active}}</td>
                                    <td>{{$member->banned_at}}</td>
                                    <td>{{$member->created_by}}</td>
                                    <td>{{$member->update_by}}</td>
                                    <td>{{$member->category->name}}</td>
                                    <td>
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-secondary">
                                            <a class="text-white text-decoration-none" href="{{route('member.adhesion.create', $member->id)}}">
                                                Voir
                                            </a>
                                        </button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{route('member.edit', $member->id)}}">Modifier</a></li>
                                        @if ($member->active==1)
                                             <li><a class="dropdown-item" href="{{route('member.cotisation.create', $member->id)}}">Ajouter une cotisation</a></li>
                                        @endif
                                        @if ($member->active)
                                            <li><a class="dropdown-item" href="{{route('member.cotisation.index', $member->id )}}">Détails cotisations</a></li>
                                        @endif
                                            <li><a class="dropdown-item" href="{{route('member.presence.create', $member->id)}}">Ajouter une présence</a></li>
                                            <li><a class="dropdown-item" href="{{route('member.presence.index', $member->id )}}">Détails pésences</a></li>
                                            <li><a class="dropdown-item" href="{{route('member.pratique.create', $member->id)}}">Exercer</a></li>                                            
                                            <li>
                                            <form action="{{route('member.destroy', $member->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a onclick="return confirm('Voulez-vous vraiment supprimer cet membre?')" type="submit" class="dropdown-item" href="#">Supprimer</a>
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
                </div>
                <div class="card-footer text-body-secondary">
                    {{$members->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
