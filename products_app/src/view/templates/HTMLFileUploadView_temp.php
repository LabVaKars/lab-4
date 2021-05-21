<?php 
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $label = isset($data["label"]) ? $data["label"] : "";
    $group = $data["group"];
?>
<?php if(isset($label) && strlen($label) > 0) {?>
    <label for="<?= $group; ?>">
        <?= $label; ?>
    </label>
<?php } ?>
    <input 
        type="file" 
        class="form-control" 
        id="<?php echo $group; ?>" 
        name="<?php echo $group; ?>"
        <?php echo $disabled ? "disabled" : ""; ?>>
