@extends('layouts.main')
@section('section')



<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>START COMPARE </h3>
          {{-- @if(Session::has('success'))
          <p class="alert alert-primary">{{Session::get('success')}}</p>
          @endif --}}
          
        </div>


        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <div class="row ">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel border border-secondary rounded ">
            <div class="x_title">
              <h2>Compare Alteration With PSO</h2>
             
    
              {{-- @if(Session::has('delete'))
              <p class="alert alert-info">{{Session::get('delete')}}</p>
              @endif --}}
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




          {{-- <div class="x_panel">
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
                    <a type="button" href="{{url('/compare')}}" class="btn btn-info btn-sm text-white"><i class="fa fa-refresh"></i> Refresh</a>
             
                    <thead>
                      <tr class="headings">
                      <th class="column-title">No </th>
                      <th class="column-title">Doc Number </th>
                      <th class="column-title">Old Part Number </th>
                      </tr>
                    </thead>
                  </table>
                </div>
                </div>
            </div>
          </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
</div>



<!-- MODAL SELECT PSO -->
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
          {{-- <div class="container"> --}}
  
            <div class="row">
              <div class="col-lg-12 ">
                <div class="form-group ic-cmp-int">
                  <div class="form-ic-cmp">
                    <i class="notika-icon notika-part"></i>
                  </div>

                  {{-- <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Select</label>
                    <div class="col-md-9 col-sm-9 ">
                      <select class="form-control">
                      @foreach($pso as $dd)         
											<option value="{{$dd}}">{{$dd}}</option>
											@endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">AutoComplete</label>
                    <div class="col-md-9 col-sm-9 ">
                      <input type="text" name="create_time" id="autocomplete-custom-append"  id="exampleDataList"class="form-control col-md-10" />
                      <datalist id="autocomplete-custom-append">
                        @foreach($pso as $dd)
                        <option value="{{$dd}}">{{$dd}}</option>
                        @endforeach
                      </datalist>
                    </div>
                  </div> --}}

                  <select class="custom-select custom-select-sm" name="create_time">  
                    <option selected style="padding:5px">---SELECT DATA PSO---</option>
                    @foreach($pso as $dd)
                    <option class="text-danger;padding:10px" style="padding:5px">{{$dd}}</option>
                    @endforeach 
                  </select>

                {{-- <div class="nk-int-st">
                      <input class="form-control" list="datalistOptions" id="exampleDataList" name="create_time" placeholder="Type to search..." required>
										<datalist id="datalistOptions">
											@foreach($pso as $dd)
											<option value="{{$dd}}">{{$dd}}</option>
											@endforeach
										</datalist>
                  </div> --}}

                </div>
              </div>
            </div>
  
          
            <div class="modal-footer">
              <button type="button"  id="cancel" class="btn btn-warning btn-sm" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i> CANCEL</button>
              <button type="submit"  id="submit" class="btn btn-success btn-sm"> START <i class="bi bi-align-start"></i> </button>
            </div>

            <div class="d-flex justify-content-end">
              <div id="spinner" class="spinner" style="display: none;">
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

<script> 

$(document).ready(function() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

 
    const cancelButton = document.querySelector('#cancel');
    const submitButton = document.querySelector('#submit');
    // Mendapatkan spinner loading
    const spinner = document.querySelector('#spinner');
    // Ketika tombol submit diklik
    submitButton.addEventListener('click', function() {
      // Menampilkan spinner loading
      spinner.style.display = 'block';
    });

    cancelButton.addEventListener('click', function() {
      // Menampilkan spinner loading
    spinner.style.display = 'none';
    });



    $('#submit').click(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    
    Toast.fire({
      icon: 'info',
      title: 'Process Compare'
    })
    
    });

});

</script>
@endsection