@extends('operators.layout.header')

@section('judul-page','Dasbor')

@section('content')
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