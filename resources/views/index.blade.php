@extends('app')

@section('title')
{{'All Student'}}
@endsection

@section('content')
<div class="container">
     <div class="card mt-5">
       <div class="card-header d-sm-flex align-items-center justify-content-between">
         <h2><i>All Student</i></h2>
         <a href="{{route('create')}}" 
         class="btn btn-sm btn-info" style="font-weight: bold;">Create</a>
       </div>
       <div class="card-body">
         @if(Session::has('message'))
        <div class="alert alert-danger">
          <strong>{{Session::get('message')}}</strong>
        </div>
        @endif
         <table class="table table-bordered">
           <thead>
             <tr>
               <td>#</td>
               <td>Name</td>
               <td>Class</td>
               <td>Roll</td>
               <td>Address</td>
               <td>Option</td>
             </tr>
           </thead>
           <tbody>
            @foreach($students as $student)
             <tr>
               <td>{{++$loop->index}}</td>
               <td>{{$student->name}}</td>
               <td>{{$student->class_name}}</td>
               <td>{{$student->roll}}</td>
               <td>{{$student->address}}</td>
               <td>
                 <a href="{{route('show',$student->id)}}" class="btn btn-sm btn-info">View</a>
                 <a href="{{route('edit',$student->id)}}" class="btn btn-sm btn-success">Edite</a>
                 <form method="post" action="{{ route('destroy',$student->id)}}">
                   @csrf
                   @method('delete')
                   <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                 </form>
               </td>
             </tr>
             @endforeach
           </tbody>
         </table>
       </div>
     </div>
   </div>
@endsection