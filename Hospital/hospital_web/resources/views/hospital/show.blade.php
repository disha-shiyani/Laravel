@extends('template.layout')

@section('content')

<h1>Patient Details....</h1>
<h5>{{$hospital->name}}</h5>

Medicine:
<h6>{{$hospital->medicin}}</h6>

Disease:
<h6>{{$hospital->dicese}}</h6>

@php
    $i=1;
@endphp
<ul>
  @forelse ($hospital->getVisits ?? [] as $visit)
      <li>
        <label for="">Visits {{$i++}}</label>
        <p>{{$visit->med_diseases}}</p>
      </li>
      @empty
          <li>No More Visits Found</li>

  @endforelse
</ul>

<form action="{{route('visit.store')}}" method="post">
    @csrf
    <input type="hidden" name="patients_id" value="{{$hospital->id}}">
    <div class="form-group">
        <label class="form-label">Example textarea</label>
        <textarea name="med_diseases" class="form-control" rows="3"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Visit Info">
      </div>
    
</form>
@endsection