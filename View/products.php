<div id="wp-products">
            <h2>Tất cả sản phẩm</h2>
            <ul class="products">
            <?php foreach($allpro as $products): ?>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="?mod=pro&act=detail&id_sp=<?=$products['id_sp']?>" class="product-thumb">
                                <img src="./img/<?=$products['image']?>" alt="">
                            </a>
                            <a href="?mod=cart&act=add&id_sp=<?=$products["id_sp"]?>" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-infor">
                            <a href="" class="product-cat"></a>
                            <h4><?=$products['name']?></h4>
                            <div class="product-pire"><?=number_format($products['price'],0, ",",".")." VND"?></div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="list-page">
                <div class="item">
                    <a href="">1</a>
                </div>
                <div class="item">
                    <a href="">2</a>
                </div>
                <div class="item">
                    <a href="">3</a>
                </div>
                <div class="item">
                    <a href="">4</a>
                </div>
            </div>
        </div>