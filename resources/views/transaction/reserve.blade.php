@extends('template/header')
@section('content')
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Transaction</h2>
                <small>Reservation Step 1</small>
            </div>
            
            @include('tooltips/tooltips')

            <div id="tootlt">
                
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-5 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">schedule</i>
                        </div>
                        <div class="content">
                           
                                <div class="text">DEPART FROM</div>
                                <input type="text" id="depart_from" class="form-control" placeholder="Type Here">
                            
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">schedule</i>
                        </div>
                        <div class="content">
                            
                                <div class="text">DEPART TO</div>
                                <input type="text" id="depart_to" class="form-control" placeholder="Type Here">
                            
                            </div>
                            
                        </div>
                    </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">schedule</i>
                        </div>
                        <div class="content">
                            
                                 
                                <div class="text">PROCESS</div>
                               <button type="button" class="form-control btn btn-default" id="cariRute">SEARCH</button>
                           
                            
                            </div>
                            
                        </div>
                    </div>

                </div>

            <!-- #END# Widgets -->
           

            <!-- CPU Usage -->
            <div class="row clearfix">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <table class="table table-responsive table-stripped">
                                        <thead>
                                            <th>Transportation</th>
                                            <th>Type</th>
                                            <th>Depart Time</th>
                                            <th>Arrive Time</th>
                                            <th>Price</th>
                                            <th>#</th>
                                        </thead>
                                        <tbody id="listTransportation_rute">
                                            <tr>
                                                <td colspan="6"><center><code>Result Showed Here</code></center></td>
                                            </tr>
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