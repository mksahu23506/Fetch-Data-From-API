</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo base_url('Dashboard/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="detailPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5> -->
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="detailPopupText">
        <!-- add text here for details -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-info" type="button" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('common/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('common/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('common/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('common/');?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="<?php echo base_url('common/');?>vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?php echo base_url('common/');?>js/demo/chart-area-demo.js"></script> -->
<!-- <script src="<?php echo base_url('common/');?>js/demo/chart-pie-demo.js"></script> -->
<script>
  $(document).ready(function(){
    var from = 1;

    triggerAjax(from);

    $('#refresh').on('click',function(){
      from += 10;
      triggerAjax(from);
      // $('#tableData').append('<tr><td>1</td><td>1234567890</td><td>1234567890</td><td>1234567890</td><td>1234567890</td><td>1234567890</td><td>1234567890</td><td>1234567890</td><td>1234567890</td><td>1234567890</td><td>1234567890</td></tr>');
    });

    // trigger ajax to get the data from api
    function triggerAjax(from)
    {
      // console.log('from:'+from+' to:'+eval(from+9));
      $.ajax({
        url     : '<?php echo base_url('Dashboard/getApiData');?>',
        type    : 'POST',
        // dataType: 'json',
        // data    : {param1: 'value1'},
        beforeSend: function(){
          // console.log('ajax started');
          $('#loader').show();
        },
      })
      .done(function(result) {
        if(result == 'ERROR')
        {
          console.log('Something Went Wrong. Please check with curl error.');
          $('#tableData').html('<tr><td colspan="11" class="alert-danger text-center">Connection Error! Please Try Later</td></tr>');
        }
        else
        {
          var api_data        = JSON.parse(result);
          var api_data_lenght = api_data.length;
          // console.log(api_data_lenght);
          var count = 0;
          $.each(api_data,function(index, el) {
            if(count == 10)
            {
              return false;
            }
            else
            {
              if(index == eval(from-1))
              {
                // console.log(el);
                var details   = (el.details==null)?'No Details Available':el.details;
                var suDetails = details
                if(details.length > 50)
                {
                  suDetails = details.substring(0,50);
                  suDetails = suDetails+'<a class="showDetailText dropdown-item" href="JavaScript:void(0);" data-toggle="modal" data-target="#detailPopup"> ...</a>';
                }
                $('#tableData').append('<tr><td>'+from+'</td><td>'+el.flight_number+'</td><td>'+el.mission_name+'</td><td>'+el.launch_date_local+'</td><td>'+el.rocket.rocket_id+'</td><td>'+el.rocket.rocket_name+'</td><td>'+el.rocket.rocket_type+'</td><td>'+el.launch_site.site_id+'</td><td>'+el.launch_site.site_name+'</td><td>'+el.launch_site.site_name_long+'</td><td data-details="'+details+'">'+suDetails+'</td></tr>');
                from++;
                count++;
                if(from > api_data_lenght)
                {
                  $('#noData').remove();
                  $('#tableData').append('<tr id="noData"><td colspan="11" class="alert-danger text-center">No Data To Show</td></tr>');
                }
              }
              // else
              // {
              //   console.log('from:'+from+' index:'+index);
              // }
            }
          });
        }
      })
      .fail(function(result) {
        console.log('Ajax Not Triggered');
        console.log(result);
      })
      .always(function(){
        // console.log("Ajax triggered");
        $('#loader').hide();
      });
    }

    setTimeout(function(){
      $('.showDetailText').each(function(){
        $(this).on('click',function(){
          var detailText = $(this).parent().data('details');
          $('#detailPopupText').text(detailText);
        });
      });
    },5000)
    // show model with details

    function showDetailText()
    {
      $('.showDetailText').each(function(){
        $(this).on('click',function(){
          var detailText = $(this).parent().data('details');
          $('#detailPopupText').text(detailText);
          // alert(detailText);
        });
      });
    }
  });
</script>
</body>

</html>
