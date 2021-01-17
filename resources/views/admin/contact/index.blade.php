
@extends('layouts.dashboard_app')

@section('contact')
active
@endsection
@section('dashboard_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
        <span class="breadcrumb-item active">contact</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Contact page</h5>
        </div>
    </div>
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <div class="card" class="">
                        <card class="card-header">
                        Contact list
                        </card>
                        <div class="card-body">
                            @if (session('delete_status'))
                            <div class="alert alert-danger">
                                {{ session('delete_status') }}
                            </div>
                            @endif
                            @if ($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </div>
                            @endif
                            <table class="table" id="category_table">
                                <thead>
                                        <tr>
                                            <th scope="col">serial no.</th>
                                            <th scope="col">contact_name</th>
                                            <th scope="col">contact_email</th>
                                            <th scope="col">contact_subject</th>
                                            <th scope="col">contact_phone</th>
                                            <th scope="col">contact_message</th>
                                            <th scope="col">contact attachement</th>
                                            <th scope="col">created_at</th>
                                            <th scope="col">action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @forelse ($contacts as $contact)contact
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $contact->contact_name }}</td>
                                            <td>{{ $contact->contact_email }}</td>
                                            <td>{{ $contact->contact_subject }}</td>
                                            <td>{{ $contact->contact_phone }}</td>
                                            <td>{{ $contact->contact_message }}</td>
                                            <td> 
                                                @if ($contact->contact_attachement)
                                                    <a href="{{ url('contact/upload/download') }}/{{ $contact->id }}"><i class="fa fa-download"></i></a> |
                                                    <a target="_blank" href="{{ asset('storage') }}/{{ $contact->contact_attachement }}"><i class="fa fa-file"></i></a>
                                                @endif
                                            </td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>
                                                <a href="{{ url('delete/contact') }}/{{ $contact->id }}" type="button" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="50" class="text-center text-danger">No data available</td>
                                        </tr>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer_script')
<script>
$(document).ready(function() {
    $('#category_table').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
});
</script>
@endsection
