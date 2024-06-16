// MỞ & ĐÓNG GIỎ HÀNG
const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

cartIcon.addEventListener("click", () => {
  cart.classList.add("active");
});

closeCart.addEventListener("click", () => {
  cart.classList.remove("active");
});

// Bắt đầu khi tài liệu đã sẵn sàng
if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", start);
} else {
  start();
}

// =============== START ====================
function start() {
  addEvents();
}

// ============= UPDATE & RERENDER ===========
function update() {
  addEvents();
  updateTotal();
}

// =============== ADD EVENTS ===============
function addEvents() {
  // Remove items from cart
  let cartRemove_btns = document.querySelectorAll(".cart-remove");
  console.log(cartRemove_btns);
  cartRemove_btns.forEach((btn) => {
    btn.addEventListener("click", handle_removeCartItem);
  });

  // Change item quantity
  let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
  cartQuantity_inputs.forEach((input) => {
    input.addEventListener("change", handle_changeItemQuantity);
  });

  // Add item to cart
  let addCart_btns = document.querySelectorAll(".add-cart");
  addCart_btns.forEach((btn) => {
    btn.addEventListener("click", handle_addCartItem);
  });

  // Buy Order
  const buy_btn = document.querySelector(".btn-buy");
  buy_btn.addEventListener("click", handle_buyOrder);
}

// ============= HANDLE EVENTS FUNCTIONS =============
let itemsAdded = [];

// Thêm sản phẩm vào giỏ hàng
function handle_addCartItem() {
  let product = this.parentElement;
  let title = product.querySelector(".product-title").innerHTML;
  let price = product.querySelector(".product-price").innerHTML;
  let imgSrc = product.querySelector(".product-img").src;

  let newToAdd = {
    title,
    price,
    imgSrc,
  };

  // Kiểm tra nếu sản phẩm đã tồn tại
  if (itemsAdded.find((el) => el.title == newToAdd.title)) {
    alert("Sản phẩm này đã tồn tại trong giỏ hàng!");
    return;
  } else {
    itemsAdded.push(newToAdd);
    // Hiển thị thông báo khi sản phẩm được thêm thành công
    alert("Sản phẩm đã được thêm vào giỏ hàng!");
  }

  // Thêm sản phẩm vào giỏ hàng
  let cartBoxElement = CartBoxComponent(title, price, imgSrc);
  let newNode = document.createElement("div");
  newNode.innerHTML = cartBoxElement;
  const cartContent = cart.querySelector(".cart-content");
  cartContent.appendChild(newNode);

  update();
}


function handle_removeCartItem() {
  this.parentElement.remove();
  itemsAdded = itemsAdded.filter(
    (el) =>
      el.title !=
      this.parentElement.querySelector(".cart-product-title").innerHTML
  );

  update();
}

function handle_changeItemQuantity() {
  if (isNaN(this.value) || this.value < 1) {
    this.value = 1;
  }
  this.value = Math.floor(this.value); // to keep it integer

  update();
}

function handle_buyOrder() {
  // Kiểm tra nếu không có phương thức thanh toán nào được chọn
  if (!document.getElementById('cashOnDelivery').checked && !document.getElementById('momoPayment').checked) {
    alert("Vui lòng chọn một phương thức thanh toán trước khi đặt hàng!");
    return;
  }

  // Xử lý đặt hàng ở đây khi đã chọn phương thức thanh toán
  if (itemsAdded.length <= 0) {
    alert("Không có đơn hàng để đặt. Vui lòng thêm sản phẩm vào giỏ hàng trước!");
    return;
  }
  
  // Xác nhận đơn hàng và thực hiện thanh toán
  const cartContent = document.querySelector(".cart-content");
  cartContent.innerHTML = "";
  alert("Đơn hàng của bạn đã được đặt thành công :)");
  itemsAdded = [];

  update();
}

const buy_btn = document.querySelector(".btn-buy");
buy_btn.addEventListener("click", handle_buyOrder);


// Thêm phần hiển thị tiền VND và logic tính toán tổng tiền
function updateTotal() {
  let cartBoxes = document.querySelectorAll(".cart-box");
  const totalElement = cart.querySelector(".total-price");
  let total = 0;
  cartBoxes.forEach((cartBox) => {
    let priceElement = cartBox.querySelector(".cart-price");
    let price = parseFloat(priceElement.innerHTML.replace("₫", "").replace(/\./g, "").replace(",", "."));
    let quantity = parseInt(cartBox.querySelector(".cart-quantity").value);
    total += price * quantity;
  });

  // Làm tròn tổng tiền tới 2 chữ số sau dấu phẩy
  total = total.toFixed(2);
  // hoặc có thể sử dụng
  // total = Math.round(total * 100) / 100;

  // Chuyển đổi tổng tiền về dạng tiền VND với dấu "." phân cách hàng nghìn và dấu "," thay thế cho dấu "."
  total = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total);

  totalElement.innerHTML = total;
}


// Xử lý sự kiện khi chọn phương thức thanh toán
document.getElementById('cashOnDelivery').addEventListener('change', function() {
  // Xử lý khi chọn thanh toán khi nhận hàng
});

document.getElementById('momoPayment').addEventListener('change', function() {
  // Xử lý khi chọn thanh toán qua Ví Momo
});



// ============= HTML COMPONENTS =============
function CartBoxComponent(title, price, imgSrc) {
  return `
    <div class="cart-box">
        <img src=${imgSrc} alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!-- REMOVE CART  -->
        <i class='bx bxs-trash-alt cart-remove'></i>
    </div>`;
}
