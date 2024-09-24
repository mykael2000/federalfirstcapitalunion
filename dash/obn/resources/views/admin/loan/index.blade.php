@extends('layouts.admin.header')

@section('title', 'OBNK - Loan')

@section('css')
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
@endsection

@section('content')

<!-- START: Main Content-->
<main>
            <div class="container-fluid">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Loans</h4></div>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>S/n</th>
                                                <th>Loan type</th>
                                                <th>Amount</th>
                                                <th>Duration</th>
                                                <th>Loan reason</th>
                                                <th>Account name</th>
                                                <th>Status</th>
                                                <th>Date created</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @php
                                                $i=0;
                                            @endphp

                                            @foreach($loans as $loan)

                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $loan->loan_type }}</td>
                                                <td>{{ $loan->currency.$loan->amount }}</td>
                                                <td>{{ $loan->loan_duration }}</td>
                                                <td>{{ $loan->loan_reason }}</td>
                                                <td>{{ $loan->account_name }}</td>
                                                <td>
                                                    <span class="badge badge-primary">{{ $loan->status }}</span>
                                                </td>
                                                <td>{{ date('d/m/y', strtotime($loan->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.loans.update', $loan->id) }}?sta=approved" class="btn btn-primary btn-sm">Approve</a>
                                                    <a href="{{ route('admin.loans.update', $loan->id) }}?sta=rejected" class="btn btn-danger btn-sm">Reject</a>
                                                </td>
                                            </tr>

                                            @endforeach
                                            

                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
                <!-- END: Card DATA-->
                <div class="mb-5" style="margin-top:18rem"></div>
            </div>
        </main>
        <!-- END: Content-->


@endsection

@section('js')
<script src="{{asset('dist/vendors/datatable/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('dist/vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/jszip/jszip.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/dist/js/datatable.script.js')}}"></script>
@endsection