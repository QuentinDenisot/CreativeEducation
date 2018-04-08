<div class="form-container">
    <div class="form-main">
        <div class="form-top">
            <div class="form-legend">
                Se connecter
            </div>
        </div>
        <form method="POST" action="<?php echo DIRNAME; ?>index/login">
            <div class="form-row">
                <i class="material-icons">account_circle</i>
                <input type="text" name="accountName" placeholder="Nom de compte">
            </div>
            <div class="form-row">
                <i class="material-icons">lock_outline</i>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
            <div class="form-row">
                <button class="btn btn-rose">
                    CONNEXION
                    <span class="btn-label btn-label-right">
                        <i class="material-icons">keyboard_arrow_right</i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>