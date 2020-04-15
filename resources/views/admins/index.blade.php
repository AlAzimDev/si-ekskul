@extends('admins.layout.header')

@section('judul-page','Dasbor')

@section('content')
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$users->count()}}</h2>
                        <span>Total Pengguna</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChartUsers"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$role2}}</h2>
                        <span>Pengguna Admin</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChartUserAdmin"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$role1}}</h2>
                        <span>Pengguna Petugas</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChartUserPetugas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$role0}}</h2>
                        <span>Pengguna Siswa</span>
                    </div>
                </div>
                <div class="overview-chart">
                    <canvas id="widgetChartUserSiswa"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row m-t-25">
  <div class="col-lg-12">
      <div class="au-card chart-percent-card">
          <div class="au-card-inner">
              <h3 class="title-2 tm-b-5">Persentasi Pemeriksaan Jawaban</h3>
              <div class="row no-gutters">
                  <div class="col-xl-6">
                      <div class="chart-note-wrap">
                          <div class="chart-note mr-0 d-block">
                              <span class="dot dot--blue"></span>
                              <span>Telah Diperiksa</span>
                          </div>
                          <div class="chart-note mr-0 d-block">
                              <span class="dot dot--red"></span>
                              <span>Belum Diperiksa</span>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-6">
                      <div class="percent-chart">
                          <canvas id="percent-chart-pemeriksaan"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('script')
<script>
(function ($) {
// USE STRICT
"use strict";

try {
    //WidgetChart 1
    var ctx = document.getElementById("widgetChartUsers");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: {!!collect(array_reverse($nama_bulans))!!},
          type: 'line',
          datasets: [{
            data: {!!collect(array_reverse($jumlah_users))!!},
            label: 'users',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }
    
    var ctx = document.getElementById("widgetChartUserAdmin");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: {!!collect(array_reverse($nama_bulans))!!},
          type: 'line',
          datasets: [{
            data: {!!collect(array_reverse($jumlah_useradmin))!!},
            label: 'users',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }
    
    var ctx = document.getElementById("widgetChartUserPetugas");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: {!!collect(array_reverse($nama_bulans))!!},
          type: 'line',
          datasets: [{
            data: {!!collect(array_reverse($jumlah_userpetugas))!!},
            label: 'users',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }
    
    var ctx = document.getElementById("widgetChartUserSiswa");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: {!!collect(array_reverse($nama_bulans))!!},
          type: 'line',
          datasets: [{
            data: {!!collect(array_reverse($jumlah_usersiswa))!!},
            label: 'users',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }

    // Percent Chart Jawaban
    var ctx = document.getElementById("percent-chart-pemeriksaan");
    if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "Pemeriksaan Jawaban Siswa",
              data: [{{$nilai_NOTNULL}}, {{$nilai_NULL}}],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Telah Diperiksa',
            'Belum Diperiksa'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }
} catch (error) {
    console.log(error);
}
})(jQuery);
</script>
@endsection