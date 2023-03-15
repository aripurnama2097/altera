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

      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Record Filter</h2>
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
              <a type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success btn-sm text-white"><i class="fa fa-filter"></i> Filter Data</a>
              <br />
            </div>
          </div>


          {{------------------------------------ DATA ALTERATION---------------------------------- --}}
           <div class="x_panel">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>DATA COMPARE</small></h2>
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
                 
                  <table id="datatable-buttons" class="table table-striped jambo_table bulk_action" >
                    <br>
                    <br>
                    {{-- <button  id="delete-all-data" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Reset Master</button> --}}
                    <div class="d-flex justify-content-end">
                        {{-- <div class="btn-group btn-sm " role="group" aria-label="Basic example"> --}}
                      <a type="button" href="{{url('/records')}}" class="btn btn-info btn-sm text-white"><i class="fa fa-refresh"></i> Refresh</a>
                      <a type="button" href="{{url('/records/backup')}}" class="btn btn-warning btn-sm text-dark"><i class="fa fa-database"></i> Records Backup</a>
                      
                    {{-- </div> --}}
                  </div>
                 
                    {{-- <a type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success btn-sm text-white"><i class="fa fa-filter"></i> Filter Data</a>
                    <a type="button" href="{{url('/records/exportCSV')}}" class="btn btn-warning btn-sm text-black"><i class="fa fa-download"></i> Export CSV</a> --}}
                 
                    <thead>
                      <tr class="headings">
                      <th class="column-title text-center">No </th>
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
                      <th class="column-title  text-center">Lot Qty PSO </th>
                      <th class="column-title text-center">Status Running Date</th>
                      <th class="column-title text-center">Remark Serial</th>
                      <th class="column-title text-center">PSO Date</th>
                      <th class="column-title text-center">SMT Date</th>
                      
                      </tr>
                    </thead>
                    <tbody>            
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
<!-- MODAL SELECT PSO -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">FILTER DATA CATEGORY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/compare/startCompare')}}" method="POST">
          @csrf
        {{-- <div class="container"> --}}

          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-part"></i>
                </div>    
                <select class="custom-select custom-select-sm" name="create_time">  
                  <option selected style="padding:5px">---FILTER CATEGORY---</option>
                  @foreach($data as $dd)
                  <option class="text-danger;padding:10px" style="padding:5px">{{$dd}}</option>
                  @endforeach 
                </select>
              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button type="button"  id="cancel" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancel</button>
            <button type="submit"  id="submit" class="btn btn-success btn-sm"> Filter <i class="fa fa-filter"></i> </button>
          </div>

          <div class="d-flex justify-content-end">
            <div id="spinner" class="spinner" scriptstyle="display: none;">
              <div class="spinner-border text-info text-end" role="status">
                  <span class="sr-only">Loading...</span>
              </div>
            </div>
          </div>

        </form>
      </div>
     
    </div>
  </div>
</div>
</body>

<script>


$(document).ready(function() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   
  
  // Ketika select dropdown diubah nilainya
  // $('#status').change(function() {
  //   var selectedValue = $(this).val(); // Ambil nilai yang dipilih

  //   // Jika yang dipilih "Semua", tampilkan semua data
  //   if (selectedValue === 'all') {
  //     $('table tbody tr').show();
  //   } else {
  //     // Jika tidak, sembunyikan data yang tidak sesuai dan tampilkan yang sesuai
  //     $('table tbody tr').filter(function() {
  //       return $(this).find('td:nth-child(2)').text() !== selectedValue;
  //     }).hide();

  //     $('table tbody tr').filter(function() {
  //       return $(this).find('td:nth-child(2)').text() === selectedValue;
  //     }).show();
  //   }
  // });



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