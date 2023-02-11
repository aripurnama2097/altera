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
                  <label for="file">Upload CSV File:</label>
                  <input type="file" class="form-control-file" id="file" name="file">
                    <button type="submit" class=" btn btn-warning btn-sm" >Upload</button>
                    
                  </div> --}}
                  
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                      <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Button</button>
                    </div>
                  </div>
                
              </form>
              <br />
            </div>
          </div>
           <div class="x_panel">
            {{-- <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th>
                        <input type="checkbox" id="check-all" class="flat">
                      </th>
                      <th class="column-title">Doc Number </th>
                      <th class="column-title">Old Part Number </th>
                      <th class="column-title">New Part Number </th>
                      <th class="column-title">Model </th>
                      <th class="column-title">Serial </th>
                      <th class="column-title">WU </th>
                      <th class="column-title">Running Date</th>
                      <th class="column-title no-link last"><span class="nobr">Action</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>
      
                  <tbody>
                    @foreach($data as $key => $value)
                        
                   
                    <tr class="even pointer">
                      <td class="a-center ">   </td>
                      <td class="a-center "> <input type="checkbox" id="check-all" >
                         {{$value->doc_no}} </td>
                      <td class="a-center ">  <input type="checkbox" id="check-all" >
                        {{$value->old_part}} </td>
                      <td class="a-center "> 
                        <input type="checkbox" id="check-all" > {{$value->new_part}} </td>
                      <td class="a-center "> 
                        <input type="checkbox" id="check-all" > {{$value->model}} </td>
                      <td class="a-center "> 
                        <input type="checkbox" id="check-all" > {{$value->serial}} </td>
                      <td class="a-center ">  
                        <input type="checkbox" id="check-all" >{{$value->wu}} </td>
                      <td class="a-center "> 
                        <<input type="checkbox" id="check-all" >{{$value->running_date}} </td>
                      <td class=" last"><a href="#">View</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div> --}}

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
                          {{-- <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a> --}}
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
                  <table id="datatable-checkbox" class="table table-striped jambo_table bulk_action" style="width:100%">
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
                      @foreach($data as $key => $value)
                      <tr class="even pointer">
                            <td class="a-center"> {{$value->id}}
                            </td>
        
                            <td class="a-center"> 
                              {{$value->doc_no}} </td>
                            <td> 
                              {{$value->old_part}} </td>
                            <td class="a-center "> 
                              {{$value->new_part}} </td>
                            <td class="a-center "> 
                              {{$value->model}} </td>
                            <td class="a-center "> 
                              {{$value->start_serial}} </td>
                            <td class="a-center ">  
                            {{$value->wu}} </td>
                            <td class="a-center "> 
                            {{$value->running_date}} </td>
                            <td class=" last"><a href="#">View</a>
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
                  <input class="form-control rounded-lg" list="datalistOptions" id="exampleDataList" name="old_part" placeholder="Type to search...">
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
                  <input class="form-control rounded-lg" list="datalistOptions" id="exampleDataList" name="new_part" placeholder="Type to search..." >
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Save</button>
          </div>
        </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
</body>

<script>

$('import').submit(function(e) {
    e.preventDefault();
    let formData = new FormData();
    formData.append('file', $('#file')[0].files[0]);
    $.ajax({
        url: '/alteration/upload',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            console.log(data);
        }
    });
});
</script>
@endsection