<table>
	<tbody>
		@foreach($posts as $post) 
			<tr>
				<td>{{ $post->comments }}</td>
			</tr>
		@endforeach
	</tbody>
</table>