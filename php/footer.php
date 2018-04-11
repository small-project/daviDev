</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=URL?>assets/vendors/dll/jquery.min.js"></script>
<script src="<?=URL?>assets/vendors/parsley/parsley.min.js"></script>
<script src="<?=URL?>assets/vendors/dll/popper.min.js"></script>
<script src="<?=URL?>assets/js/bootstrap.min.js"></script>
<script src="<?=URL?>assets/vendors/dll/holder.min.js"></script>
<script src="<?=URL?>assets/vendors/dll/offcanvas.js"></script>

<script src="<?=URL?>assets/js/custom.js"></script>
<?php if($menu == 'corporate'){ ?>
<script src="<?=URL?>assets/js/modul/corporate.js"></script>
<?php } if($menu == 'order'){ ?>
<script src="<?=URL?>assets/js/modul/order.js"></script>
<?php } if($menu == 'payment'){ ?>
<script src="<?=URL?>assets/js/modul/kas.js"></script>
<?php } if($menu == 'management'){ ?>
    <script src="<?=URL?>assets/js/modul/management.js"></script>
<?php } ?>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>-->
<!--<script>-->
<!--    var ctx = document.getElementById("myChart");-->
<!--    var myChart = new Chart(ctx, {-->
<!--        type: 'line',-->
<!--        data: {-->
<!--            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],-->
<!--            datasets: [{-->
<!--                data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],-->
<!--                lineTension: 0,-->
<!--                backgroundColor: 'transparent',-->
<!--                borderColor: '#007bff',-->
<!--                borderWidth: 4,-->
<!--                pointBackgroundColor: '#007bff'-->
<!--            }]-->
<!--        },-->
<!--        options: {-->
<!--            scales: {-->
<!--                yAxes: [{-->
<!--                    ticks: {-->
<!--                        beginAtZero: false-->
<!--                    }-->
<!--                }]-->
<!--            },-->
<!--            legend: {-->
<!--                display: false,-->
<!--            }-->
<!--        }-->
<!--    });-->
<!--</script>-->
</body>
</html>
