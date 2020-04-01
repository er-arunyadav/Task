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
					Category name
				</th>
				<th>
					Action
				</th>
			</tr>
		</thead>
		<tbody>
			@if(count($categories)>0)
			@foreach($categories as $category)
				<tr>
					<td>
						{{$category->id}}
					</td>
					<td>
						{{$category->name}}
					</td>
					<td>
						<a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-info" style="color: white">Edit

						</a>
						<a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-danger" style="color: white">Delete</a>
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
			Create new Category		
		</div>
		
		<div class="card-body">
			<form action="{{route('category.store')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="name">Category name</label>
					<input class="form-control" name="name" id="category"></input>
					
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
<div class="card">
	<div class="card-body">
		<table id="myTableC" class="table table-borded">
	<thead>
		
	
	<tr>
		<td>Category name</td>
	</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>
<button class="btn btn-info" id='saveall'>Save All</button>		
	</div>
</div>


<script>
$(document).ready(function(){
	var myarray = [];
  $("#submitBtn").click(function(){
    var category = $('#category').val();
     myarray.push(category);
     var last = $(myarray).get(-1);

     $('#myTableC tr:last').after('<tr><td>'+last+'</td><tr>');
    
  });


$("#saveall").click(function(){



$.ajax({
    	url: "{{route('category.store')}}" ,
    	method: 'post',
    	data:{
    		myarray:myarray,
    		"_token": "{{ csrf_token() }}",
    	},
    	success:function(data){
    	 location.reload(); 	
    	
    	}
    });







    
  });










});








</script>

@endsection