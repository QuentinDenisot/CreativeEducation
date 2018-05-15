<div class="main-panel">
    <!-- <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </nav> -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">contacts</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Utilisateurs</h4>

                            <div class="ripple-container"></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Date d'inscription</th>
                                        <th>Statut</th>
                                        <th>Rôle</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $userObject = new User;
                                            $userArray = $userObject->getAll();

                                            foreach($userArray as $user): ?>
                                            
                                                <tr>
                                                    <td><?php echo $user->getLastname(); ?></td>
                                                    <td><?php echo $user->getFirstname(); ?></td>
                                                    <td><?php echo $user->getEmail(); ?></td>
                                                    <td><?php echo $user->getInsertedDate(); ?></td>
                                                    <td><?php echo $user->getStatus(); ?></td>
                                                    <td><?php echo $user->getId_role(); ?></td>
                                                    <td class="td-actions">
                                                        <form action="<?php echo DIRNAME.'user/update/'.$user->getId(); ?>">
                                                            <button class="btn btn-action btn-blue">
                                                                <i class="material-icons">build</i>
                                                            </button>
                                                        </form>
                                                        <form action="<?php echo DIRNAME.'user/delete/'.$user->getId(); ?>">
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
