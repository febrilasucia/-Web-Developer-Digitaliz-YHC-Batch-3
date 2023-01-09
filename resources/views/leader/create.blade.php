@extends('layout.main')
@section('container')
<h1 style="text-align: center;">Tambah Data</h1>
<div class="row">
	<div class="col-lg-6">
		<form action="/leader" method="post" enctype="multipart/form-data">
		@csrf
        <div class="mb-3">
			<label class="form-label">Leader Name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
				@error('name')
				<div class="invalid-feedback">
					{{$message}}
				</div>
				@enderror
		</div>
        <div class="mb-3">
			<label class="form-label">Email</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
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
@endsection