@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <!-- TEMPERATURE   -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- DISSOLVED OXYGEN -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>


        Highcharts.chart('container', {

        title: {
            text: 'Today Temperatures (°C)'
        },


        yAxis: {
            title: {
                text: '°C'
            }
        },

        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%H:%M'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: Date.now(),
                pointInterval: 3600 * 1000,
                marker: {
                    enabled: false
                }
            }
        },

        series: [{
            name: 'Kolam 1',
            data: [29.9, 71.5, 89.4, 89.2, 94.0, 76.0, 89.6, 64.5, 88.4, 75.1, 95.6, 54.4, 29.9, 71.5, 96.4, 99.2, 44.0, 76.0,]
        }, {
            name: 'Kolam 2',
            data: [39.9, 81.5, 109.4, 109.2, 84.0, 86.0, 99.6, 74.5, 98.4, 86.1, 85.6, 64.4, 39.9, 81.5, 86.4, 89.2, 54.0, 86.0,]
        }, {
            name: 'Kolam 3',
            data: [19.9, 61.5, 70.4, 79.2, 84.0, 66.0, 99.6, 74.5, 88.4, 65.1, 85.6, 44.4, 19.9, 61.5, 86.4, 89.2, 34.0, 66.0,]
        }, {
            name: 'Kolam 4',
            data: [9.9, 1.5, 9.4, 9.2, 8.0, 6.0, 9.6, 4.5, 8.4, 5.1, 75.6, 74.4, 49.9, 91.5, 76.4, 79.2, 64.0, 96.0,]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

        });


    Highcharts.chart('container2', {

        title: {
            text: 'Today Dissolved Oxygen (ppm)'
        },


        yAxis: {
            title: {
                text: 'ppm'
            }
        },

        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%H:%M'
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: Date.now(),
                pointInterval: 3600 * 1000,
                marker: {
                    enabled: false
                }
            }
        },

        series: [{
            name: 'Kolam 1',
            data: [1, 2, 3, 1, 2, 3, 4, 2, 3, 1, 4, 3, 2, 2, 4, 2, 3, 1]
        }, {
            name: 'Kolam 2',
            data: [3, 4, 6, 4, 5, 3, 5, 5, 5, 4, 4, 3, 2, 3, 5, 4, 5, 3]
        }, {
            name: 'Kolam 3',
            data: [2, 2, 2, 3, 4, 5, 3, 5, 4, 5, 6, 5, 5, 4, 4, 3, 2, 2]
        }, {
            name: 'Kolam 4',
            data: [9, 8, 8, 7, 9, 6, 8, 9, 9, 8, 7, 7, 6, 7, 8, 9, 7, 7]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

        });



    </script>

    
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>

        $(document).ready(function() {
            let start = moment().startOf('month')
            let end = moment().endOf('month')

            $('#exportpdf').attr('href', '/reports/medicalrecord/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

            $('#created_at').daterangepicker({
                startDate: start,
                endDate: end
            }, function(first, last) {
                $('#exportpdf').attr('href', '/reports/medicalrecord/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
            })
        })
    </script>

@endsection
