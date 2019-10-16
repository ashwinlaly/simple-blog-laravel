@include('template.header')
<div class="jumbotron">
	Posts
</div>
@include('template.flash')
<table class="table table-bordered">
	<thead>
		<tr>
			<th>S.no</th>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
		@foreach($post as $key => $value)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $value->comments }}</td>
			</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2">
				{{ $post->links() }}
			</td>
		</tr>
	</tfoot>
</table>
@include('template.footer')