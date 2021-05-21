<?php 
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $label = isset($data["label"]) ? $data["label"] : "";
    $group = $data["group"];
    $rows = $data["rows"];
    $value = $data["value"];
?>
<?php if(isset($label) && strlen($label) > 0) {?>
    <label for="<?= $group; ?>">
        <?= $label; ?>
    </label>
<?php } ?>
    <textarea
        class="form-control" 
        id="<?php echo $group; ?>" 
        name="<?php echo $group; ?>"
        rows="<?php echo $rows; ?>"
        <?php echo $disabled ? "disabled" : ""; ?>><?php echo $value;?></textarea>
