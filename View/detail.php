<div class="flex-box">
            <div class="left">
                <div class="big-img">
                    <img src="./img/<?=$ctsp['image']?>">
                </div>
            </div>
    
            <div class="right">
                <div class="url">Trang chủ > Sản phẩm > Áo thun</div>
                <div class="pname"><?=$ctsp['name']?></div>
                <div class="ratings">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"><?=number_format($ctsp['price'],0, ",",".")." VND"?></div>
                <div class="size">
                    <p>Size :</p>
                    <div class="psize active">M</div>
                    <div class="psize">L</div>
                    <div class="psize">XL</div>
                    
                </div>
                <div class="quantity">
                    <p>Số lượng :</p>
                    <input type="number" min="1" max="5" value="1">
                </div>
                <div class="btn-box">
                    <button class="cart-btn"><a href="?mod=cart&act=add&id_sp=<?=$ctsp["id_sp"]?>" class="text-decoration-none text-dark">Thêm vào giỏ</a></button>
                </div>
            </div>
        </div>
        <!-- <h2>SẢN PHẨM CÙNG DANH MỤC</h2>
            <ul class="products">
            <?php foreach($Cungdm as $cdm): ?>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="?mod=pro&act=detail&id_sp=<?=$cdm['id_sp']?>" class="product-thumb">
                                <img src="./img/<?=$cdm['image']?>" alt="">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-infor">
                            <a href="" class="product-cat"></a>
                            <h4><?=$cdm['name']?></h4>
                            <div class="product-pire"><?=number_format($cdm['price'],0, ",",".")." VND"?></div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>

            <div id="saleoff">
                <img src="css/home_slider_image_3.webp" alt="" width="1251" >
                
                <!-- <div class="box-right"></div> -->
            </div>

        -->