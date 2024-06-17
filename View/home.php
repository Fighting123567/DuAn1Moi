<div id="wp-products">
            <h2>SẢN PHẨM NỔI BẬT</h2>
            <ul class="products">
            <?php foreach($NoiBat as $noibat): ?>
                <li>
                    <form action="?mod=page&act=addcart" method="post">
                    <div class="product-item">
                        <div class="product-top">
                            <a href="?mod=pro&act=detail&id_sp=<?=$noibat['id_sp']?>" class="product-thumb">
                                <img src="./img/<?=$noibat['image']?>" alt="">
                            </a>
                            <a href="?mod=cart&act=add&id_sp=<?=$noibat["id_sp"]?>" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-infor">
                            <a href="" class="product-cat"></a>
                            <h4><?=$noibat['name']?></h4>
                            <div class="product-pire"><?=number_format($noibat['price'],0, ",",".")." VND"?></div>
                        </div>
                    </div>
                </form>
                </li>
                <?php endforeach; ?>

            <div id="saleoff">
                <img src="css/home_slider_image_3.webp" alt="" width="1251" >
                
                <!-- <div class="box-right"></div> -->
            </div>

            <h2>Sản Phẩm Mới</h2>
            <ul class="products">
            <?php foreach($Moi as $new): ?>
                
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="?mod=pro&act=detail&id_sp=<?=$new['id_sp']?>" class="product-thumb">
                                <img src="./img/<?=$new['image']?>" alt="">
                            </a>
                            <a href="?mod=cart&act=add&id_sp=<?=$new["id_sp"]?>" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-infor">
                            <a href="" class="product-cat"></a>
                            <h4><?=$new['name']?></h4>
                            <div class="product-pire"><?=number_format($new['price'],0, ",",".")." VND"?></div>
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