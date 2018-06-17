<form method="<?php echo $config['config']['method']?>" 
      action="<?php echo ($config['config']['action'] != '')?DIRNAME.$config['config']['action']:''; ?>" class="form-horizontal">
        
    <?php $idx = -1; ?>

    <?php foreach($config['input'] as $name => $params):
    
        if($name == "captcha"):

            continue;

        endif;

        if($params['type'] == 'text' || $params['type'] == 'email' || $params['type'] == 'password'):

            $idx++;
            $maxIdx = count($config['label']) - 1; ?>
            
            <div class="row">
                <label class="col-md-2 label-on-left"><?php echo $config['label'][$idx]; ?></label>
                <div class="col-md-10">
                    <div class="form-group is-empty">
                        <label class="control-label"></label>
                        <input 
                            type="<?php echo $params['type'];?>" 
                            name="<?php echo $name;?>" 
                            class="form-control" 
                            <?php echo (isset($params['required']))?"required='required'":"";
                                  echo (isset($fieldValues))?' value="'.$fieldValues[$name].'" ':""; ?>

                        >
                    </div>
                </div>
            </div>

        <?php endif;

    endforeach;

    if($config['captcha']): ?>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group is-empty">
                    <label class="control-label"></label>
                    <img src="<?php echo DIRNAME.'public/captcha/captcha.php'; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <label class="col-md-2 label-on-left"><?php echo $config['label'][$maxIdx - 1]; ?></label>
            <div class="col-md-10">
                <div class="form-group is-empty">
                    <label class="control-label"></label>
                    <input 
                        type="<?php echo $config['input']['captcha']['type']; ?>" 
                        name="<?php echo $name;?>"
                        placeholder="<?php echo $config['input']['captcha']['placeholder'];?>"
                        <?php echo (isset($config['input']['captcha']['required']))?"required='required'":""; ?>
                    >
                </div>
            </div>
        </div>

    <?php endif;

    // ADAPTER ÉGALEMENT LES ERREURS EN ATTENDANT DE LE FAIRE EN JQUERY

    if(is_array($errors) && count($errors) > 0):

        foreach($errors as $error): ?>

            <div class="form-error"><?php echo '• '.$error; ?></div>

        <?php endforeach;

    elseif($errors != ''): ?>

        <div class="form-error"><?php echo $errors; ?></div>

    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-button form-button-center">
                <button name="button" type="submit" class="btn btn-fill btn-rose"><?php echo $config['config']['button']; ?></button>
            </div>
        </div>
    </div>

</form>