
<?php
    $INPUT_IDENTIF = $data["0"];

    $navbarData = $data['navbarData'];
    $form = $data['form'];
    $messages = $data['messages'];

    $navbarData->generate();
?>

<div class="container">
    <form method="POST">
        <div class="card h-100 mt-4 mb-4 text-center">
            <div class="card-body">
                <h4 class="card-title">Lietotāja identifikators (sarakstu sinhronizācijai)</h4>
                <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                <br/>
                <?php $form->generate($INPUT_IDENTIF); ?>
                <?php $messages->generate($INPUT_IDENTIF); ?>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary" name="signInBtn" type="submit" value="signInBtn">Saglabāt</button>
            </div>
        </div>
    </form>
</div>