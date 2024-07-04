
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
              <h4 class=" d-flex justify-content-between">add role
              <a  href="{{url('admin/roles')}}" class="btn btn-danger "> back</a>
              </h4>
            </div>
          <div class="card-body ">
          <form action="{{url('admin/roles/'."$role->id" )}}" method="post">
          @csrf
          @method('put')
          <div class="form-group">
    <label for="exampleInputEmail1">edit role</label>
    <input type="text"value ="{{$role->name}}" name="name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name permission">
    
      
   
      <button type="submit" class="btn btn-primary mt-2">save</button>

</form>
</div>
  
    @if($role->permissions)
   
   @foreach($role->permissions as $role->permission)
   <div class="bg-red my-1">
   <form class="px-4 " method="POST"
                                    action="{{ url('admin/roles/permissions/revoke',[$role->id,$role->permission->id]) }}">
                                   
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"type="submit">{{ $role->permission->name }}</button>
                                </form>
                                </div>
   @endforeach

   @endif
   <form method="POST" action="{{ url('admin/roles/'. "$role->id".'/permissions/') }}">
   @csrf
   <select class="form-select mt-4"name="permission" aria-label="Default select example">
 <option >Open this select menu</option>
 @foreach($permissions as $permission)
 <option value="{{$permission->name}}">{{$permission->name}}</option>
 @endforeach
</select>
<br>

            <button type="submit" class="btn btn-primary mt-2">assign</button>


            </form
            </div>
            </div> 
       </div>
</div>
</div>
@endsection
