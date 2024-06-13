@extends('template.layout')

@section('content')
    <h1>Add Patients Information here...</h1>
    <form action="{{route('hospital.store')}}" method="post">
        @csrf
        <form>
            <div class="form-group">
              <label>Patient Name</label>
              <input name="name" type="text" class="form-control" placeholder="Required | name" class=@error('name') error @enderror>
                @error('name')
                <span>{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
              <label>Mobile No</label>
              <input name="mobileno" type="text" class="form-control" placeholder="Required | mobileno" class=@error('mobileno') error @enderror>
              @error('mobileno')
              <span>{{$message}} </span>
              @enderror
            </div>
            <div class="form-group">
                <label>Dicese</label>
                <textarea name="dicese" class="form-control" id="editor" rows="3" placeholder="Required | dicese" class=@error('dicese') error @enderror></textarea>
                @error('dicese')
                <span>{{$message}} </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Medicin</label>
                <textarea name="medicin" class="form-control" id="editor" rows="3" placeholder="Required | medicin" class=@error('medicin') error @enderror></textarea>
                @error('medicin')
                <span>{{$message}} </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </form>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
@endsection