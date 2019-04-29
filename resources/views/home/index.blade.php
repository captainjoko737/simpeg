@extends ('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $jumlah_fakultas }}</h3>

              <p>Program Studi</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">Detail info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $jumlah_dosen }}</h3>

              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">Detail info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>        
      </div>

      <div class="row">
          <div class="col-lg-8">
            <div id="chartdiv" style="width: 100%; height: 355px;"></div>
              <div id="data-table" hidden>

                @foreach ($fakultas as $key => $value)
                  <div class="data-row">
                      <input class="data-cell data-category" value="{{ $value->nama_prodi }}" />
                      <input class="data-cell data-value" value="{{ $value->dosen }}" type="number" step="1" />
                      <!-- <input class="data-button delete-button" type="button" value="X" /> -->
                  </div>
                @endforeach
                  
                  <!-- <div class="data-row">
                      <input class="data-cell data-category" value="China" />
                      <input class="data-cell data-value" value="1882" type="number" step="10" />
                      <input class="data-button delete-button" type="button" value="X" />
                  </div>
                  <div class="data-row">
                      <input class="data-cell data-category" value="Japan" />
                      <input class="data-cell data-value" value="1809" type="number" step="10" />
                      <input class="data-button delete-button" type="button" value="X" />
                  </div>
                  <div class="data-row">
                      <input class="data-cell data-category" value="Germany" />
                      <input class="data-cell data-value" value="1322" type="number" step="10" />
                      <input class="data-button delete-button" type="button" value="X" />
                  </div> 
                  <div class="data-row">
                      <input class="data-cell data-category" value="Teknik Industri" />
                      <input class="data-cell data-value" value="130" type="number" step="10" />
                      <input class="data-button delete-button" type="button" value="X" />
                  </div> -->
              </div>
              <br />
              <input type="button" hidden value="Add Row" onclick="addRow()" class="data-button" id="add-row" />
              <!-- ./col -->
          </div>
        </div>
    </section>
    
@endsection

@section('js')
  <!-- Chart -->
  <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
  
  <script type="text/javascript">
    var chart;
    AmCharts.ready(function () {
        // SERIAL CHART
        chart = new AmCharts.AmSerialChart();
        chart.dataProvider = generateChartData();
        chart.categoryField = "category";
        chart.marginRight = 0;
        chart.marginTop = 0;
        chart.autoMarginOffset = 0;
        // the following two lines makes chart 3D
        chart.depth3D = 20;
        chart.angle = 30;

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.labelRotation = 60;
        categoryAxis.dashLength = 5;
        categoryAxis.gridPosition = "start";


        // value
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.title = "Jumlah Dosen";
        valueAxis.integersOnly = true;
        valueAxis.dashLength = 5;
        chart.addValueAxis(valueAxis);

        // GRAPH            
        var graph = new AmCharts.AmGraph();
        graph.valueField = "value";
        graph.colorField = "color";
        graph.balloonText = "[[category]]: [[value]]";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 1;
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv");
    });

    function addRow() {
        jQuery('<div class="data-row"><input class="data-cell data-category"/><input class="data-cell data-value" type="number" step="10"/><input class="data-button delete-button" type="button" value="X"/></div>').appendTo('#data-table').each(function () {
            initRowEvents(jQuery(this));
        });
    }

    function generateChartData() {
        var chartData = [];
        jQuery('.data-row').each(function () {
            var category = jQuery(this).find('.data-category').val();
            var value = jQuery(this).find('.data-value').val();
            if (category != '') {
                chartData.push({
                    category: category,
                    value: value
                });
            }
        });
        return chartData;
    }

    function initRowEvents(scope) {
        scope.find('.data-cell')
            .attr('title', 'Click to edit')
            .on('keypress keyup change', function () {
                // re-generate chart data and reload it in chart
                chart.dataProvider = generateChartData();
                chart.validateData();
            }).end().find('.delete-button').click(function () {
                // remove the row
                $(this).parents('.data-row').remove();
                
                // re-generate chart data and reload it in chart
                chart.dataProvider = generateChartData();
                chart.validateData();
            });
    }

    jQuery(function () {
        // initialize the table
        initRowEvents(jQuery(document));
    });
  </script>

@endsection