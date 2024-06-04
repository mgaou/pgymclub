@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">          
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">LES COTISATIONS DU MEMBRE</div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Id_cotisation</th>
                                <th scope="col">Mois</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Reste</th>
                                <th scope="col">Cotisé le</th>
                                <th scope="col">Observation</th>
                                <th scope="col">Annulé</th>
                                <th scope="col">Annulé le</th>
                                <th scope="col">Annulé par</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>                       
                        @foreach($cotisations as $cotisation) 
                       
                                <tr>                                
                                    <td>{{$cotisation->pivot->member_id}}</td>
                                    <td>{{$cotisation->pivot->contribution_type_id}}</td>
                                    <td>{{$cotisation->pivot->mounth}}</td>
                                    <td>{{$cotisation->pivot->value}}</td>
                                    <td>{{$cotisation->pivot->value_rest}}</td>
                                    <td>{{$cotisation->pivot->paid_at}}</td>
                                    <td>{{$cotisation->pivot->observe}}</td>
                                    <td>{{$cotisation->pivot->cancel}}</td>
                                    <td>{{$cotisation->pivot->cancel_at}}</td>
                                    <td>{{$cotisation->pivot->cancel_by}}</td>
                                   <td>
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-secondary">
                                            <a class="text-white text-decoration-none" href="{{route('adhesion.create', $member->id)}}">
                                                Voir
                                            </a>
                                        </button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{route('cotisation.create', $member->id)}}">Ajouter</a></li>
                                            <li><a class="dropdown-item" href="{{route('cotisation.edit', $member->id)}}">Modifier</a></li>
                                            <li>
                                            <form action="{{route('cotisation.destroy', $member->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a onclick="return confirm('Voulez-vous vraiment supprimer cette ligne de cotisation?')" type="submit" class="dropdown-item" href="#">Supprimer</a>
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
                    {{$cotisations->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
