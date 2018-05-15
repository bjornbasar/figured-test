@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<form action="{{ route('post') }}" method="POST">
				<div class="card">
					<div class="card-header">
						<div class="form-row">
							<div class="col-8">
								<input type="text" class="form-control" placeholder="Title" name="title" value="{{$entry['title'] }}" />
								<input type="hidden" class="form-control" name="entries_id" value="{{$entry['entries_id'] }}" />
							</div>
							<div class="col">
								{{ csrf_field() }}
								<button type="submit" class="form-control btn btn-success">Save</button>
							</div>
							<div class="col">
								<button type="button" class="form-control btn btn-danger" onclick="location.href='/admin'">Back</button>
							</div>
						</div>
					</div>

					<div class="card-body">
						<textarea name="entry">
						{!! $entry['entry'] !!}
						</textarea>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection

<script src="{{ URL::to('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
tinymce.init({
	selector: 'textarea',
	theme: 'modern',
	plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
	toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
	image_advtab: true,
	templates: [
		{ title: 'Test template 1', content: 'Test 1' },
		{ title: 'Test template 2', content: 'Test 2' }
	],
	content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css'
	]
});
</script>