@extends('layouts.videoLayout')

@section('content')

	<div class="row">

		<section class="content">

			<div class="col-md-8 col-md-offset-2">
				  @if (count($errors) > 0)

			        <div class="alert alert-danger">

			            <strong>Whoops!</strong> There were some problems with your input.<br><br>

			            <ul>

			                @foreach ($errors->all() as $error)

			                    <li>{{ $error }}</li>

			                @endforeach

			            </ul>

			        </div>

			    @endif
			    @if(Session::has('success'))
				    <div class="alert alert-info">
				      {{Session::get('success')}}
				    </div>
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">
				    		<h3 class="panel-title">Update Video : {{$video->title}}</h3>
				 	</div>

					<div class="panel-body">
			
					
						<div class="table-container">
    						<form method="POST" action="{{ route('videos.update', $video->id) }}"  role="form">
    						{{ csrf_field() }}
    						<input name="_method" type="hidden" value="PATCH">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="title" value="{{$video->title}}" id="video_title" class="form-control input-sm" placeholder="Video Title">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="url" value="{{$video->url}}" id="video_url" class="form-control input-sm" placeholder="Video Url">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<textarea name="description" class="form-control input-sm" placeholder="Description">{{$video->description}}</textarea>
			    			</div>

			    		
			    			
			    		 <div class="row">
							
							<div class="col-xs-12 col-sm-12 col-md-12">
								<input type="submit"  value="Update" class="btn btn-success btn-block">
								<a href="{{ route('videos.index') }}" class="btn btn-info btn-block" >Back</a>
							</div>	
							
					     </div>
			    		</form>
						</div>
					</div>

				</div>
			</div>
		</section>

@endsection