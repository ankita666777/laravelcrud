@extends('Students.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Student Records</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('students.index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Error!</strong>
    <ul>
        @foreach ($errors->all() as $error)
        @if($errors->has('stud_name'))
        {{ $errors->first('stud_name') }}
        @endif
        <li>There were some problems with the input.</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('students.update', $student->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Name:</strong>
                <input type="text" name="stud_name" value="{{$student->stud_name}}" class="form-control" placeholder="Enter Student Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course:</strong>
                <input class="form-control" value="{{$student->course}}" name="course" placeholder="Enter Student Course">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fees:</strong>
                <input type="text" name="fees" value="{{$student->fees}}" class="form-control" placeholder="Enter Student Fees">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection