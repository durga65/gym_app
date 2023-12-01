@extends('programs.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Program</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('programs.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('programs.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Progress:</strong>
                <input type="text" name="progress" class="form-control" placeholder="Progress">
            </div>
        </div>

       {{-- <div class="form-group">
                <label for="tag_ids">Tags:</label>
                <select id="tag_ids" class="form-control" multiple name="tag_ids[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
            </div>--}}

        <div class="form-group">
        <label for="tags">Tag</label><br>
        <select id="exampleSelect"  class="form-control" multiple="multiple" name="tags[]">
            @foreach( $tags as $tag )
            <option value="{{$tag->id}}">{{ $tag->tag }}</option>
            @endforeach
        </select>
        @error('tag')
            <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection