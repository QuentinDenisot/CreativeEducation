<form method="<?php echo $config['config']['method']?>" action="<?php echo DIRNAME.$config['config']['action']; ?>">
        
    <?php $idx = -1; ?>

    <?php foreach($config['input'] as $name => $params): ?>
    
        <?php if($params['type'] == 'text' || $params['type'] == 'email' || $params['type'] == "password"):

            $idx++;
            $maxIdx = count($config['icon']) - 1; ?>
            
            <div class="form-row">
                <i class="material-icons"><?php echo $config['icon'][$idx]; ?></i>
                <input 
                    type="<?php echo $params["type"];?>" 
                    name="<?php echo $name;?>"
                    placeholder="<?php echo $params["placeholder"];?>"
                    <?php echo (isset($params["required"]))?"required='required'":""; ?>
                >
            </div>

        <?php endif; ?>

    <?php endforeach; ?>

    <pre>
        <?php print_r($errors);?>
    </pre>

    <div class="form-row">
        <button class="btn btn-rose">
            <?php echo $config['config']['button']; ?>
            <span class="btn-label btn-label-right">
                <i class="material-icons"><?php echo $config['icon'][$maxIdx]; ?></i>
            </span>
        </button>
    </div>

</form>