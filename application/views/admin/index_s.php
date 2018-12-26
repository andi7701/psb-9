

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Halaman Administrator
			<!-- <small>Dashboard</small> -->
		</h1>
		<ol class="breadcrumb">
			<li class="active"><a href="javascript:void(0);"><i class="fa fa-home"></i> Dashboard</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
     <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-white">
              <div class="widget-user-image">
                <img class="img-circle" src="<?=base_url()?>assets/img/logo-sai-lead.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Penerimaan Siswa Baru</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <!-- <ul class="nav nav-stacked">
                <li><a href="#">Total Pendaftar <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Lolos Tahap Wawancara <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Lolos Tahap Sit In <span class="pull-right badge bg-green">12</span></a></li>
              </ul> -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
			<div class="col-sm-6">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Ringkasan Jumlah Pendaftaran</h3>
						<div class="box-tools pull-right">
							<button type="button" class="toggle-expand-btn btn btn-box-tool btn-sm">
								<i class="fa fa-expand"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="container" ></div>
					</div>
				</div>
			</div>

		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
	var columns = [];
</script>



<script>
	/* jQueryKnob */
	$('.knob').knob();

// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Pendaftaran Siswa Baru 2019/2020'
    },
    subtitle: {
        text: 'Klik salah satu bagain untuk melihat lebih lengkap.'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Calon<br/>'
    },

    "series":<?=json_encode($series)?>,
    "drilldown": {
        "series": <?=json_encode($drilldown)?>
    }
});
</script>
