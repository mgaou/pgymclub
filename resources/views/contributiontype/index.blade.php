@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Répertoire des cotisations</div>

                <div class="card-body">
                    
                    <table class="table table-hover table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Du</th>
                                <th scope="col">Au</th>
                                <th scope="col">Taux</th>
                                <th scope="col">Echéance</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                        @foreach($ct as $contributiontype)  
                                <tr>                                
                                    <td>{{$contributiontype->id}}</td>
                                    <td>{{$contributiontype->name}}</td>
                                    <td>{{$contributiontype->start_at}}</td>
                                    <td>{{$contributiontype->end_at}}</td>
                                    <td>{{$contributiontype->taux}}</td>
                                    <td>{{$contributiontype->echeance}}</td>
                                    <td>
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-secondary">
                                            <a class="text-white text-decoration-none" href="{{route('contributiontype.show', $contributiontype->id)}}">
                                                Voir
                                            </a>
                                        </button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{route('contributiontype.edit', $contributiontype->id)}}">Modifier</a></li>
                                            <li>
                                            <form action="{{route('contributiontype.destroy', $contributiontype->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a onclick="return confirm('Voulez-vous vraiment supprimer cet type de cotisation?')" type="submit" class="dropdown-item" href="#">Supprimer</a>
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
                    {{$ct->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
