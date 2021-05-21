<?php 
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $label = isset($data["label"]) ? $data["label"] : "";
    $group = $data["group"];
    $dateValue = $data["dateValue"];
    $timeValue = $data["timeValue"];
?>
<?php if(isset($label) && strlen($label) > 0) {?>
    <label for="<?= $group; ?>">
        <?= $label; ?>
    </label>
<?php } ?>
    <div class="input-group">
        <input 
            type="date" 
            class="form-control" 
            id="<?php echo $group; ?>Date" 
            name="<?php echo $group; ?>Date" 
            value="<?php echo $dateValue;?>"
            <?php echo $disabled ? "disabled" : ""; ?>>
        <input 
            type="time" 
            class="form-control" 
            id="<?php echo $group; ?>Time" 
            name="<?php echo $group; ?>Time" 
            value="<?php echo $timeValue;?>"
            <?php echo $disabled ? "disabled" : ""; ?>>
    </div>