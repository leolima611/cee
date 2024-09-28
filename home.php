<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");

$expireAfter = 5 * 60; //5 minutos de inactividad
// Verificar si la variable de tiempo de la última actividad está configurada
if (isset($_SESSION['last_activity'])) {
    // Calcular el tiempo de inactividad
    $secondsInactive = time() - $_SESSION['last_activity'];
    
    // Verificar si el tiempo de inactividad ha superado el tiempo de expiración
    if ($secondsInactive >= $expireAfter) {
        // Si ha superado, destruir la sesión y redirigir al usuario
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

// Actualizar el tiempo de la última actividad
$_SESSION['last_activity'] = time();


 ?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->
<?php include("includes/ui-theme.php"); ?>

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>



<!-- Condition If unza nga page gi click -->
<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "exam")
     {
		 $act=3;
       include("pages/exam.php");
     }
     else if($page == "result")
     {
		 $act=1;
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
		 $act=1;
       include("pages/myscores.php");
     }
     
   }
   // Else ang home nga page mo display
   else
   {
     include("pages/home.php"); 
	   $act=1;
   }


 ?> 
<p>El tiempo que pases en esta página será registrado.</p>

    
	<script>
    let startTime = Date.now();
	let exmne_id = <?= $exmneId?>;
	let actt = <?= $act?>;

    window.addEventListener('beforeunload', function () {
        let endTime = Date.now();
        let timeSpent = Math.round((endTime - startTime) / 60000); // tiempo en segundos

        navigator.sendBeacon('tiempos/tip/tip.php', JSON.stringify({ tiempo: timeSpent, exmneId: exmne_id, act: actt}));
    });
</script>

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


