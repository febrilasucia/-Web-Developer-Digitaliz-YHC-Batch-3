@extends('layout.main')
@section('container')
<h1 style="text-align: center;">Edit Data</h1>
<div class="row">
	<div class="col-lg-6">
		<form action="/project/{{$projects->id}}" method="post">
        @method('PUT')
		@csrf
		<div class="mb-3">
		  <label class="form-label">Project Name</label>
		  <input type="text" class="form-control" name="project_name" id="project_name" value="{{old('project_name', $projects->project_name) }}">
		</div>
		<div class="mb-3">
		  <label class="form-label">Client</label>
		  <input type="text" class="form-control" name="client" id="client" value="{{old('client', $projects->client) }}">
		</div>
		<div class="mb-2">
		<label class="form-label">Leader Name</label>
		<select class="form-select" name="leader_id">
            @foreach($leaders as $leader)
				@if(old('leader_id',$projects->leader_id)==$leader->id)
				<option value="{{ $leader->id }}" selected>{{ $leader->name }}</option>
				@else
				<option value="{{ $leader->id }}">{{ $leader->name }}</option>
				@endif			
		  	@endforeach
		</select>
		</div> 
        <div class="mb-3">
		  <label class="form-label">Start Date</label>
		  <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date', $projects->start_date) }}">
		</div>
        <div class="mb-3">
		  <label class="form-label">End Date</label>
		  <input type="date" class="form-control" name="end_date" id="end_date" value="{{old('end_date', $projects->end_date) }}">
		</div>
        <div class="mb-3">
		  <label class="form-label">Progress(1-100%)</label>
		  <input type="number" class="form-control" name="progress" id="progress" value="{{old('progress', $projects->progress) }}">
		</div>
		<div class="mb-3">
		  <button type="submit" name="submit" class="btn btn-primary">Save</button>
		</div>
	</form>
	</div>
</div>
@endsection