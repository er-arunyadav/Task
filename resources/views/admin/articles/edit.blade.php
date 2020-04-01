@extends('layouts.app')

@section('content')
@include('layouts.error')
	
	<div class="card">
		
		<div class="card-header">
			Update Article		
		</div>
		
		<div class="card-body">
			<form action="{{route('article.update', ['id' => $article->id])}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="name">Article</label>
					<input type="text" class="form-control" value="{{$article->article}}" name="name">
				</div>
				<div class="form-group">
					<div class="pull-left">
						<button class="btn btn-success" type="submit" name="submit">
							Update Article 
						</button>
					</div>
				</div>
			</form>
		</div>

	</div>

@endsection
