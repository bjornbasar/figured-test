@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		@foreach($entries as $entry)

			<div class="card">
                <div class="card-header">
					{{ $entry['title'] }}
					<span style="float: right;">
					<button class="btn btn-success  btn-sm">Edit</button>
					<button class="btn btn-danger btn-sm">Delete</button>
					</span>
				</div>

                <div class="card-body">
					{!! $entry['entry'] !!}
                </div>
            </div>

		@endforeach
        </div>
    </div>
</div>
@endsection
