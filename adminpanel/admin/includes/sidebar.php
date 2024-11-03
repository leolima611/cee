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
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading"><a href="home.php">DASHBOARD</a></li>
								
								<?php
								if($datosAd['role']==2){
								?>
                                <li class="app-sidebar__heading">MANEJO DE CURSOS</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                         CURSOS
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalForAddCourse">
                                                <i class="metismenu-icon"></i>
                                                AGREGAR CURSOS
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=manage-course">
                                                <i class="metismenu-icon">
                                                </i>ADMINISTRAR CURSOS
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                               
                                <li class="app-sidebar__heading">MANEJO DE EXAMENES</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                         EXAMENES
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalForExam">
                                                <i class="metismenu-icon"></i>
                                                AGREGAR EXAMENES
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=manage-exam">
                                                <i class="metismenu-icon">
                                                </i>MANEJO DE EXAMENES
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
								
								<?php
								}
								?>
								
								<?php
								if($datosAd['role']==1){
								?>
								
								<li class="app-sidebar__heading">Administradores</li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#modalForAddAdmin">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>AGREGAR ADMINISTRADOR
                                    </a>
                                </li>
                                <li>
                                    <a href="home.php?page=manage-admin">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>ADMINISTRAR INTEGRANTES
                                    </a>
                                </li>
								
								<li class="app-sidebar__heading">Archivos</li>
                                <li>
                                    <a href="home.php?page=manage-files">
                                        <i class="metismenu-icon pe-7s-folder">
                                        </i>ADMINISTRAR ARCHIVOS PDF
                                    </a>
                                </li>
								<li>
                                    <a href="home.php?page=manage-aud">
                                        <i class="metismenu-icon pe-7s-folder">
                                        </i>ADMINISTRAR ARCHIVOS DE AUDIO
                                    </a>
                                </li>
								
								<?php
								}
								?>
								
                                <li class="app-sidebar__heading">MANEJO DE ALUMNOS</li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#modalForAddExaminee">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>AGREGAR ALUMNOS
                                    </a>
                                </li>
                                <li>
                                    <a href="home.php?page=manage-examinee">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>ADMINISTRAR ALUMNOS
                                    </a>
                                </li>
								
								<?php
								if($datosAd['role']==2){
								?>
								
                                <li class="app-sidebar__heading">EVALUACIONES</li>
                                <li>
                                    <a href="home.php?page=ranking-course">
                                        <i class="metismenu-icon pe-7s-cup">
                                        </i>VER EVALUACIONES
                                    </a>
                                </li>


                                <li class="app-sidebar__heading">CALIFICACIONES</li>
                                <li>
                                    <a href="home.php?page=examinee-result">
                                        <i class="metismenu-icon pe-7s-cup">
                                        </i>RESULTADOS
                                    </a>
                                </li>
								<?php
								}
								?>
                            </ul>
                        </div>
                    </div>
                </div>  