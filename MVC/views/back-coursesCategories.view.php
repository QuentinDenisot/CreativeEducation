<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">category</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Catégories cours</h4>

                            <div class="ripple-container"></div>
                            
                            <?php if(count($config['content']) > 0):

                                $this->addModal('table', $config); 

                            else:

                                echo "<b>Vous n'avez pas encore posté de cours</b>";

                            endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>