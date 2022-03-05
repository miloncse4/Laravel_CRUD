@extends('app')

@section('title')
{{'Create Student'}}
@endsection

@section('content')
<div class="container">
     <div class="card mt-5">
       <div class="card-header d-sm-flex align-items-center justify-content-between">
         <h2>Create Student</h2>
         <a href="{{route('home')}}" class="btn btn-sm btn-warning" style="font-weight:bold;">All Student</a>
       </div>
       <div class="card-body">
        @if(Session::has('message'))
        <div class="alert alert-success">
          <strong>{{Session::get('message')}}</strong>
        </div>
        @endif
         <table class="table table-bordered">
           <form action="{{route('store')}}" method="post">
            @csrf
             <input type="text" name="name" placeholder="Student_name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"><br>
             @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <input type="text" name="class" placeholder="class_name @error('class') is-invalid @enderror" class="form-control" value="{{old('class')}}"><br>
             @error('class')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <input type="text" name="roll" placeholder="class_roll" class="form-control @error('roll') is-invalid @enderror" value="{{old('roll')}}"><br>
             @error('roll')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <input type="text" name="address" placeholder="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}"><br>
             @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror
             <button type="submit" class="btn btn-success">Create</button>
           </form>
         </table>
       </div>
     </div>
   </div>
@endsection