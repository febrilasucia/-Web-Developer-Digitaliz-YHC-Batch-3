@extends('layout.main')
@section('container')
@if (session()->has('pesan'))
	<div class="alert alert-success" role="alert">{{ session('pesan')}}</div>
@endif
<div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Monitoring Project</h1>
    <p class="mb-4"></p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div>
                    <!-- <a data-toggle="modal" data-target="#tambahModal" style="background-color:#36b9cc; width: 150px;" class="dropdown-item btn btn-primary font-weight-bold text-white">Tambah Data</a> -->
                    <a href="/project/create" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <small>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                            <thead>
                                <tr style="text-align:center">
                                    <th>No</th>
                                    <th>Project Name</th>
                                    <th>Client</th>
                                    <th>Leader Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Progress</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td style="text-align:center">{{$loop->iteration}}</td>
                                    <td>{{$project->project_name}}</td>
                                    <td style="text-align:center">{{$project->client}}</td>
                                    <td style="text-align:left">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="p-2">
                                            <img src="/img/{{$project->Leader->gambar}}" alt="" class="img-profile rounded-circle" width=30px height=30px>
                                        </div>
                                        <div> {{$project->Leader->name}} <br> {{$project->Leader->email}}</div>
                                    </div>
                                    </td>
                                    <td style="text-align:center">{{$project->start_date}}</td>
                                    <td style="text-align:center">{{$project->end_date}}</td>
                                    <td style="text-align:right">
                                        <div class="mb-1 small" ><small>{{$project->progress}}%</small></div>
                                            <div class="progress progress-sm mb-2">
                                                <div class="progress-bar" role="progressbar" style="width: {{$project->progress}}%" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td style="text-align:center">
                                        <a href="/project/{{$project->id}}/edit" class="btn btn-warning"><i class="fas fa-pen fa-sm" style="text-size:12px; text-align:center; width:15px"></i></a>
                                        <form action="/project/{{ $project->id}}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin akan menghapus data?')"><i class="fas fa-trash fa-sm" style="text-size:12px; text-align:center; width:15px"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </small>
                        
                    </div>
                </div>
        </div>

</div>
                    
@endsection