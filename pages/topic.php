<!--<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>-->
 <?php 
    $TopicId = $_GET['id'];
    $selTopic = $conn->query("SELECT * FROM topic_cou WHERE idtopic_cou='$TopicId' ")->fetch(PDO::FETCH_ASSOC);
    //$selExamTimeLimit = $selExam['ex_time_limit'];
    //$exDisplayLimit = $selExam['ex_questlimit_display'];
	$tipeac = $selTopic['acti_tipes'];
	$selTipe = $conn->query("SELECT * FROM acti_tipes WHERE idacti_tipes='$tipeac' ")->fetch(PDO::FETCH_ASSOC);
 ?>


<div class="app-main__outer">
<div class="app-main__inner">
    <div class="col-md-12">
         <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            <?php echo $selTopic['name']; ?>
                            <div class="page-title-subheading">
                              <?php echo $selTipe['tipo']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions mr-5" style="font-size: 20px;">
                        <!--<form name="cd">
                          <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                          <label>Tiempo restante : </label>
                          <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
                      </form>--> 
                    </div>   
                 </div>
            </div>  
    </div>

    <div class="col-md-12 p-0 mb-4">
		<?php
		if($tipeac == 2){
		?>
		<embed src="pdf/<?=$selTopic['valor'];?>" type="application/pdf" width="100%" height="600">
		<?php
		}
		elseif($tipeac == 3){
		?>
		<b>Para esta actividad visita el siguiente link</b> <a href="<?php echo htmlspecialchars($selTopic['valor'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($selTopic['valor'], ENT_QUOTES, 'UTF-8'); ?></a>
		<?php
		}elseif($tipeac == 4){
		?>
		<iframe width="100%" height="600" src="<?=$selTopic['valor'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
		<?php
		}elseif($tipeac == 7){
		?>
		<embed src="<?=$selTopic['valor'];?>" <?=$selTopic['config'];?>>
		<?php
		}
		?>
    </div>
</div>
 
