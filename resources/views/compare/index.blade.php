@extends('layouts.main')


@section('section')

{{--  --}}
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>START COMPARE </h3>

          {{-- @if(Session::has('success'))
          <p class="alert alert-success">{{Session::get('success')}}</p>
          @endif

          @if(Session::has('delete'))
          <p class="alert alert-info">{{Session::get('delete')}}</p>
          @endif --}}
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
      {{-- <a type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success btn-sm text-white"><i class="fa fa-edit"></i> Create data</a> --}}
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Compare Alteration With PSO</h2>
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
               
              
                <a type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-success btn-sm text-white"><i class="bi bi-check2-circle"></i> Compare</a>
             
              <br />
            </div>
          </div>




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
                    {{-- <button  id="delete-all-data" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Reset Master</button> --}}
                    <a type="button" href="{{url('/compare')}}" class="btn btn-info btn-sm text-white"><i class="fa fa-refresh"></i> Refresh</a>
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
                      <th class="column-title no-link last"><span class="nobr">Status</span>
                      <th class="column-title no-link last"><span class="nobr">Remark</span>
                      </tr>
                    </thead>


                    {{-- <tbody>
                      <?//php
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
                    
                      <?//php $no++ ;?>

                        @endforeach
                    </tbody>  --}}
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
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">--SELECT DATA PSO--</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('/compare/startCompare')}}" method="POST">
            @csrf
          <div class="container">
  
            <div class="row">
              <div class="col-lg-12 ">
                <div class="form-group ic-cmp-int">
                  <div class="form-ic-cmp">
                    <i class="notika-icon notika-part"></i>
                  </div>
                  <div class="nk-int-st">
                    {{-- <select type="text" class="form-control mb-3 rounded-lg"
                      name="start_serial" placeholder="start_serial"required value="create_time"></select> --}}

                      <input class="form-control" list="datalistOptions" id="exampleDataList" name="create_time" placeholder="Type to search...">
										<datalist id="datalistOptions">
											@foreach($pso as $dd)
											<option value="{{$dd}}">{{$dd}}</option>
											@endforeach
										</datalist>
                  </div>
                </div>
              </div>
            </div>
  
          
            <div class="modal-footer">
              <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i> CANCEL</button>
              <button type="submit" class="btn btn-success btn-sm"> START <i class="bi bi-align-start"></i> </button>
            </div>
          </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>
@endsection