@extends('layout.main')
@section('container')
<h3>Create Data</h3>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
	<div class="col-lg-6">
		<form action="/project" method="post">
		@csrf
		<div class="mb-3">
		  <label class="form-label">Project Name</label>
		  <input type="text" class="form-control" name="project_name" id="project_name">
		</div>
		<div class="mb-3">
		  <label class="form-label">Client</label>
		  <input type="text" class="form-control" name="client" id="client">
		</div>
		<div class="mb-2">
		<label class="form-label">Leader Name</label>
		<select class="form-select" name="leader_id">
			@foreach($leaders as $leader)
		  		<option value="{{ $leader->id }}">{{ $leader->name }}</option>
		  	@endforeach
		</select>
		</div> 
        <div class="mb-3">
		  <label class="form-label">Start Date</label>
		  <input type="date" class="form-control" name="start_date" id="start_date">
		</div>
        <div class="mb-3">
		  <label class="form-label">End Date</label>
		  <input type="date" class="form-control" name="end_date" id="end_date">
		</div>
        <div class="mb-3">
		  <label class="form-label">Progress(1-100%)</label>
		  <input type="number" class="form-control" name="progress" id="progress">
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