@extends('app')

@section('title')
{{'Edit Student'}}
@endsection

@section('content')
<div class="container">
     <div class="card mt-5">
       <div class="card-header d-sm-flex align-items-center justify-content-between">
         <h2>Edit Student</h2>
         <a href="{{route('home')}}" class="btn btn-sm btn-primary">All Student</a>
       </div>
       <div class="card-body">
        @if(Session::has('message'))
        <div class="alert alert-success">
          <strong>{{Session::get('message')}}</strong>
        </div>
        @endif
         <table class="table table-bordered">
           <form action="{{route('update',$student->id)}}" method="post">
            @csrf
            @method('put')
             <input type="text" name="name" placeholder="Student_name" class="form-control @error('name') is-invalid @enderror" value="{{$student->name}}"><br>
             @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <input type="text" name="class" placeholder="class_name @error('class') is-invalid @enderror" class="form-control"
              value="{{$student->class_name}}"><br>
             @error('class')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <input type="text" name="roll" placeholder="class_roll" class="form-control @error('roll') is-invalid @enderror" value="{{$student->roll}}"><br>
             @error('roll')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <input type="text" name="address" placeholder="address" class="form-control @error('address') is-invalid @enderror" value="{{$student->address}}"><br>
             @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror
             <button type="submit" class="btn btn-secondary">Update</button>
           </form>
         </table>
       </div>
     </div>
   </div>
@endsection