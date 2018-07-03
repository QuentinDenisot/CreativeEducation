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
                            <h4 class="card-title">Rôles</h4>

                            <div class="ripple-container"></div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Libellé</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($roleArray as $role): ?>
                                            
                                                <tr>
                                                    <td><?php echo $role->getName(); ?></td>
                                                    <td><?php echo $role->getStatus(); ?></td>
                                                    <td class="td-actions">
                                                        <form action="<?php echo DIRNAME.'role/update/'.$role->getId(); ?>">
                                                            <button class="btn btn-action btn-blue">
                                                                <i class="material-icons">build</i>
                                                            </button>
                                                        </form>
                                                        <form action="<?php echo DIRNAME.'role/delete/'.$role->getId(); ?>">
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