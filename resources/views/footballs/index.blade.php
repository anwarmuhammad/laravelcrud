@extends('layouts.footballLayout')
@section('content')
@if (Session::has('message'))
<div class="alert alert-success text-center">{{ Session::get('message') }}</div>
@endif
<div class="row">
  <section class="content">
    
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3> Selected team for Fifa World Cup 2018</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              
              <a href="{{ route('footballs.create') }}" class="btn btn-info" >Add New</a>
              
            </div>
          </div>
          <div class="table-container">
             <table id="mytable" class="table table-bordred table-striped">
              
              <thead>
                
                <th><input type="checkbox" id="checkall" /></th>
                <th>Country</th>
                <th>Status</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
              </thead>
              <tbody>
                @if($footballs->count())
                @foreach($footballs as $team)
                <tr>
                  <td><input type="checkbox" class="checkthis" /></td>
                  <td><strong>{{$team->country}}</strong></td>
                  <td>
                    <span class="label label-{{ ($team->status) ? 'success' : 'danger' }}"> {{ ($team->status) ? ' Qualified ' : 'Disqualified' }}</span>
                  </td>
                  <td>
                    <a class="btn btn-info btn-xs" href="{{ route('footballs.show',$team->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-xs" href="{{ route('footballs.edit',$team->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                  </td>
                  <td>
                    <form action="{{ route('footballs.destroy',$team->id) }}" method="POST">
                    
                     {{csrf_field()}}

                           @method('DELETE') 
                         <!-- Since HTML forms can't make PUT, PATCH, or DELETE requests, you will need to add a hidden  _method field to spoof these HTTP verbs. The @method Blade directive can create this field for you: -->

                      
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
              {{$footballs->links()}}
            </div
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection