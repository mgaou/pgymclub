@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">          
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Les cotisations de {{$member->fullname}}</h4></div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Id_membre</th>
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
                        @foreach($cts as $cotisation) 
                       
                                <tr>                                
                                    <td>{{$cotisation->id}}</td>
                                    <td>{{$cotisation->member_id}}</td>
                                    <td>{{$cotisation->contribution_type_id}}</td>
                                    <td>{{$cotisation->mounth}}</td>
                                    <td>{{$cotisation->value}}</td>
                                    <td>{{$cotisation->value_rest}}</td>
                                    <td>{{$cotisation->paid_at}}</td>
                                    <td>{{$cotisation->observe}}</td>
                                    <td>{{$cotisation->cancel}}</td>
                                    <td>{{$cotisation->cancel_at}}</td>
                                    <td>{{$cotisation->cancel_by}}</td>
                                   <td>
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-secondary">
                                            <a class="text-white text-decoration-none" href="{{route('member.adhesion.create', $cotisation->member_id)}}">
                                                Voir
                                            </a>
                                        </button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{route('member.cotisation.create', $cotisation->member_id)}}">Ajouter</a></li>
                                            <li><a class="dropdown-item" href="{{route('member.cotisation.edit', [$cotisation->member_id, $cotisation->id])}}">Modifier</a></li>
                                            <li>
                                            <form action="{{route('member.cotisation.destroy', [$cotisation->member_id, $cotisation->id])}}" method="POST">
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
                    {{$cts->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
