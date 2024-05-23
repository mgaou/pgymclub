@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="display: flex;">
          
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">LES MEMBRES DU CLUB</div>

                <div class="card-body">
                    
                    <table class="table table-hover table-striped table-responsive">
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
                                    <td>{{$member->id}}</td>
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

                                    <td style="display: flex;">
                                       
                                    <button type="button" class="btn btn-primary">
                                        <a class="text-white text-decoration-none" href="{{route('adhesion.create', $member->id)}}">Voir</a>
                                    </button>
                                    <button type="button" class="btn btn-secondary">
                                        <a  class="text-white text-decoration-none" href="{{route('member.edit', $member->id)}}">Modifier</a>
                                    </button>
                                    <button type="button" class="btn btn-primary">
                                        <a class="text-white text-decoration-none" href="{{route('cotisation.create', $member->id)}}">Cotiser</a>
                                    </button>
                                    <form action="{{route('member.destroy', $member->id)}}" method="POST"  style="display: inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('Voulez-vous vraiment supprimer cet membre?')" type="submit" class="btn btn-danger">
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
                    {{$members->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
