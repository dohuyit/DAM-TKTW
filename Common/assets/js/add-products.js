document.addEventListener("DOMContentLoaded", (event) => {
  const originalPriceInput = document.getElementById("original_price");
  const discountNumberInput = document.getElementById("discount_number");
  const discountPriceInput = document.getElementById("discount_price");

  function calculateDiscountedPrice() {
    const originalPrice = parseFloat(originalPriceInput.value) || 0;
    const discountNumber = parseFloat(discountNumberInput.value) || 0;
    const discountPrice = originalPrice * (1 - discountNumber / 100);
    discountPriceInput.value = discountPrice.toFixed(3);
  }

  originalPriceInput.addEventListener("input", calculateDiscountedPrice);
  discountNumberInput.addEventListener("input", calculateDiscountedPrice);
});
