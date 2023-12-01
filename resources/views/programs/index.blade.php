@extends('programs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('programs.create') }}"> Create New Program</a>
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
            <th>Description</th>
            <th>progress</th>
            <th>Tag</th>
     <th width="280px">Action</th>
        </tr>
        @foreach ($programs as $program)
        <tr>
            <td></td>
            <td>{{ $program->name }}</td>
            <td>{{ $program->description }}</td>
            <td>{{ $program->progress }}</td>
           {{-- <td>{{ $program->tag->tag }}</td>--}}
           <td>
                            @foreach($program->tags as $tag)
                                {{ $tag->tag }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
            <td>
                <form action="{{ route('programs.destroy',$program->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('programs.show',$program->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('programs.edit',$program->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  

@endsection