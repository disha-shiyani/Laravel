@extends('template.layout')

@section('content')

    
        <h1> This is all hospital information</h1>
{{-- @auth
    <p>Welcome, {{user()->name()}} to my blog</p>
@endauth --}}
{{auth()->user()->name}}
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>    
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            @foreach ($patients as $patient)

            
            <tr>
                <td>{{$patient->id}}</td>
                <td><a href="{{route('hospital.show',$patient->id)}}">{{$patient->name}}</a></td>
                <td><a href="{{route('hospital.edit',$patient->id)}}" class="btn btn-success">Edit Me!</a></td>
                <td>
                    <form action="{{route('hospital.destroy',$patient->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trash">
                    </form>
                </td>
            </tr>
            @empty($patient)
            <tr><td colspan="4">No Data Availabel</td></tr>              
            @endempty   
            @endforeach
        </table>
        
   {{$patients->links()}}

@endsection
