@extends('app')

@section('title')
{{'Student Details'}}
@endsection

@section('content')
<div class="container">
     <div class="card mt-5">
       <div class="card-header d-sm-flex align-items-center justify-content-between">
         <h2>Student Details</h2>
         <a href="{{route('home')}}" class="btn btn-sm btn-danger">All Student</a>
       </div>
       <div class="card-body">
         <p style="font-weight: bold;">Name:</p>
         <p>{{$student->name}}</p>

         <p style="font-weight: bold;">Class:</p>
         <p>{{$student->class_name}}</p>

         <p style="font-weight: bold;">Roll:</p>
         <p>{{$student->roll}}</p>

         <p style="font-weight: bold;">Address:</p>
         <p>{{$student->address}}</p>
       </div>
     </div>
   </div>
@endsection