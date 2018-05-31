@extends('layouts.footballLayout')

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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add a Team</h3>
				</div>
				<div class="panel-body">
					
					
					<div class="table-container">
						<form method="POST" action="{{ route('footballs.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="country" id="country" class="form-control input-sm" placeholder="Contry Name">
									</div>
								</div>
								
							</div>
							
							<div class="row">
								
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Save" class="btn btn-success btn-block">
									<a href="{{ route('footballs.index') }}" class="btn btn-info btn-block" >Back</a>
								</div>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection