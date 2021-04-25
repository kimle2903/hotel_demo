@extends('master')

@section('content')
    <h2>Create new photo</h2>
    <form method="post" action="{{url('/')}}/test">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">body</label>
            <textarea name="body" id="body" cols="30" rows="3" class="form-control" ></textarea>
        
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection