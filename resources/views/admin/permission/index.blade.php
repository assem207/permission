
@extends('layouts.app')
@section('content')
@if(session('success'))
            <div class="alert alert-success">
           {{ session('success')}}
            </div>
            @endif

    <div class="container">
      <div class="row">
         <div class="col-md-12">
           
            <div class="card">
           <div class="card-header">
              <h4 class=" d-flex justify-content-between">admin permission
              <a  href="{{url('admin/permissions/create')}}" class="btn btn-primary "> add permission</a>
              </h4>
            </div>
          <div class="card-body">
          <table class="table table-sm table-dark">
            <thead>
            <tr>
                <th class="bg-primary">id</th>
                <th class="bg-success">name</th>
                <th class="bg-warning">action</th>
          
           </tr>
             </thead>

           <tbody class="">
            @foreach($permissions as $permission)
            <tr>
            <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td class=" d-flex m-auto">
                    <a class="btn btn-primary mx-3" href="{{url('admin/permissions/'."$permission->id".'/edit')}}">edit</a>
                    <a class="btn btn-danger mx-3" href="{{url('admin/permissions/'."$permission->id".'/destroy')}}">delete</a>


                </td>

</tr>
                @endforeach
           </tbody>
           </table>
          </div>
       </div>
      </div>
</div>
</div>
@endsection
