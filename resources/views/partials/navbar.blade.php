<nav class="navbar navbar-expand-lg navbar-dark bg-navy">
  <div class="container">
    <a class="navbar-brand text-bold font-weight-bolder" href="#"> <i class="bi bi-arrows-move"></i> ALTERA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


      </ul>
      <form class="d-flex">
        <ion-icon name="log-out-outline"></ion-icon>
      </form>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          {{-- <a href="{{url('')}}" class="nav-link">
           <i class="bi bi-arrow-left-square"></i>
             Back To Home
         </a> --}}
     </li>
    </ul>

    </div>
  </div>
</nav>



 <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action ="{{url('/logout')}}" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </form>
    </div>
