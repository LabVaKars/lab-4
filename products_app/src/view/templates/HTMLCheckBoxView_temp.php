<?php 
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $label = isset($data["label"]) ? $data["label"] : "";
    $group = $data["group"];
    $options = $data["options"];
?>
<?php if(isset($label) && strlen($label) > 0) {?>
    <label for="<?= $group; ?>">
        <?= $label; ?>
    </label>
<?php } ?>
<?php foreach ($options as $i=>$option) { ?>
    <div class="form-check">
        <input 
            type="checkbox" 
            class="form-check-input" 
            id="<?php echo $group.$i; ?>" 
            name="<?php echo $group.$i; ?>" 
            value="<?php echo $option["id"];?>"
            <?php echo $disabled ? "checked" : ""; ?>
            <?php echo (!$disabled && $option["checked"]) ? "checked" : ""; ?>>
        <label 
            class="form-check-label" 
            for="<?php echo $group.$i; ?>">
                <?php echo $option["name"] ?>
        </label>
    </div>
<?php } ?>
