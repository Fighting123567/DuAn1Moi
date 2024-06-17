
<main>      
            <?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0): ?>
            <div class="container my-3">
                <table id="cart" class="table table-hover table-condensed text-center">
                    <thead>
                        <tr>
                            <th style="width:20%">Tên sản phẩm</th>
                            <th style="width:20%">Hình ảnh</th>
                            <th style="width:10%">Giá</th>
                            <th style="width:8%">Số lượng</th>
                            <th style="width:12%">Thành tiền</th>
                            <th style="width:10%"> Xóa </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sum = 0;
                        foreach($_SESSION['cart'] as $item): ?>
                        <tr>
                            <td data-th="Tên sản phẩm"><?=$item['name']?></td>
                            <td data-th="Sản phẩm">
                                        <img
                                            src="./img/<?=$item['image']?>"
                                            alt="Sản phẩm 1" class="img-responsive" width="100">
                            </td>
                            <td data-th="Giá"><?=number_format($item['price'],0, ",",".")." VND"?></td>
                            <td data-th="Số lượng">
                                <div class="amount-product-buy d-flex justify-content-center">
                                    <a href="?mod=cart&act=decrease&id_sp=<?=$item['id_sp']?>" class="minus-product bg-dark bg-opacity-25  px-2">
                                    <i class="fa-solid fa-minus"></i>
                                    </a>
                                    <div class="amount-product fs-5  px-2 border border-1"><?=$item['SoLuong']?></div>
                                    <a  href="?mod=cart&act=increase&id_sp=<?=$item['id_sp']?>" class="add-plus bg-dark bg-opacity-25 px-2">
                                    <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                            </td>
                            <td data-th="Thành tiền"><?=number_format($item['price']*$item['SoLuong'],0, ",",".")." VND"?></td>
                            <td class="" data-th="">
                                <a href="?mod=cart&act=delete&id_sp=<?=$item['id_sp'] ?>" class="btn btn-danger btn-sm">xóa
                                </a>
                            </td>
                        </tr>
                        <?php $sum += $item['price']*$item['SoLuong']; ?>
                        <?php endforeach; ?>
                    </tbody>
                            <a href="?mod=cart&act=deleteall" class="btn">xóa hết</a>
                </table>
                <div class="cart-payment mt-5 sticky-bottom z-1 bg-white">
                    <div class="row border border-1 py-4 align-items-center mt-3 shadow-lg">
                        <div class="col-sm-6">
                            <div class="cart-payment-left d-flex hstack gap-3">
                                <a href="?" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                                    Tiếp tục mua hàng</a>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div
                                class="cart-payment-right  d-flex align-items-center justify-content-between hstack gap-3">
                                <h5 class="mb-0 ">Tổng tiền: </h5>
                                <strong><?=number_format($sum,0, ",",".")." VND"?></strong>
                                <a href="?mod=page&act=checkout" class="btn btn-success">Thanh toán
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-5">
                            <h1 class="text-center"><i class="bi bi-cart"></i></h1>
                            <h4 class="text-center"> Giỏ hàng trống</h4>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </main>