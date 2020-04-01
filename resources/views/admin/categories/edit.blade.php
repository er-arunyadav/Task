@extends('layouts.app')

@section('content')
@include('layouts.error')
	
	<div class="card">
		
		<div class="card-header">
			Update Category		
		</div>
		
		<div class="card-body">
			<form action="{{route('category.update', ['id' => $category->id])}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="name">Category name</label>
					<input type="text" class="form-control" value="{{$category->name}}" name="name">
				</div>
				<div class="form-group">
					<div class="pull-left">
						<button class="btn btn-success" type="submit" name="submit">
							Update Category 
						</button>
					</div>
				</div>
			</form>
		</div>

	</div>

@endsection
