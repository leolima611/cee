<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
	<div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
				
				<li class="app-sidebar__heading"><?=$selCou['cou_name']?></li>
				
                <li class="app-sidebar__heading">Actividades disponibles</li>
				<li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                     Todas las actividades
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                    <?php 
                        
                        if($selTopic->rowCount() > 0)
                        {
                            while ($selTopicRow = $selTopic->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="#" id="startTopic" data-id="<?php echo $selTopicRow['idtopic_cou']; ?>" data-cou="<?=$selCou['cou_id'];?>" data-ac="<?=$selTopicRow['activity_num'];?>">
                                    <?php 
                                        $lenthOfTxt = strlen($selTopicRow['name']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selTopicRow['name'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selTopicRow['name'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No hay examenes disponiles
                            </a>
                        <?php }
                     ?>


                </ul>
                </li>
                <li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                     Examenes por Realizar
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul >
                    <?php 
                        
                        if($selExam->rowCount() > 0)
                        {
                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>"  >
                                    <?php 
                                        $lenthOfTxt = strlen($selExamRow['ex_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selExamRow['ex_title'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No hay examenes disponiles
                            </a>
                        <?php }
                     ?>


                </ul>
                </li>

                 <li class="app-sidebar__heading">EXAMENES TOMADOS</li>
                <li>
                  <?php 
                    $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE exmne_id='$exmneId' ORDER BY ea.examat_id  ");

                    if($selTakenExam->rowCount() > 0)
                    {
                        while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
                            <a href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>" >
                               
                                <?php echo $selTakenExamRow['ex_title']; ?>
                            </a>
                        <?php }
                    }
                    else
                    { ?>
                        <a href="#" class="pl-3">No has tomado ningun examen a&uacute;n</a>
                    <?php }
                    
                   ?>

                    
                </li>


                <li class="app-sidebar__heading">COMENTARIOS</li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#feedbacksModal" >
                        A&ntilde;adir comentarios                        
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>  