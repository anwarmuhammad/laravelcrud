@extends('layouts.videoLayout')
@section('content')
@if (Session::has('message'))
<div class="alert alert-success text-center">{{ Session::get('message') }}</div>
@endif
<div class="row">
  <section class="content">
    
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>List Videos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              
              <a href="{{ route('videos.create') }}" class="btn btn-info" >Add New</a>
              
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
              
              <thead>
                
                <th><input type="checkbox" id="checkall" /></th>
                <th>Video Title</th>
                <th>Video URL</th>
                <th>Video Description</th>
                <th>Status</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
              </thead>
              <tbody>
                @if($videos->count())
                @foreach($videos as $video)
                <tr>
                  <td><input type="checkbox" class="checkthis" /></td>
                  <td>{{$video->title}}</td>
                  <td>{{$video->url}}</td>
                  <td>{{$video->description}}</td>
                  <td>
                    <span class="label label-{{ ($video->status) ? 'success' : 'danger' }}"> {{ ($video->status) ? ' Active ' : 'Inactive' }}</span>
                  </td>
                  <td>
                    <a class="btn btn-info btn-xs" href="{{ route('videos.show',$video->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{ route('videos.edit',$video->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                  </td>
                  <td>
                    <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
                      {{csrf_field()}}
                      @method('DELETE')
                      
                      <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </td>
                </tr>
                @endforeach
                
                @else
                <tr>
                  <td colspan="7">No Records found !!</td>
                </tr>
                @endif
              </tbody>
              
            </table>
            <div class="text-center">
              {{$videos->links()}}
            </div
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection