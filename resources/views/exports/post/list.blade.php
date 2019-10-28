<table>
	<thead>
		<tr>
			<td>User</td>
			<td style="color: red; background-color: black;">Comments</td>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user) 
		<tr>
			<td>{{ $user->name }}</td>
		</tr>
		@endforeach
		@foreach($users->posts as $comment) 
			<td>{{ $comment->comments ?? '' }}</td>
		@endforeach		
	</tbody>
</table>