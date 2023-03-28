@extends('layouts.main')


@section('section')
 
<body> 
<!-- page content -->
<div class="container">
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

      {{-- <div class="btn-group btn-sm" role="group">
        <button type="button" class="btn btn-info"><i class="fa fa-edit"></i>Left</button>
        <button type="button" class="btn btn-success">Middle</button>
        <button type="button" class="btn btn-info">Right</button>
      </div>

      <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        Launch demo modal
      </button> --}}
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Backup Data</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
               
              <form action="{{url('/alteration/upload')}}" method="post" enctype="multipart/form-data" >
                {{-- @csrf

                <div class="form-group">
                  <input type="file" class="form-control-file border row-cols-lg-6" name="file" required>
                </div>
                <button type="submit" class="btn btn-secondary btn-sm"><i class="bi bi-upload"></i> Upload</button> --}}
                 
              </form>
              <br />
            </div>
          </div>



          {{------------------------------------ DATA ALTERATION---------------------------------- --}}
           <div class="x_panel">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  {{-- <h2>DATA BACKUP</small></h2> --}}
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      </div>
                    </li>
                   
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                  <p class="text-muted font-13 m-b-30">
                   
                  </p>
                 
                  <table id="datatable" class="table table-striped jambo_table bulk_action" >
                    {{-- <button  id="delete-all-data" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Reset Master</button> --}}
                    <div class="d-flex justify-content-end">
                      <a type="button" href="{{url('/backup')}}" class="btn btn-info btn-sm text-white"><i class="fa fa-refresh"></i> Refresh</a>                    
                    </div>
                 
                    {{-- <a type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success btn-sm text-white"><i class="fa fa-filter"></i> Filter Data</a>
                    <a type="button" href="{{url('/records/exportCSV')}}" class="btn btn-warning btn-sm text-black"><i class="fa fa-download"></i> Export CSV</a> --}}
                 
                    <thead>
                      <tr class="headings">
                      <th class="column-title text-center">No </th>
                      <th class="column-title text-center">Backup Date</th>
                      <th class="column-title text-center">Doc Number </th>
                      <th class="column-title text-center">Old Part Number </th>
                      <th class="column-title text-center">New Part Number </th>  
                      <th class="column-title text-center">Model </th>
                      <th class="column-title text-center">Start Serial BOM </th> 
                      <th class="column-title text-center">Running Date BOM</th>
                      <th class="column-title text-center">WU </th>
                      <th class="column-title text-center">Start Serial PSO </th> 
                      <th class="column-title text-center">End Serial PSO </th> 
                      <th class="column-title  text-center">Running Date PSO </th>
                      <th class="column-title  text-center">Qty</th>
                      <th class="column-title  text-center">Lot Qty PSO </th>
                      <th class="column-title text-center">Status Running Date</th>
                      <th class="column-title text-center">Remark Serial</th>
                      <th class="column-title text-center">PSO Date</th>
                      <th class="column-title text-center">SMT Date</th>          
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1
                      ?>
                      @foreach($data as $key => $value)           
                      <tr class="even pointer">
                            <td class="a-center">  {{$no}} </td>
                            <td class="a-center "> {{$value->recordDate}} </td>  
                            <td class="a-center">  {{$value->doc_no}} </td>                      
                            <td class="a-center">  {{$value->old_part_no}} </td>                             
                            <td class="a-center">  {{$value->new_part_no}} </td>                          
                            <td class="a-center "> {{$value->model}} </td>                             
                            <td class="a-center "> {{$value->start_serial}} </td>                             
                            <td class="a-center "> {{$value->running_date}} </td>
                            <td class="a-center "> {{$value->wu}} </td>  
                            {{-- //PSO --}}
                            <td class="a-center "> {{$value->start_serial_pso}} </td> 
                            <td class="a-center "> {{$value->end_serial}} </td> 
                            <td class="a-center "> {{$value->start_date}} </td> 
                            <td class="a-center "> {{$value->qty}} </td> 
                           
                            <td class="a-center "> {{$value->lot_qty}} </td> 
                           
                            <td class="a-center "> 
                              
                              <?php if ($value->running_date == $value->start_date ) {
                                echo '<span class= "badge badge-primary">ON SCHEDULE</span>';
                              }
                              if ($value->running_date > $value->start_date && $value->running_date!='') {
                                  echo '<span class= "badge badge-info">UP SCHEDULE</span>';
                              }

                               if ($value->running_date < $value->start_date && $value->running_date!='') {
                                echo '<span class= "badge badge-warning">DOWN SCHEDULE</span>';
                              }

                              if ($value->running_date =='' && $value->start_date !='') {
                                echo '<span class= "badge badge-light">NEW SCHEDULE</span>';
                              }    

                             if ($value->running_date =='' && $value->start_date ='') {
                                echo '<span class= "badge badge-secondary">NO SCHEDULE</span>';
                              }                 
                              ?> 
                            </td> 

                            <td class="a-center ">  
                              <?php if ($value->running_date == $value->start_date && $value->start_serial == $value->start_serial_pso) {
                                echo '<span class= "badge badge-success">OK</span>';
                              }
                              if ($value->running_date == $value->start_date && $value->start_serial != $value->start_serial_pso) {
                                echo '<span class= "badge badge-danger">MIDDLE LOT</span>';
                              }
                              if ($value->running_date != $value->start_date && $value->start_serial != $value->start_serial_pso) {
                                echo '<span class= "badge badge-danger">MIDDLE LOT</span>';
                              }

                              if ($value->running_date > $value->start_date  && $value->start_serial == $value->start_serial_pso) {
                                echo '<span class= "badge badge-warning">OK</span>';
                              }

                              if ($value->running_date < $value->start_date  && $value->start_serial == $value->start_serial_pso) {
                                echo '<span class= "badge badge-warning">OK</span>';
                              }
                              // if ($value->running_date =='') {
                              //   echo '-';
                              // }
                            ?>
                            </td>
                            <td class="a-center "> {{$value->pso_date}} </td> 
                            <td class="a-center "> {{$value->smt_date}} </td> 
                          </tr>
                    
                      <?php $no++ ;?>

                        @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
          </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
</div>



<!-- MODAL CREATE DATA MASTER -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">FILTER DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="date-form">
          @csrf
          <div class="container">
            <div class="row">				
              <div class="col-lg-12 ">
                <div class="form-group ic-cmp-int">
                  <div class="form-ic-cmp">
                    <i class="notika-icon notika"></i>
                  </div>
                  <div class="nk-int-st">
                    {{-- <input class="form-control" list="datalistOptions" id="exampleDataList" name="status" placeholder="Type to search...">
										<datalist id="datalistOptions"> --}}
                    <select id="status_" name="status" class="form-control" >
											@foreach($data as $key =>$value)
                      <option  value="ok">All Data</option>
											{{-- <option value="mid lot">Mid Lot</option> --}}
                    	@endforeach
										</datalist>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Central Modal Medium Success -->
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Modal Success</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis
            ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione fuga, enim,
            ab officiis totam.</p>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-success">Get it now <i class="far fa-gem ml-1 text-white"></i></a>
        <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Success-->
</body>


<script>


$(document).ready(function() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   

$('#date-form').submit(function(event) {
  event.preventDefault();

  var stts= $('#status_').val();
  // var endDate = $('#end-date').val();

  // send the AJAX request to the route
        $.ajax({
          url: "{{url('/records/filter/')}}",
          method: 'POST',
          data: {
            status: stts,
               
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
          var data=""
            console.log(data);
      
            $.each(response,function(key, value){

            data = data + "<tr>"
            data = data + "<td>"+value.id+"</td>"
            data = data + "<td>"+value.doc_no+"</td>"
            data = data + "<td>"+value.old_part_no+"</td>"
            data = data + "<td>"+value.new_part_no+"</td>"
            data = data + "<td>"+value.model+"</td>"
            data = data + "<td>"+value.start_serial+"</td>"
            data = data + "<td>"+value.running_date +"</td>"
            data = data + "<td>"+value.wu+"</td>"
            data = data + "<td>"+value.start_serial_pso+"</td>"
            data = data + "<td>"+value.end_serial+"</td>"
            data = data + "<td>"+value.pso_date+"</td>"
            data = data + "<td>"+value.lot_qty+"</td>"
            data = data + "<td>"+value.start_date+"</td>"
            data = data + "<td>"+value.smt_date+"</td>"
            data = data + "<td>"+value.status+"</td>"
            data = data + "<td>"+value.remark+"</td>"

            data = data + "</tr>"
            })
            $('tbody').html(data);
          }
        });
      });




  //   $("#export-csv").on("click",function(){
  //   let start_date = $('#start-date').val();
  //   let end_date = $('#end-date').val();

  // window.open("{{url('/record/download')}}"+"?start_date="+start_date+"&end_date="+end_date);	

// });

});









</script>
@endsection