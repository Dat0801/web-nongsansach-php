<?php
if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
    $totalCounter = 0;
    $itemCounter = 0;
    foreach ($_SESSION['cart_items'] as $key => $item) {
        $total = $item['product_price'] * $item['qty'];
        $totalCounter += $total;
        $itemCounter += $item['qty'];
        ?>
        <tr>
            <th scope="row">
                <div class="d-flex align-items-center">
                    <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $item["product_img"] ?>"
                        class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: contain;" alt="">
                    <p class="mb-0"><?php echo $item['product_name']; ?></p>
                </div>

            </th>
            <td>
                <p class="mb-0 mt-4">
                    <?php echo number_format($item['product_price']); ?><sup><small>đ</small></sup>
                </p>
            </td>
            <td>
                <p class="mb-0 mt-4">
                    <?php echo $item['product_dvt']; ?>
                </p>
            </td>
            <td>
                <input type="number" min="1" max="<?php echo $item["product_qty"] ?>" required class="mb-0 mt-4 cart-qty-single"
                    data-item-id="<?php echo $key ?>" data-url-base="<?php echo _WEB_ROOT ?>"
                    data-item-qty="<?php echo $item['product_qty'] ?>"
                    value="<?php echo ($item['qty'] > $item['product_qty']) ? $item['product_qty'] : $item['qty']; ?>">
            </td>
            <td>
                <p class="mb-0 mt-4">
                    <?php echo number_format($total); ?><sup><small>đ</small></sup>
                </p>
            </td>
            <td>
                <button class="remove-cart btn btn-md rounded-circle bg-light border mt-4"
                    data-url-base="<?php echo _WEB_ROOT ?>" data-item-id="<?php echo $key ?>">
                    <i class="fa fa-times text-danger"></i>
                </button>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <th scope="row">
            <div class="d-flex align-items-center">
                <button class="mt-2 btn btn-danger btn-sm" id="emptyCart" data-url-base="<?php echo _WEB_ROOT ?>">Xóa giỏ
                    hàng</button>
            </div>
        </th>
        <td></td>
        <td></td>
        <td>
            <p class="mb-0 mt-2">
                <strong>
                    <?php
                    echo $itemCounter . ' Sản Phẩm' ?>
                </strong>
            </p>

        </td>
        <td>
            <p class="mb-0 mt-2">
                <?php echo number_format($totalCounter); ?><sup><small>đ</small></sup>
            </p>
        </td>
        <td></td>
    </tr>
<?php }