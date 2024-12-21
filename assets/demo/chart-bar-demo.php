// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php 
    // marcas
    include_once '../../modelo/dao/MarcaDAO.php';
    $listaMarcas = MarcaDAO::getInstance()->listAll();
    for ($i=0; $i<sizeof($listaMarcas);$i++){
        echo "\"".$listaMarcas[$i]->getNome()."\"";
        if ($i+1<sizeof($listaMarcas))
            echo ", ";
    }
    ?>],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(255,0,0,1)",
      data: [<?php 
      include_once '../../modelo/dao/VeiculoDAO.php';
      $sql = "where idMarca in ( Select marca.id from marca 
              where marca.nome = :marca)";
      $arrayDeParametros = array(":marca");
     for ($i=0; $i<sizeof($listaMarcas);$i++){
          $arrayDeValores = array($listaMarcas[$i]->getNome());
          $listaVeiculos = 
                VeiculoDAO::getInstance()->listWhere(
                $sql,$arrayDeParametros,$arrayDeValores);
          echo sizeof($listaVeiculos);
          if ($i+1<sizeof($listaMarcas))
            echo ", ";
      }
      ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
