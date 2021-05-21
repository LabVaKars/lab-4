<?php  
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $label = isset($data["label"]) ? $data["label"] : "";
    $group = $data["group"];
    $options = $data["options"];
    $selected = $data["selected"];
?>
<?php if(isset($label) && strlen($label) > 0) {?>
    <label for="<?= $group; ?>">
        <?= $label; ?>
    </label>
<?php } ?>
    <select class="form-control" name="<?= $group; ?>" >
        <option 
            id="<?= $group."null"; ?>" 
            value="" selected hidden disabled>
            ...
        </option>
        <?php foreach ($options as $i=>$option) { ?>
            <option 
                id="<?= $group."option".$i; ?>" 
                value="<?= $option["id"]; ?>"
                <?= (!$disabled && ($selected == $option["id"])) ? "selected" : ""; ?>
                <?= $disabled ? "selected" : ""; ?>>
                <?= $option["name"]; ?>
            </option>
        <?php } ?>
    </select>
