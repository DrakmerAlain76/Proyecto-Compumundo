<!DOCTYPE html>
<html>
<head>
<title>barra</title>
<!-- <link rel="stylesheet" type="text/css" href="../style/style.css"> -->
<style type="text/css">
BODY {
     width: 550px; 
}

#chart-container {
    width: 100%;
    height: auto;
    text-align: center;
    padding: 15%;
    padding-left: 75%;
}
h1{
    font-family:arial ;
    color: #6384FF;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
    <br>
    <center>
        <div id="chart-container">
            <center><h1>GRÁFICOS EN TORTA</h1></center>
            <canvas id="graphCanvas"></canvas>
        </div>
    </center>

    <script>
        $(document).ready(function () {
            showGraph();
        });
        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var reservas = [];//marks /reserva

                    for (var i in data) {
                        name.push(data[i].nombre_curso);//student_name /departamento /nombre
                        reservas.push(data[i].reservas);//marks /reserva
                    }

                    var chartdata = {
                        labels: name,
                        title: {
          text: "Monochrome Pie"
        },
        

                        datasets: [
                            {
                                label: 'Cursos Reservados',//Student Marks /TITULO
                                data: reservas,///marks /reservas
                                hoverBorderWidth: 5,
                                backgroundColor: [
                                                    "#FF6384",
                                                    "#63FF84",
                                                    "#84FF63",
                                                    "#8463FF",
                                                    "#6384FF",
                                                    "#FF6384",
                                                    "#63FF84",
                                                    "#84FF63",
                                                    "#8463FF",
                                                    "#6384FF"
                                                ]
                            }
                            
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>
</html>