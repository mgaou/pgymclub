@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
          
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Répertoire des divisions</div>

                <div class="card-body">
                    
                    <table class="table table-hover table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Créé par</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                       
                        @foreach($d as $division)  
                                <tr>                                
                                    <td>{{$division->id}}</td>
                                    <td>{{$division->name}}</td>
                                    <td>{{$division->created_by}}</td>
                                    <td>
                                      <div class="btn-group">
                                       <button type="button" class="btn btn-secondary">
                                            <a class="text-white text-decoration-none" href="{{route('division.index', $division->id)}}">
                                                Voir
                                            </a>
                                        </button>
                                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{route('division.edit', $division->id)}}">Modifier</a></li>
                                            <li>
                                            <form action="{{route('division.destroy', $division->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a onclick="return confirm('Voulez-vous vraiment supprimer cette division?')" type="submit" class="dropdown-item" href="#">Supprimer</a>
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
                    {{$d->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
