@extends('layouts.footballLayout')

 

@section('content')

<div class="row">

		<section class="content">

			<div class="col-md-8 col-md-offset-2">


				<div class="panel panel-default">
					<div class="panel-heading">
				    		<h3 class="panel-title">{{$football->country}}</h3>
				 	</div>

					<div class="panel-body">
			
					
						<div class="table-container">
						<div class="video" style="text-align:center">
						<iframe style="width:100%" height="315" src="{{$football->country}}" frameborder="0" allowfullscreen></iframe>
						</div>
						<div class="video">
						{{$football->status}}
						</div>
    		
			    			
			    		 <div class="row">
							
							<div class="col-xs-12 col-sm-12 col-md-12">
								
								<a href="{{ route('footballs.index') }}" class="btn btn-info btn-block" >Back</a>
							</div>	
							
					     </div>
			    		
						</div>
					</div>

				</div>
			</div>
		</section>



@endsection