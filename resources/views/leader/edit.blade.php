@extends('layout.main')
@section('container')
<h3>Edit Data</h3>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
	<div class="col-lg-6">
		<form action="/leader/{{$leaders->id}}" method="post" enctype="multipart/form-data">
        @method('PUT')
		@csrf
        <div class="mb-3">
			<label class="form-label">Leader Name</label>
				<input type="text" class="form-control" name="name" id="name" value="{{old('name', $leaders->name)}}">
				@error('name')
				<div class="invalid-feedback">
					{{$message}}
				</div>
				@enderror
		</div>
        <div class="mb-3">
			<label class="form-label">Email</label>
				<input type="email" class="form-control" name="email" id="email" value="{{old('email', $leaders->email)}}">
				@error('email')
				<div class="invalid-feedback">
					{{$message}}
				</div>
				@enderror
		</div>
        <div class="mb-3">
			<label class="form-label">Image</label>
				<input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{old('gambar')}}">
				@error('gambar')
				<div class="invalid-feedback">
					{{$message}}
				</div>
				@enderror
		</div>
		<div class="mb-3">
		  <button type="submit" class="btn btn-primary">Create</button>
		</div>
	</form>
	</div>
</div>
    </div>
</div>


@endsection