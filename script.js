// 장바구니에 담긴 상품을 저장할 배열
let cart = [];

// 장바구니에 상품을 추가하는 함수
function addToCart(name, price) {
    // 상품 정보를 객체로 생성하여 장바구니에 추가
    const product = { name, price };
    cart.push(product);
    updateCartDisplay();
}

// 장바구니 내용을 화면에 업데이트하는 함수
function updateCartDisplay() {
    const cartItemsList = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    // 장바구니 내용을 초기화
    cartItemsList.innerHTML = '';

    // 총 가격 계산
    let totalPrice = 0;

    // 장바구니에 담긴 상품들 리스트로 표시
    cart.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `${item.name} - $${item.price.toFixed(2)} 
                        <button onclick="removeFromCart(${index})">Remove</button>`;
        cartItemsList.appendChild(li);
        totalPrice += item.price;
    });

    // 총 가격 업데이트
    totalPriceElement.textContent = totalPrice.toFixed(2);
}

// 장바구니에서 상품을 제거하는 함수
function removeFromCart(index) {
    cart.splice(index, 1);  // 해당 상품을 장바구니에서 제거
    updateCartDisplay();  // 화면 업데이트
}

// 장바구니 비우기
function clearCart() {
    cart = [];  // 장바구니 초기화
    updateCartDisplay();  // 화면 업데이트
}

// 구매 완료 처리 함수
function completePurchase() {
    if (cart.length === 0) {
        alert("Your cart is empty!");  // 장바구니가 비어있다면 경고창 표시
        return;
    }

    // 구매 완료 후 모달 창 띄우기
    document.getElementById('purchaseModal').style.display = 'flex';

    // 장바구니 비우기
    clearCart();  // 구매가 완료된 후 장바구니 비우기
}

// 모달 창 닫기
function closeModal() {
    document.getElementById('purchaseModal').style.display = 'none';  // 모달 숨기기
}
