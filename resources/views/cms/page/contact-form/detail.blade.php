@extends('cms.template.panel')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Detail Kontak Form</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td>{{ DateHelper::fullDateFormat($contact_form->created_at) }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $contact_form->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact_form->email }}</td>
                        </tr>
                        <tr>
                            <th>Telepon</th>
                            <td>{{ $contact_form->phone }}</td>
                        </tr>
                        <tr>
                            <th>Subjek</th>
                            <td>{{ $contact_form->subject }}</td>
                        </tr>
                        <tr>
                            <th>Pesan</th>
                            <td>{{ $contact_form->message }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $contact_form->is_read ? 'Dibaca' : 'Belum Dibaca' }}</td>
                        </tr>
                    </table>
                    <div class="card-action">
                        <a href="{{ route('cms.contact-form.index') }}" class="btn btn-black"><span class="icon-action-undo"></span> Kembali</a>
                        @if($contact_form->is_read)
                            <a class="btn btn-warning text-white float-end me-2" href="{{ route('cms.contact-form.change-status', $contact_form->id) }}"><span class="fas fa-eye-slash"></span> Tandai Belum Dibaca</a>
                        @else
                            <a class="btn btn-success float-end me-2" href="{{ route('cms.contact-form.change-status', $contact_form->id) }}"><span class="fas fa-eye"></span> Tandai Dibaca</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

