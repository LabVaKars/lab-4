<?php
    $INPUT_SELECT_NAME = $data["0"];
    $INPUT_LIST_NAME = $data["1"];
    $INPUT_PRODUCT_NAME = $data["2"];
    $INPUT_PRODUCT_COUNT = $data["3"];

    $BTN_UPDATE_LIST = $data["4"];
    $BTN_ADD_LIST = $data["5"];
    $BTN_DELETE_LIST = $data["6"];
    $BTN_ADD_PRODUCT = $data["7"];
    $BTN_DELETE_PRODUCT = $data["8"];

    $form = $data["form"];
    $sessionUtils = $data["sessionUtils"];
    $products = $data['products'];

    $navbarData = $data['navbarData'];

    $navbarData->generate();
?>
<div class="container">
    <!-- Jumbotron Header -->
    <form method="POST">
    <header class="jumbotron my-4">
        <h1 class="display-3">Produktu saraksts!</h1>
    </header>
    <!-- Filters -->
    <div class="row">
        <div class="col-3">
            <div class="card h-100 mb-4">
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php $form->generate($INPUT_SELECT_NAME); ?>
                        </div>
                    </div>
                    <div class="mb-4">
                        <?php $form->generate($BTN_UPDATE_LIST); ?>
                    </div>
                    <div class="mb-4">
                        <?php $form->generate($INPUT_LIST_NAME); ?>
                    </div>
                    <div class="mb-4">
                        <?php $form->generate($BTN_ADD_LIST); ?>
                    </div>
                    <div class="mb-4">
                        <?php $form->generate($BTN_DELETE_LIST); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="col-6">
            <div class="text-center">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nosaukums</th>
                        <th scope="col">Daudzums</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $i=>$product) {?>
                            <tr>
                            <th scope="row">
                                <input
                                    type="checkbox"
                                    name="selectedProduct<?php echo $i ?>"
                                    value="<?php echo $product["name"] ?>" />
                            </th>
                            <td><?php echo $product["name"] ?></td>
                            <td><?php echo $product["count"] ?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-3">
            <div class="text-center">

                <div class="card h-100 mb-4">
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php $form->generate($INPUT_PRODUCT_NAME); ?>
                                <?php $form->generate($INPUT_PRODUCT_COUNT); ?>
                            </div>
                        </div>
                        <div class="mb-4">
                        <?php $form->generate($BTN_ADD_PRODUCT); ?>
                        </div>
                        <div class="mb-4">
                        <?php $form->generate($BTN_DELETE_PRODUCT); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>
</div>