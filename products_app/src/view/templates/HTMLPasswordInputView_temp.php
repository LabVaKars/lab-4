<?php 
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $label = isset($data["label"]) ? $data["label"] : "";
    $group = $data["group"];
    $value = $data["value"];
?>
<?php if(isset($label) && strlen($label) > 0) {?>
    <label for="<?= $group; ?>">
        <?= $label; ?>
    </label>
<?php } ?>
    <input 
        type="password" 
        class="form-control" 
        id="<?php echo $group; ?>" 
        name="<?php echo $group; ?>" 
        value="<?php echo $value;?>"
        <?php echo $disabled ? "disabled" : ""; ?>>
