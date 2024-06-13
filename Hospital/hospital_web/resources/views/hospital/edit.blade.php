@extends('template.layout')

@section('content')
    <h1>Edit Patients Information....</h1>
    {{$hospital}}

    <form action="{{route('hospital.update',$hospital->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
          <label class="form-label">Patient Name</label>
          <input type="text" name="name" value="{{$hospital->name}}" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Mobile</label>
          <input type="number" name="mobileno" value="{{$hospital->mobile}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Disease</label>
            <textarea class="form-control" name="dicese" id="editor" rows="3">{{$hospital->dicese}}</textarea>
        </div>
        <div class="form-group">
            <label>Medicine</label>
            <textarea class="form-control" name="medicin" id="editor" rows="3">{{$hospital->medicin}}</textarea>
          </div>
        <button type="submit" class="btn btn-primary" value="Edit Me!">Submit</button>
      </form>
@endsection