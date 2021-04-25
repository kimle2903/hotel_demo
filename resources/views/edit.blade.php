@extends('master')

@section('content')
    <h2>Create new photo</h2>
    <form method="post" action="{{url('/')}}/test/{{$item->id}}">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" value="{{$item->title}}">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">body</label>
            <textarea name="body" id="body" cols="30" rows="3" class="form-control" >{{$item->body}}</textarea>
        
        </div>
        <a href="/"></a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection