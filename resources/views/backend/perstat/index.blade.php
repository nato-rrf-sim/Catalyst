@extends('backend.layout.main_layout')
@section('title','PERSTAT')

@section('sub-title','Manager')

@section('scripts-css-header')
    <meta name="csrf-param" content="_token">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-list"></i> PERSTAT Manager</li>
@endsection


@section('content')
<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">PERSTAT Manager</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>This shows all PERSTATs that have been issued in the unit. These are created automatically by the system on a weekly basis.</p>
        <table class="table table-striped table-bordered table-hover" id="user">
            <thead>
            <tr>
                <th>ID</th>
                <th>From</th>
                <th>To</th>
                <th>Report in Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($perstats as $perstat)
                <tr>
                    <td>{!! $perstat->id !!}</td>
                    <td>{!! $perstat->from !!}</td>
                    <td>{!! $perstat->to !!}</td>
                    <td>{!! $perstat->report_percentage() !!}% - {{$perstat->VPF->count()}}/{{$perstat->assigned}}</td>
                    <td><a href="{{route('admin.perstat.show', $perstat->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        <a href="{{ route('admin.perstat.destroy',array($perstat->id)) }}" data-method="delete" rel="nofollow" data-confirm="Are you sure you want to delete this?" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@endsection

@section('page-script')
    <script src="/backend/js/rails.js" type="text/javascript"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
@endsection

@section('page-script-include')
    <script type="text/javascript">
        $(function () {
            $("#user").DataTable({
                "iDisplayLength" : 50
            });
        });
    </script>
@endsection

