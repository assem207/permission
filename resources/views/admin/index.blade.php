@extends('layouts.app')

@section('content')

    
@if(session('success'))
            <div class="alert alert-success">
           {{ session('success')}}
            </div>
            @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">{{ __('admin') }}


                </div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>


                    @endif

                    HELLO  admin {{ __('You are logged in!') }}
<div class="my-3 bx-0">
                    <table class="table table-sm table-dark">
            <thead>
            <tr>
                <th class="bg-primary">id</th>
                <th class="bg-success">name</th>
                <th class="bg-warning">email</th>
                <th class="bg-info">action</th>
          
           </tr>
             </thead>

           <tbody class="">
            @foreach($users as $user)
            <tr>
            <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class=" d-flex m-auto">
                    <form class="px-4 " action="{{url('/admin/user/show',"$user->id")}}" method="POST">

                    @csrf
                                    
                   <button class="btn btn-primary"type="submit"> role</button>
                </form>
                <form class="px-4 " action="{{url('admin/user/show',"$user->id")}}" method="POST">

                  @csrf
                
                 <button class="btn btn-success"type="submit"> permission</button>
                     </form>
                   
                    <a class="btn btn-danger mx-3" href="{{url('admin/user/'."$user->id".'/destroy')}}">delete</a>


                </td>

</tr>
                @endforeach
           </tbody>
           </table>
                </div>
            </div>
            </div>


@endsection
