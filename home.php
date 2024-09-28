<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == true) header("location:index.php");


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
       include("pages/exam.php");
     }
     else if($page == "result")
     {
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     
   }
   // Else ang home nga page mo display
   else
   {
     include("pages/home.php"); 
   }


 ?> 
<p>El tiempo que pases en esta página será registrado.</p>

    
	<script>
    let startTime = Date.now();
	let exmne_id = <?= $exmneId?>;

    window.addEventListener('beforeunload', function () {
        let endTime = Date.now();
        let timeSpent = Math.round((endTime - startTime) / 60000); // tiempo en segundos

        navigator.sendBeacon('tiempos/tip/tip.php', JSON.stringify({ tiempo: timeSpent, exmneId: exmne_id}));
    });
</script>

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


