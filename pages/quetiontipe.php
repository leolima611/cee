<?php 
$selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' ");
if($selQuest->rowCount() > 0){
	$i = 1;
	while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) {
		$questId = $selQuestRow['eqt_id'];
?>
<tr>
    <td>
        <p>
            <b>
				<?php echo $i++ ; ?> .) <?php echo $selQuestRow['exam_question']; ?>
			</b>
        </p>
		<?php
		$selAns = $conn->query("SELECT * FROM question_answers WHERE eqt_id=".$selQuestRow['eqt_id']." ");
		if($selQuestRow['id_tipeq'] == 1){
			if($selAns->rowCount() > 0){
				$di = 1;
				while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
					if($di==2){
						$di=1;
						$divi = " ";
						$divo = "</div>";
					}elseif($di==1){
						$divi = "<div class=\"col-md-4 float-left\">";
						$divo = " ";
						$di = $di+1;
					}
			?>
			<?=$divi;?>
				<div class="form-group pl-4 ">
					<input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selAnsRow['id_qAns']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required>

					<label class="form-check-label" for="invalidCheck">
						<?php echo $selAnsRow['answer']; ?>
					</label>
				</div>
			<?=$divo;?>
			<?php
				}
			}
		}
		else if($selQuestRow['id_tipeq'] == 2){
			if($selAns->rowCount() > 0){
				while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
			?>
			<div class="col-md-6 float-left">
				<div class="form-group pl-4 ">
					<label>ingresa tu respuesta</label>
					<input name="answer[<?php echo $questId; ?>][correct]" class="form-control"  id="invalidCheck" required>
				</div>
			</div>
			<?php
				}
			}
		}
		else if($selQuestRow['id_tipeq'] == 3){
			if($selAns->rowCount() > 0){
				while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
			?>
			<div class="col-md-8 float-left">
				<div class="form-group pl-4 ">
					<label>ingresa tu respuesta</label>
					<textarea name="answer[<?php echo $questId; ?>][correct]" class="form-control" rows="2" id="invalidCheck" required></textarea>
				</div>
			</div>
			<?php
				}
			}
		}
		else if($selQuestRow['id_tipeq'] == 4){
			if($selAns->rowCount() > 0){
			?>
			<div class="col-md-4 float-left">
				<select class="form-control" name="answer[<?php echo $questId; ?>][correct]" id="invalidCheck" required="">
				<?php
					while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
				?>
					<option value="<?php echo $selAnsRow['id_qAns']; ?>"><?php echo $selAnsRow['answer']; ?></option>
				<?php
					}
				?>
				</select>
			</div>
			<?php
			}
		}
		if($selQuestRow['id_tipeq'] == 5){
			if($selAns->rowCount() > 0){
				$di = 1;
				$banin = 1;
				while ($selAnsRow = $selAns->fetch(PDO::FETCH_ASSOC)) {
					if($di==2){
						$di=1;
						$divi = " ";
						$divo = "</div>";
					}elseif($di==1){
						$divi = "<div class=\"col-md-4 float-left\">";
						$divo = " ";
						$di = $di+1;
					}
			?>
			<?=$divi;?>
				<div class="form-group pl-4 ">
					<input name="answer[<?php echo $questId; ?>][correct][<?=$banin;?>]" value="<?php echo $selAnsRow['id_qAns']; ?>" class="form-check-input" type="checkbox" value="" id="invalidCheck" >

					<label class="form-check-label" for="invalidCheck">
						<?php echo $selAnsRow['answer']; ?>
					</label>
				</div>
			<?=$divo;?>
			<?php
					$banin = $banin+1;
				}
			}
		}
		?>
    </td>
</tr>
<?php
	}
?>
<tr>
    <td style="padding: 20px;">
        <button type="button" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reiniciar</button>
        <input name="submit" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" id="submitAnswerFrmBtn">
    </td>
</tr>
<?php
}
else{ 
?>
	<b>Sin dudas por el momento</b>
<?php 
}
?>