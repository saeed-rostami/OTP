@if($errors->any())
    @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}<br></p>
    @endforeach
@endif

@if(session("error"))
   <p class="alert alert-danger">{{session('error')}}</p>
@endif
