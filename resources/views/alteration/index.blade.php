@extends('layouts.main')

@section('section')
 
<body> 
<!-- page content -->
<div class="container">
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>MASTER ALTERATION </h3>

          @if(Session::has('success'))
          <p class="alert alert-success">{{Session::get('success')}}</p>
          @endif

          @if(Session::has('delete'))
          <p class="alert alert-info">{{Session::get('delete')}}</p>
          @endif
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              {{-- <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary text-white" type="button">Submit</button>
              </span> --}}
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <a type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success btn-sm text-white"><i class="fa fa-edit"></i> Create data</a>
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Upload Master Data Alteration</h2>
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
                @csrf
                {{-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-primary btn-sm" type="submit" id="inputGroupFileAddon03">Upload</button>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile03"  name="file" aria-describedby="inputGroupFileAddon03">
                    <label class="custom-file-label" for="file">Choose file</label>
                  </div>
                </div>     --}}
               

                <div class="form-group">
                  <input type="file" class="form-control-file border row-cols-lg-6" name="file" required>
                </div>
                <button type="submit" class="btn btn-secondary btn-sm"><i class="bi bi-upload"></i> Upload</button>
                 
              </form>
              <br />
            </div>
          </div>



          {{------------------------------------ DATA ALTERATION---------------------------------- --}}
           <div class="x_panel">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>DATA ALTERATION</small></h2>
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
                 
                  <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                    <button  id="delete-all-data" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Reset Master</button>
                    <a type="button" href="{{url('/alteration')}}" class="btn btn-info btn-sm text-white"><i class="fa fa-refresh"></i> Refresh</a>
                    {{-- href="{{url('alteration/delete')}}" --}}
                    <thead>
                      <tr class="headings">
                      <th class="column-title">No </th>
                      <th class="column-title">Doc Number </th>
                      <th class="column-title">Old Part Number </th>
                      <th class="column-title">New Part Number </th>  
                      <th class="column-title">Model </th>
                      <th class="column-title">Serial </th>
                      <th class="column-title">WU </th>
                      <th class="column-title">Running Date</th>
                      <th class="column-title no-link last"><span class="nobr">Action</span>
                      </tr>
                    </thead>


                    <tbody>
                      <?php
                      $no = 1
                      ?>
                      @foreach($data as $key => $value)           
                      <tr class="even pointer">
                            <td class="a-center">  {{$no}} </td>
                            <td class="a-center">  {{$value->doc_no}} </td>                      
                            <td class="a-center">  {{$value->old_part_no}} </td>                             
                            <td class="a-center">  {{$value->new_part_no}} </td>                          
                            <td class="a-center "> {{$value->model}} </td>                             
                            <td class="a-center "> {{$value->start_serial}} </td>                             
                            <td class="a-center "> {{$value->wu}} </td>    
                            <td class="a-center "> {{$value->running_date}} </td>
                          
                            <td class=" last"><a href="#">View</a>
                            </td>
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



<!-- MODAL CREATE DATA MASTER -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">INPUT DATA MASTER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/alteration/create')}}" method="POST">
          @csrf
        <div class="container">

          <div class="row">				
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika"></i>
                </div>
                <div class="nk-int-st">
                <input type="text" class="form-control mb-3 rounded-lg" name="doc_no" placeholder="Doc Number" required>
                @foreach ($errors->get('doc_no') as $msg)
                <p class="text-danger">{{$msg}} </p>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
    

          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika"></i>
                </div>
                <div class="bootstrap-select fm-cmp-mg">
                  {{-- <select class="selectpicker" data-live-search="true" name="part_number">
                    <option value="">PART NUMBER</option>
                    @foreach($data_part as $dd)
                    <option value="{{$dd}}">{{$dd}}</option>
                    @endforeach
                  </select> --}}

                  <label for="exampleDataList" class="form-label">Old Part Number</label>
                  <input class="form-control rounded-lg" list="datalistOptions" id="exampleDataList" name="old_part_no" placeholder="Type to search...">
                  {{-- <datalist id="datalistOptions">
                    @foreach($data_part as $dd)
                    <option value="{{$dd}}">{{$dd}}</option>
                    @endforeach
                  </datalist> --}}
                </div>

              </div>
            </div>
          </div>
          <br>


          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika"></i>
                </div>
                <div class="bootstrap-select fm-cmp-mg">
                  {{-- <select class="selectpicker" data-live-search="true" name="part_number">
                    <option value="">PART NUMBER</option>
                    @foreach($data_part as $dd)
                    <option value="{{$dd}}">{{$dd}}</option>
                    @endforeach
                  </select> --}}

                  <label for="exampleDataList" class="form-label">New Part Number</label>
                  <input class="form-control rounded-lg" list="datalistOptions" id="exampleDataList" name="new_part_no" placeholder="Type to search..." >
                  {{-- <datalist id="datalistOptions">
                    @foreach($data_part as $dd)
                    <option value="{{$dd}}">{{$dd}}</option>
                    @endforeach
                  </datalist> --}}
                </div>

              </div>
            </div>
          </div>

      
          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-part"></i>
                </div>
                <div class="nk-int-st">
                  <input type="text" class="form-control mb-3 rounded-lg"
                    name="model" placeholder="Model" required>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-part"></i>
                </div>
                <div class="nk-int-st">
                  <input type="text" class="form-control mb-3 rounded-lg"
                    name="start_serial" placeholder="start_serial"required >
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-part"></i>
                </div>
                <div class="nk-int-st">
                  <input type="text" class="form-control mb-3 rounded-lg"
                    name="wu" placeholder="WU" required >
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 ">
              <div class="form-group ic-cmp-int">
                <div class="form-ic-cmp">
                  <i class="notika-icon notika-part"></i>
                </div>
                <div class="nk-int-st">
                  <input type="date" class="form-control mb-3 rounded-lg"
                    name="running_date" placeholder="WU"required value ="{{date('Y-m-d')}}">
                </div>
              </div>
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
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

    $('#delete-all-data').click(function() {
        if (confirm('Are you sure you want to reset all records?')) {
            $.ajax({
                url: "{{url('alteration/delete')}}",
                type: 'get',
                success: function(result) {
                    alert('All records master have been reset');
                }
            });
        }
    });
});






</script>
@endsection