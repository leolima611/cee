<?php 
include("../../../conn.php");
$id = $_GET['id'];
$idt = $_GET['idt'];

$selCourse = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);
$selAns = $conn->query("SELECT * FROM question_answers WHERE eqt_id='$id' ORDER BY id_qAns DESC ");

if($idt == 1){
?>
<fieldset style="width:543px;">
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR PREGUNTA</i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateQuestionFrm">
            <div class="form-group">
                <legend>Pregunta</legend>
                <input type="hidden" name="question_id" value="<?php echo $id; ?>">
				<input type="hidden" name="AnsId" value="1">
                <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
            </div>
			<?php
			$var = 'A';
			$varn = 1;
			$vclass = ""; 
				
			while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
				if($selAnsRow['tipe'] == "si"){$vclass = "class=\"text-success\"";}else{$vclass = ""; }
			?>
			<div class="form-group">
                <legend <?=$vclass;?>>Opci&oacute;n <?=$var?> - id:<?=$selAnsRow['id_qAns']?></legend>
                <input type="" name="v<?=$selAnsRow['id_qAns']?>" value="<?php echo $selAnsRow['answer']; ?>" class="form-control" required>
            </div>
			<?php
				$var++;
				$varn++;
			}
			?>
            <div class="form-group">
                <label>Respuesta Correcta</label>
				<select class="form-control" name="correctAnswer" required>
					<?php
			  		$selAns2 = $conn->query("SELECT * FROM question_answers WHERE eqt_id='$id' ORDER BY id_qAns DESC ");
					$var = 'A';
					$varn = 1;

					while ($selAnsRow2 = $selAns2->fetch(PDO::FETCH_ASSOC)) {
					?>
					<option value="<?=$selAnsRow2['id_qAns']?>"><?=$var?> - id:<?=$selAnsRow2['id_qAns']?></option>
					<?php
						$var++;
						$varn++;
					}
					?>
				</select>
            </div>


            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
            </div>
        </form>
    </div>
</fieldset>
<?php
}
elseif($idt == 2){
?>
<fieldset style="width:543px;">
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR PREGUNTA</i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateQuestionFrm">
            <div class="form-group">
                <legend>Pregunta</legend>
                <input type="hidden" name="question_id" value="<?php echo $id; ?>">
				<input type="hidden" name="AnsId" value="2">
                <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
            </div>
			<?php
			$var = 'A';
			$varn = 1;
			$vclass = ""; 
				
			while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
				if($selAnsRow['tipe'] == "si"){$vclass = "class=\"text-success\"";}else{$vclass = ""; }
			?>
			<div class="form-group">
                <legend <?=$vclass;?>>Respuesta</legend>
                <input type="" name="v<?=$selAnsRow['id_qAns']?>" value="<?php echo $selAnsRow['answer']; ?>" class="form-control" required>
            </div>
			<?php
				$var++;
				$varn++;
			}
			?>
            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
            </div>
        </form>
    </div>
</fieldset>
<?php
}
elseif($idt == 3){
?>
<fieldset style="width:543px;">
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR PREGUNTA</i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateQuestionFrm">
            <div class="form-group">
                <legend>Pregunta</legend>
                <input type="hidden" name="question_id" value="<?php echo $id; ?>">
				<input type="hidden" name="AnsId" value="3">
                <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
            </div>
			<?php
			$var = 'A';
			$varn = 1;
			$vclass = ""; 
				
			while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
				if($selAnsRow['tipe'] == "si"){$vclass = "class=\"text-success\"";}else{$vclass = ""; }
			?>
			<div class="form-group">
                <legend <?=$vclass;?>>Respuesta</legend>
				<textarea name="v<?=$selAnsRow['id_qAns']?>" class="form-control" rows="2" required=""><?php echo $selAnsRow['answer']; ?></textarea>
            </div>
			<?php
				$var++;
				$varn++;
			}
			?>
            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
            </div>
        </form>
    </div>
</fieldset>
<?php
}
elseif($idt == 4){
?>
<fieldset style="width:543px;">
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR PREGUNTA</i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateQuestionFrm">
            <div class="form-group">
                <legend>Pregunta</legend>
                <input type="hidden" name="question_id" value="<?php echo $id; ?>">
				<input type="hidden" name="AnsId" value="4">
                <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
            </div>
			<?php
			$var = 'A';
			$varn = 1;
			$vclass = ""; 
				
			while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
				if($selAnsRow['tipe'] == "si"){$vclass = "class=\"text-success\"";}else{$vclass = ""; }
			?>
			<div class="form-group">
                <legend <?=$vclass;?>>Opci&oacute;n <?=$varn?> - id:<?=$selAnsRow['id_qAns']?></legend>
                <input type="" name="v<?=$selAnsRow['id_qAns']?>" value="<?php echo $selAnsRow['answer']; ?>" class="form-control" required>
            </div>
			<?php
				$var++;
				$varn++;
			}
			?>
            <div class="form-group">
                <label>Respuesta Correcta</label>
				<select class="form-control" name="correctAnswer" required>
					<?php
			  		$selAns2 = $conn->query("SELECT * FROM question_answers WHERE eqt_id='$id' ORDER BY id_qAns DESC ");
					$var = 'A';
					$varn = 1;

					while ($selAnsRow2 = $selAns2->fetch(PDO::FETCH_ASSOC)) {
					?>
					<option value="<?=$selAnsRow2['id_qAns']?>"><?=$varn?> - id:<?=$selAnsRow2['id_qAns']?></option>
					<?php
						$var++;
						$varn++;
					}
					?>
				</select>
            </div>


            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
            </div>
        </form>
    </div>
</fieldset>
<?php
}
elseif($idt == 5){
?>
<fieldset style="width:543px;">
    <legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;ACTUALIZAR PREGUNTA</i></legend>
    <div class="col-md-12 mt-4">
        <form method="post" id="updateQuestionFrm">
            <div class="form-group">
                <legend>Pregunta</legend>
                <input type="hidden" name="question_id" value="<?php echo $id; ?>">
				<input type="hidden" name="AnsId" value="5">
                <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
            </div>
			<?php
			$var = 'A';
			$varn = 1;
			$vclass = ""; 
				
			while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
				if($selAnsRow['tipe'] == "si"){$vclass = "class=\"text-success\"";}else{$vclass = ""; }
			?>
			<div class="form-group">
                <legend <?=$vclass;?>>Opci&oacute;n <?=$var?> - id:<?=$selAnsRow['id_qAns']?></legend>
				<input type="checkbox" name="s<?=$selAnsRow['id_qAns']?>" id="exampleCheckbox">
                <input type="" name="v<?=$selAnsRow['id_qAns']?>" value="<?php echo $selAnsRow['answer']; ?>" class="form-control" required>
            </div>
			<?php
				$var++;
				$varn++;
			}
			?>
            <div class="form-group" align="right">
                <button type="submit" class="btn btn-sm btn-primary">ACTUALIZAR AHORA</button>
            </div>
        </form>
    </div>
</fieldset>
<?php
}
?>






