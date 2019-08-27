
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><a href="http://siskom.undip.ac.id/" target="_blank"> Departement of Computer Engineering &nbsp</a></b> <img src="<?php echo base_url('assets') ?>/image/undip.png"  class="img-circle" alt="1st" height="20px;">
    </div>
    <strong>Copyright &copy; 2018<a href="https://www.facebook.com/n.aynxqta?hc_ref=ARTe2q2q63HaAQ6m6V6mC2OAZy6wWtA1OxtQdSi-_SIusUO_f4HRaONIaMTei4aby68&fref=nf" target="_blank"> Nanda Maulida</a>.</strong> All rights
    reserved.
  </footer>
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/back/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/back/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/bower_components/chart.js/Chart.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/back/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/back/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/back/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/back/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/back/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/back/dist/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() ?>assets/back/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/back/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/back/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/back/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/back/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/back/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<script>

tinymce.init({
  selector: '.tinymce',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});
</script>
<script type="text/javascript">
    $(document).ready(function(){setTimeout(function(){$(".alert").fadeIn('slow');}, 500);});
    setTimeout(function(){$(".alert").fadeOut('slow');}, 3000);
</script>
<script>
  var masuk, keluar, lalinurl;
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    lalinurl = "<?= base_url('dashboard/getLalinBarang') ?>";
    $.ajax({
        url: lalinurl,
        type: "GET",
        async: false,
        success: function(data) {
          var data = JSON.parse(data);
          masuk = data.masuk;
          keluar = data.keluar;
        }, 
        error: function (res) {
          console.log(res);
        }
    });

    // console.log(masuk);
    var areaChartData = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember'],
      datasets: [
        {
          label               : 'Masuk',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : masuk
        },
        {
          label               : 'Keluar',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : keluar
        },
      ]
    }
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
</body>
</html>