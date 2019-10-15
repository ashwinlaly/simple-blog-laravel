@include('template.header')
<div class="jumbotron">
	Create Product
</div>
@include('template.flash')
<table class="table table-bordered">
	<thead>
		<tr>
			<th>S.no</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Category</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $value)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->quantity }}</td>
				<td>{{ $value->price }}</td>
				<td>{{ $value->category->name }}</td>
				<td>
					<a class="btn btn-info" href="{{ url('/product')}}/{{$value->id}}" >Edit</a>
					<button class="btn btn-danger delete" data-id="{{ $value->id }}">Delete</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@include('template.footer')
<script type="text/javascript">
	$(document).ready(function(){
		$(".delete").on("click",function(){
			var id = $(this).attr("data-id");
			var _token = "{{ csrf_token() }}";
			$.ajax({
				url : "{{ url('/product') }}/"+id,
				type : "delete",
				data :{ _token },
				success:function(res){
					window.location.href="";
				},
				error:function(error){

				}
			});
		});
	});
</script>