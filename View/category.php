<div id="wp-products">
            <h2><?=$cate['name']?></h2>
            <ul class="products">
            <?php foreach($probycat as $pro): ?>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="?mod=pro&act=detail&id_sp=<?=$pro['id_sp']?>" class="product-thumb">
                                <img src="./img/<?=$pro['image']?>" alt="">
                            </a>
                            <a href="?mod=cart&act=add&id_sp=<?=$pro["id_sp"]?>" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-infor">
                            <a href="" class="product-cat"></a>
                            <h4><?=$pro['namesp']?></h4>
                            <div class="product-pire"><?=number_format($pro['price'],0, ",",".")." VND"?></div>
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