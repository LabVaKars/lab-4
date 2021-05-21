<?php 
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $dateTime = isset($data["dateTime"]) ? $data["dateTime"] : false;
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
        type="<?php echo $dateTime ? "datetime-local": "date"; ?>" 
        class="form-control" 
        id="<?php echo $group; ?>" 
        name="<?php echo $group; ?>" 
        value="<?php echo $value;?>"
        <?php echo $disabled ? "disabled" : ""; ?>>
