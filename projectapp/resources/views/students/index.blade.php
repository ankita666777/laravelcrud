@extends('Students.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 8 CRUD Example </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('students.create')}}" title="Create New Student Record"> <i class="fas fa-plus-circle"></i>
                Create New Student Record</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p></p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Student Name</th>
        <th>Course</th>
        <th>Fees</th>
        <th>Date Created</th>
        <th width="300px">Actions</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{++$i}}</td>
        <td>{{$student->stud_name}}</td>
        <td>{{$student->course}}</td>
        <td>{{$student->fees}}</td>
        <td>{{$student->created_at}}</td>
        <td>
            <form action="{{route('students.destroy',$student->id)}}" method="POST">

                <!-- <a class="btn btn-info" href="{{route('students.show',$student->id)}}" title="show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                    Show
                </a> -->

                <a class="btn btn-primary" href="{{route('students.edit',$student->id)}}">
                    <i class="fas fa-edit  fa-lg"></i>
                    Edit
                </a>

                @csrf
                @method('DELETE')

                <button type="submit" style="border: none; background-color:transparent;">
                    <i class="fas fa-trash fa-lg text-danger"></i>
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $students->links() !!}

@endsection