@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Répertoire des professions</div>

                <div class="card-body">
                    
                    <table class="table table-hover table-bordered border-primary table-striped table-responsive">
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
                                       
                                    <button type="button" class="btn btn-primary">
                                        <a class="text-white text-decoration-none" href="{{route('profession.index', $profession->id)}}">Voir</a>
                                    </button>
                                    <button type="button" class="btn btn-secondary">
                                        <a  class="text-white text-decoration-none" href="{{route('profession.edit', $profession->id)}}">Modifier</a>
                                    </button>
                                    <form action="{{route('profession.destroy', $profession->id)}}" method="POST"  style="display: inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('Voulez-vous vraiment supprimer cet club?')" type="submit" class="btn btn-danger">
                                            Supprimer
                                        </button>
                                     
                                    </form>
                                        
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
</div>
@endsection
