
@extends('layouts.app')
@section('content')

@if($errors->count())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
@if(session('message'))
            <div class="alert alert-success">
           {{ session('message')}}
            </div>
            @endif
    <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
           <div class="card-header">
           name: {{$user->name}}
           <br>
           email: {{$user->email}}
              <h4 class=" d-flex justify-content-between">role and permission uers
              <a  href="{{url('/admin')}}" class="btn btn-danger "> back</a>
              </h4>
            </div>
          <div class="card-body ">
         

  
    @if($role)

    <!-- delete role -->
   
   <form class="px-4 " method="POST"
                                    action="{{ url('admin/user/role/destroy',[$user->id,$role->id]) }}">
                                   
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"type="submit">{{ $role->name }}</button>
                                </form>
                                </div>


   @endif
    <!-- add role -->

   <form method="POST" action="{{ url('admin/user/'. "$user->id".'/role/') }}">
   @csrf

   <select class="form-select mt-4"name="role" aria-label="Default select example">
   <option value="{{$role ->name}}">{{$role ->name}}</option>
 @foreach( $roles as $role)
 <option value="{{$role->name}}">{{$role->name}}</option>
 @endforeach
</select>
<br>
<button type="submit" class="btn btn-primary mt-2">save</button>
</form>
</div>
  <!-- add permission -->
<div class=" m-auto ">
   <form method="POST" action="{{ url('/admin/user/'."$user->id".'/permission') }}">
   @csrf
  
 <select class="form-select mt-4"name="permission" aria-label="Default select example">
 <option >Open this select menu</option>

 @foreach($permissions as $permission)
 <option value="{{$permission->name}}">{{$permission->name}}</option>
 @endforeach

</select>

<br>

            <button type="submit" class="btn btn-primary mt-2">assign</button>


</form>
<hr>
//////////////
@role('admin')
    I am a admin!
@else
    I am not a admin...
@endrole
            </div>
            </div>
            </div> 
       </div>
</div>
</div>
@endsection
