@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Répertoire des présences enregistrées</div>

                <div class="card-body">
                    
                    <table class="table table-hover table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Member_id</th>
                                <th scope="col">Member_name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Observations</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                        @foreach($presences as $presence)  
                                <tr>                                
                                    <td>{{$presence->id}}</td>
                                    <td>{{$presence->member->id}}</td>
                                    <td>{{$presence->member->fullname}}</td>
                                    <td>{{$presence->pdate}}</td>
                                    <td>{{$presence->pobserve}}</td>
                                <td>
                                      <div class="btn-group">
                                       <button type="button" class="btn btn-secondary">
                                            <a class="text-white text-decoration-none" href="{{route('member.presence.index', [$member->id,$presence->id])}}">
                                                Voir
                                            </a>
                                        </button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{route('member.presence.create', $member->id)}}">Ajouter</a></li>
                                            <li><a class="dropdown-item" href="{{route('member.presence.edit', [$member->id,$presence->id])}}">Modifier</a></li>
                                            <li>
                                            <form action="{{route('member.presence.destroy', [$member->id,$presence->id])}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button onclick="return confirm('Voulez-vous vraiment supprimer cette présence?')" type="submit" class="dropdown-item">Supprimer</button>
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
                    {{$presences->links() }}
                </div>
                <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                               <a type="button" class="btn btn-secondary" href="{{url()->previous() }}">Retour aux présences</a>
                            </div>
                        </div> 
            </div>
        </div>
    </div>
@endsection
