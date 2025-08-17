@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Role Baru</h3>
        </div>
       <div class="ms-md-auto py-2 py-md-0">
            <button type="submit" id="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </div>
    </div>
    <form action="{{ route('cms.role.store') }}" id="form" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group form-inline row">
                            <label for="name" class="col-md-3 col-form-label text-wrap"><b>Role</b></label>
                            <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" value="{{ old('name') }}" name="name" id="name" required>
                                <div class="invalid-feedback">Role harus diisi</div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <label for="name" class="col-md-3 col-form-label text-wrap"><b>Pemission</b></label>
                        <hr>
                        <table class="table table-bordered" id="basic-datatables">
                            <thead>
                                <tr class="table-primary">
                                    <th width="1%"><input class="form-check-input" type="checkbox" id="checkAll"></th>
                                    <th>Fitur</th>
                                    <th>Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permission as $perm)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" data-name="{{{ $perm['name'] }}}" id="perm-{{ $perm['id'] }}">
                                            </div>
                                        </td>
                                        <td>{{ $perm['feature'] }}</td>
                                        <td>{{ $perm['access'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    let selectedPermission = [];
    let datatable = $('#basic-datatables').DataTable();


    $(document).ready(function() {
        $('#checkAll').on('change', function() {
            datatable.rows().every(function() {
                let row = this.node();
                let checkbox = $(row).find('input[type="checkbox"]');
                checkbox.prop('checked', $('#checkAll').is(':checked'));
            });
        });
    });

    $('#basic-datatables').on('change', '.form-check-input', function () {
        let name = $(this).data('name');

        if ($(this).is(':checked')) {
            if (!selectedPermission.includes(name)) {
                selectedPermission.push(name);
            }
        } else {
            selectedPermission = selectedPermission.filter(item => item !== name);
        }
    });

     $('#submit').on('click', function(e) {
        e.preventDefault();

        selectedPermission.forEach(function(perm) {
            $('<input>').attr({
                type: 'hidden',
                name: 'permission[]',
                value: perm
            }).appendTo('#form');
        });

        $('#form').submit();
    });

</script>
@endsection

