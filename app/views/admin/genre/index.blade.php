@extends('layouts.admin')

@section('content')

<h2>
	<span>Genres</span>
	<div class="pull-right">
		<a href="{{ route('admin.genre.create') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add genre
		</a>
	</div>
</h2>

@if ($genres->count() > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th></th>				
		</tr>
	</thead>
	<tbody>
		@foreach ($genres as $genre)
		<tr>
			<td>{{ $genre->id }}</span></td>
			<td>{{ $genre->name }}</td>
			<td class="text-right">
				{{ Form::open(array('route' => array('admin.genre.destroy', $genre->id), 'method' => 'delete')) }}
					<button type="submit" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
					<a href="{{ route('admin.genre.show', array($genre->id)) }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-info-sign"></span> Show
					</a>
					<a href="{{ route('admin.genre.edit', array($genre->id)) }}" class="btn btn-xs btn-default">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</a>
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else 
<div class="alert alert-warning">
	<p>No genres yet.</p>
</div>
@endif

<script>
$('.btn-danger').on('click', function() {
	return confirm('Are you certain to do that ?');
});
</script>

{{ $genres->links() }}
@stop