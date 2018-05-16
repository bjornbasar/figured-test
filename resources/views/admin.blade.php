@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		<button class="btn btn-primary btn-block" onclick="location.href='/edit'">New Entry</button>
		@foreach($entries as $entry)

			<div class="card">
                <div class="card-header">
					{{ $entry->title }}
					<span style="float: right;">
						<button class="btn btn-success  btn-sm" onclick="location.href='/edit/{{ $entry->_id }}'">Edit</button>
						<button class="btn btn-danger btn-sm" onclick="location.href='/delete/{{ $entry->_id }}'">Delete</button>
					</span>
				</div>

                <div class="card-body">
					{{ str_limit($entry->entry, 50, '...') }}
                </div>
            </div>

		@endforeach
        </div>
    </div>
</div>
@endsection
