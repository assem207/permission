
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
              <a  href="{{url('admin/permissions')}}" class="btn btn-danger "> back</a>
              </h4>
            </div>
          <div class="card-body">
          <form action="{{url('admin/permissions')}}" method="post">
          @csrf
          <div class="form-group">
    <label for="exampleInputEmail1">name permission</label>
    <input type="text" name="name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name permission">

   
    </div>
  <div class="pt-3">
            <button type="submit" class="btn btn-primary">save</button>
</div>

            </form
          
          
  
          </div>
        
         
           
       </div>
      </div>
</div>
</div>
@endsection
