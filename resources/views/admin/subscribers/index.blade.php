@extends('admin.layouts.app')
@section('title', 'Subscribers List')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"></section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Subscribers Table</h3>
                            </div>
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th>Email</th>
                                                        <th>Subscription Date</th>
                                                    </tr>
                                                </thead>
                                               <tbody>
                                                @forelse ($subscribers as $subscribe)
                                                <tr>
                                                    <td>{{ $subscribe->email }}</td>
                                                    <td>{{ date('M d, Y',strtotime($subscribe->created_at)) }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="2" align="center" class="text-danger">No Subscriber...</td>
                                                </tr>
                                                @endforelse
                                               </tbody>
                                            </table>
                                            {!! $subscribers->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <!-- Category Remove | Swal Notification-->
<script>
    $(document).ready(function() {
        $(document).on('click', '.remove-category', function() {
            let id = $(this).attr('name');
            Swal.fire({
                title: "Are You Sure?",
                text: "Are you sure you want to delete this category?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: '#28A745',
                cancelButtonText: 'No, cancel!',
                cancelButtonColor: '#DC3545',
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `{{ URL::to('admin/categories/destroy/${id}') }}`;
                }
            });
        });
    });

</script>
@endsection
