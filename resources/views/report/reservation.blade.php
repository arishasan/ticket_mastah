@extends('template/header')
@section('content')
 
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Report Reservation
                    <small>Just click any button upside data table.</small>
                </h2>
            </div>
                
            <div class="row clearfix" id="hold_data_rute">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Choose your export type.
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="table_rute_report" style="cursor: cell;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Reservation Date</th>
                                            <th>Customer ID</th>
                                            <th>Depart Date</th>
                                            <th>Seat Code</th>
                                            <th>Price</th>
                                            <th>Rute ID</th>
                                            <th>Inputted By</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Reservation Date</th>
                                            <th>Customer ID</th>
                                            <th>Depart Date</th>
                                            <th>Seat Code</th>
                                            <th>Price</th>
                                            <th>Rute ID</th>
                                            <th>Inputted By</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            foreach ($datareservation as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->reservation_code }}</td>
                                                        <td>
                                                        <?php echo date('d/m/Y H:m:s',strtotime($value->reservation_date)) ?>
                                                        </td>
                                                        <td>{{ $value->customerid }}</td>
                                                        <td>
                                                        <?php echo date('d/m/Y',strtotime($value->depart_date)) ?>
                                                        </td>
                                                        <td>{{ $value->seat_code }}</td>
                                                        <td>{{ $value->price }}</td>
                                                        <td>{{ $value->ruteid }}</td>
                                                        <td>{{ $value->userid }}</td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


       



      
        </div>
    </section>



@endsection