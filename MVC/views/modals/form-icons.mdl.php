<form method="<?php echo $config['config']['method']?>" 
      action="<?php echo ($config['config']['action'] != '')?DIRNAME.$config['config']['action']:''; ?>">

    <?php foreach($config['input'] as $name => $params):
    
        if($name == "captcha"):

            continue;

        endif;

        if($params['type'] == 'text' || $params['type'] == 'email' || $params['type'] == 'password'): ?>
            
            <div class="form-row">
                <i class="material-icons"><?php echo $params['icon']; ?></i>
                <input 
                    type="<?php echo $params['type'];?>" 
                    name="<?php echo $name;?>"
                    placeholder="<?php echo $params['placeholder'];?>"
                    <?php echo (isset($params['required']))?"required='required'":""; ?>
                >
            </div>

        <?php endif;

    endforeach;

    if($config['captcha']): ?>

        <div class="form-row captcha">
            <img src="<?php echo DIRNAME.'public/captcha/captcha.php'; ?>">
        </div>

        <div class="form-row">
            <i class="material-icons"><?php echo $params['icon']; ?></i>
            <input 
                type="<?php echo $config['input']['captcha']['type']; ?>" 
                name="<?php echo $name;?>"
                placeholder="<?php echo $config['input']['captcha']['placeholder'];?>"
                <?php echo (isset($config['input']['captcha']['required']))?"required='required'":""; ?>
            >
        </div>

    <?php endif;

    if(is_array($errors) && count($errors) > 0):

        foreach($errors as $error): ?>

            <div class="form-error"><?php echo '• '.$error; ?></div>

        <?php endforeach;

    elseif($errors != ''): ?>

        <div class="form-error"><?php echo $errors; ?></div>

    <?php endif; ?>

    <div class="form-row">
        <button name="button" value="sendForm" class="btn btn-rose">
            <?php echo $config['button']['text']; ?>
            <span class="btn-label btn-label-right">
                <i class="material-icons"><?php echo $config['button']['icon']; ?></i>
            </span>
        </button>
    </div>

</form>