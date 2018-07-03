<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Cours</h4>

                            <div class="ripple-container"></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Titre</th>
                                        <th>Statut</th>
                                        <th>Date d'ajout</th>
                                        <th>Créateur</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($courseArray as $course): ?>
                                            
                                                <tr>
                                                    <td><?php echo $course->getTitle(); ?></td>
                                                    <td><?php echo $course->getStatus(); ?></td>
                                                    <td><?php echo helpers::europeanDateFormat($course->getInsertedDate()); ?></td>
                                                    <td><?php echo $course->getId_user(); ?></td>
                                                    <td class="td-actions">
                                                        <form action="<?php echo DIRNAME.'course/update/'.$course->getId(); ?>">
                                                            <button class="btn btn-action btn-blue">
                                                                <i class="material-icons">build</i>
                                                            </button>
                                                        </form>
                                                        <form action="<?php echo DIRNAME.'course/delete/'.$course->getId(); ?>">
                                                            <button class="btn btn-action btn-red">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <p class="pull-right">
                                    <!--                                            <button class="btn btn-rose">
                                                VOIR PLUS
                                                <span class="btn-label btn-label-right">
                                                    <i class="material-icons">keyboard_arrow_right</i>
                                                  </span>
                                            </button>-->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>