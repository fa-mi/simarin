<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Chart Js <small>Some examples to get you started</small></h3>
      </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Bar Graph <small>Sessions</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <canvas id="bar-chart-grouped"></canvas>
          </div>
        </div>
      </div>
</div>
      <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Donut Graph <small>Sessions</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <canvas id="doughnut-chart1"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Donut Graph <small>Sessions</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <canvas id="doughnut-chart2"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [
        {
          label: "Africa",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2478]
        }, {
          label: "Europe",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions)'
      }
    }
});

new Chart(document.getElementById("doughnut-chart1"), {
    type: 'doughnut',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
new Chart(document.getElementById("doughnut-chart2"), {
    type: 'doughnut',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>
