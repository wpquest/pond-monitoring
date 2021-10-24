@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">

              <div class="card">
                <div class="card-header">Temperature</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 1</div>
                      <div id="temp1" style="height:100px; width:200px;"></div>
                    </div>
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 2</div>
                      <div id="temp2" style="height:100px; width:200px;"></div>
                    </div>
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 3</div>
                      <div id="temp3" style="height:100px; width:200px;"></div>
                    </div>
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 4</div>
                      <div id="temp4" style="height:100px; width:200px;"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header">Dissolved Oxygen</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 1</div>
                      <div id="chart_div" style="height:200px; width:200px;"></div>
                    </div>
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 2</div>
                      <div id="chart2_div" style="height:200px; width:200px;"></div>
                    </div>
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 3</div>
                      <div id="chart3_div" style="height:200px; width:200px;"></div>
                    </div>
                    <div class="col-sm-3">
                      <div class="medium text-muted">Kolam 4</div>
                      <div id="chart4_div" style="height:200px; width:200px;"></div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- CHARTING LIBRARY -->
   
   <!-- JUSTGAGE FOR TEMPERATURE GAUGE-->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>

   <script>
     var temp1 = new JustGage({
            id: "temp1", // the id of the html element
            value: 50,
            min: 0,
            max: 100,
            label: "(°C)",
            decimals: 2,
            gaugeWidthScale: 0.6

        });
      
      var temp2 = new JustGage({
            id: "temp2", // the id of the html element
            value: 50,
            min: 0,
            max: 100,
            label: "(°C)",
            decimals: 2,
            gaugeWidthScale: 0.6

        });

      var temp3 = new JustGage({
            id: "temp3", // the id of the html element
            value: 50,
            min: 0,
            max: 100,
            label: "(°C)",
            decimals: 2,
            gaugeWidthScale: 0.6

        });
      
      var temp4 = new JustGage({
            id: "temp4", // the id of the html element
            value: 50,
            min: 0,
            max: 100,
            label: "(°C)",
            decimals: 2,
            gaugeWidthScale: 0.6

        });

    // update the value randomly
    setInterval(() => {
     temp1.refresh(Math.random() * 100);
     temp2.refresh(Math.random() * 100);
     temp3.refresh(Math.random() * 100);
     temp4.refresh(Math.random() * 100);
    }, 3000)
   </script>

<!-- DISSOLVED OXYGEN -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var datado1 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['ppm', 5],
        ]);
        var datado2 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['ppm', 6],
        ]);
        var datado3 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['ppm', 4],
        ]);
        var datado4 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['ppm', 5],
        ]);

        var options = {
          width: 200, height: 200,
          min: 0,
          max: 10,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        var chart2 = new google.visualization.Gauge(document.getElementById('chart2_div'));
        var chart3 = new google.visualization.Gauge(document.getElementById('chart3_div'));
        var chart4 = new google.visualization.Gauge(document.getElementById('chart4_div'));

        chart.draw(datado1, options);
        chart2.draw(datado2, options);
        chart3.draw(datado3, options);
        chart4.draw(datado4, options);

        setInterval(function() {
          datado1.setValue(0, 1, 4 + Math.round(6 * Math.random()));
          chart.draw(datado1, options);
        }, 3000);
        setInterval(function() {
          datado2.setValue(0, 1, 4 + Math.round(6 * Math.random()));
          chart2.draw(datado2, options);
        }, 3000);
        setInterval(function() {
          datado3.setValue(0, 1, 4 + Math.round(6 * Math.random()));
          chart3.draw(datado3, options);
        }, 3000);
        setInterval(function() {
          datado4.setValue(0, 1, 4 + Math.round(6 * Math.random()));
          chart4.draw(datado4, options);
        }, 3000);
      }
    </script>

    
   

@endsection
