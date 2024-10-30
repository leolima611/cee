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