@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Visitor Log</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form id="coverForm" action="{{ route('cms.website-cover.save-order') }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-striped" width="100%" id="basic-datatable">
                                <thead> 
                                    <tr class="table-primary">
                                        <th>Tanggal</th>
                                        <th>IP</th>
                                        <th>User Agent</th>
                                        <th>Referer</th>
                                        <th>Method</th>
                                        <th>Url</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitor as $v)

                                    <tr>
                                        <td>{{ $v->created_at }}</td>
                                        <td>{{ $v->ip_address }}</td>
                                        <td>{{ $v->user_agent }}</td>
                                        <td>{{ $v->referer }}</td>
                                        <td>{{ $v->method }}</td>
                                        <td>{{ $v->url }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#basic-datatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>
@endsection