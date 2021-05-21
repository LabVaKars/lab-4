<?php
    $disabled = isset($data["disabled"]) ? $data["disabled"] : false;
    $type = isset($data["type"]) ? $data["type"] : "submit";
    $text = isset($data["text"]) ? $data["text"] : "";
    $onClick = isset($data["onClick"]) ? $data["onClick"] : "";
    $class = $data["class"];
    $group = $data["group"];
    $value = $data["value"];
?>
    <button
        onClick="<?php echo $onClick; ?>"
        type="<?php echo $type; ?>"
        class="<?php echo $class; ?>"
        name="<?php echo $group; ?>"
        value="<?php echo $value;?>"
        <?php echo $disabled ? "disabled" : ""; ?>>
        <?php echo $text; ?>
    </button>
