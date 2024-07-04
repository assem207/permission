
@extends('layouts.app')
@section('content')

@if($errors->count())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
    <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
           <div class="card-header">
              <h4 class=" d-flex justify-content-between">add permission
              <a  href="{{url('admin.permissions')}}" class="btn btn-danger "> back</a>
              </h4>
            </div>
          <div class="card-body">
          <form action="{{url('admin/permissions/'."$permission->id" )}}" method="post">
          @csrf
          @method('put')
          <div class="form-group">
    <label for="exampleInputEmail1">edit permission</label>
    <input type="text"value ="{{$permission->name}}" name="name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name permission">

   
    </div>
  <div class="pt-3">
            <button type="submit" class="btn btn-primary">update</button>
</div>

            </form
     
          <div>


          @if($permission->roles)
   
   @foreach($permission->roles as $permission->role)
   <div class="bg-red my-1">
   <form class="px-4 " method="POST"
                                    action="{{ url('admin/permissions/roles/remove',[$permission->id,$permission->role->id]) }}">
                                   
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"type="submit">{{ $permission->role->name }}</button>
                                </form>
                                </div>
   @endforeach

   @endif
   <form method="POST" action="{{ url('admin/permissions/roles',"$permission->id")}}">
   @csrf
   <select class="form-select mt-4"name="role" aria-label="Default select example">
 <option >Open this select menu</option>

 @foreach($roles as $role)
 <option value="{{$role->name}}">{{$role->name}}</option>`
 @endforeach
</select>
<br>
@error('role')
<span class="alert alrt-danger">{{message}}</span>
@enderror
            <button type="submit" class="btn btn-primary mt-2">assign</button>


            </form
             </div>
          
  
          </div>
        
         
           
       </div>
      </div>
</div>
</div>
@endsection
