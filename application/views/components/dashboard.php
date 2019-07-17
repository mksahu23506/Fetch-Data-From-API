<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">SpacesX's Upcoming Launches</h1>
    <!-- <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm waves-effect waves-light" id="refresh"><i class="fas fa-sync fa-sm text-white-50"></i> Refresh</a> -->
  </div>

  <!-- Content Row -->
  <div class="row d-none">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row" id="addMoreData">
    <div class="col-lg-12 mb-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Flight, rocket and launch site details
            <a href="javascript:void(0);" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" id="refresh"><i class="fas fa-sync fa-sm text-white-50"></i> Refresh</a>
          </h6>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered table-hover table-responsive">
            <thead>
              <tr>
                <th>ID</th>
                <th>Flight Number</th>
                <th>Mission Name</th>
                <th>Launch Date</th>
                <th>Rocket ID</th>
                <th>Rocket Name</th>
                <th>Rocket Type</th>
                <th>Site ID</th>
                <th>Site Name</th>
                <th>Site Long Name</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody id="tableData">
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
<style>
  .overlay {
    height          : 100%;
    width           : 100%;
    display         : none;
    position        : fixed;
    z-index         : 1;
    top             : 0;
    left            : 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.4);
  }
  .overlay-content {
    position  : relative;
    top       : 25%;
    width     : 100%;
    text-align: center;
    margin-top: 30px;
  }

  .overlay span {
    padding        : 8px;
    text-decoration: none;
    font-size      : 36px;
    color          : #ffff00;
    display        : block;
    transition     : 0.3s;
  }
  .overlay span:hover, .overlay span:focus {
    color: #f1f1f1;
  }
  .overlay .closebtn {
    position : absolute;
    top      : 20px;
    right    : 45px;
    font-size: 60px;
  }
  @media screen and (max-height: 450px) {
    .overlay span {font-size: 20px}
    .overlay .closebtn {
      font-size: 40px;
      top      : 15px;
      right    : 35px;
    }
  }
  .dbl-spinner {
    margin           : 20% 0 0 50%;
    position         : absolute;
    width            : 75px;
    height           : 75px;
    border-radius    : 50%;
    background-color : transparent;
    border           : 4px solid transparent;
    border-top       : 4px solid #222;
    border-left      : 4px solid #222;
    -webkit-animation: 2s spin linear infinite;
    animation        : 2s spin linear infinite;
  }

  .dbl-spinner:nth-child(2) {
    border           : 4px solid transparent;
    border-right     : 4px solid #03A9F4;
    border-bottom    : 4px solid #03A9F4;
    -webkit-animation: 1s spin linear infinite;
    animation        : 1s spin linear infinite;
  }

  @-webkit-keyframes spin {
    from {
      -webkit-transform: rotate(0deg);
      transform        : rotate(0deg);
    }
    to {
      -webkit-transform: rotate(360deg);
      transform        : rotate(360deg);
    }
  }

  @keyframes spin {
    from {
      -webkit-transform: rotate(0deg);
      transform        : rotate(0deg);
    }
    to {
      -webkit-transform: rotate(360deg);
      transform        : rotate(360deg);
    }
  }
</style>
<!-- loader start -->
<div id="loader" class="col-md-12 overlay">
  <div class="dbl-spinner"></div>
  <div class="dbl-spinner"></div> 
  <div class="overlay-content">
    <span>Please Wait...</span>
  </div>
</div>
<!-- loader end -->
