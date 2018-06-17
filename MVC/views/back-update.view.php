<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">contacts</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Formulaire de modification</h4>
                            
                            <?php $this->addModal("form", $config, $errors, $fieldValues); ?>

                            <!--
                            <form class="form-horizontal">
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Nom</label>
                                    <div class="col-md-10">
                                        <div class="form-group is-empty">
                                            <label class="control-label"></label>
                                            <input type="email" class="form-control" placeholder="Nom de la personne.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Prénom</label>
                                    <div class="col-md-10">
                                        <div class="form-group is-empty">
                                            <label class="control-label"></label>
                                            <input type="email" class="form-control" placeholder="Prénom de la personne.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Adresse e-mail</label>
                                    <div class="col-md-10">
                                        <div class="form-group is-empty">
                                            <label class="control-label"></label>
                                            <input type="email" class="form-control" placeholder="Adresse mail de la personne.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Rôle</label>
                                    <div class="col-md-10">
                                        <div class="form-group is-empty">
                                            <label class="control-label"></label>
                                            <input type="email" class="form-control" placeholder="Rôle de la personne.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Mot de passe</label>
                                    <div class="col-md-10">
                                        <div class="form-group is-empty">
                                            <label class="control-label"></label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-button form-button-center">
                                            <button type="submit" class="btn btn-fill btn-rose">Valider les modifications</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>