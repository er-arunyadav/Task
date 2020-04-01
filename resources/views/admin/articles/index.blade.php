@extends('layouts.app')

@section('content')
	<div class="panel">
		<div class="panel-body" style="background-color: white">
			<table class="table table-hover" id="myTable">
		<thead>
			<tr>
				<th>
					Id
				</th>
				<th>
					Article
				</th>
				<th>
					Action
				</th>
			</tr>
		</thead>
		<tbody>
			@if(count($articles)>0)
			@foreach($articles as $article)
				<tr>
					<td>
						{{$article->id}}
					</td>
					<td>
						{{$article->article}}
					</td>
					<td>
						<a href="{{route('article.edit',['id' => $article->id])}}" class="btn btn-info" style="color: white">Edit

						</a>
						<a href="{{route('article.delete',['id' => $article->id])}}" class="btn btn-danger" style="color: white">Delete</a>
					</td>
				</tr>
			@endforeach
			@else
				<tr rowspan="3">
					<td>No Data Found</td>
				</tr>
			@endif
		</tbody>
	</table>		
		</div>
	</div>

	
	<div class="card">
		
		<div class="card-header">
			Create new Article		
		</div>
		
		<div class="card-body">
			<form action="{{route('article.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="name">Article</label>
					<textarea cols="5" rows="5" class="form-control" name="article" id="article">
						
					</textarea>
					
				</div>
				<div class="form-group">
					<div class="pull-left">
						<button class="btn btn-success" id="submitBtn" type="button" name="submit">
							Store Article 
						</button>
					</div>
				</div>
			</form>
		</div>

	</div>

<script>
$(document).ready(function(){
  $("#submitBtn").click(function(){
    var article = $('#article').val();

    $.ajax({
    	url: "{{route('article.store')}}" ,
    	method: 'post',
    	data:{
    		article:article,
    		"_token": "{{ csrf_token() }}",
    	},
    	success:function(data){
    		
    		console.log(data.article);
    		$('#myTable tr:last').after('<tr><td>'+data.id+'</td><td>'+data.article+'</td><td><a href="article/edit/'+data.id+'" class="btn btn-info" style="color: white">Edit</a><a href="article/delete/'+data.id+'" class="btn btn-danger" style="color: white">Delete</a><td></tr>');
    	}
    });
  });
});
</script>

@endsection