@extends('coachs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CURD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('coachs.create') }}"> Create New Coach</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>phone_Number</th>
            <th>Bio</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($coachs as $coach)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $coach->name }}</td>
            <td>{{ $coach->email }}</td>
            <td>{{ $coach->phone_number }}</td>
            <td>{{ $coach->bio }}</td>
            <td>
                <form action="{{ route('coachs.destroy',$coach->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('coachs.show',$coach->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('coachs.edit',$coach->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $coachs->links() !!}
      
@endsection