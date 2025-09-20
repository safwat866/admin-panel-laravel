gsap.registerPlugin(Flip, CustomWiggle);

CustomWiggle.create("cartButtonWiggle", { wiggles: 0, type: "easeOut" });

const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
const pageItems = document.querySelector(".content .items");
const cart = document.querySelector(".cart");
const cartBtnWrapper = cart.querySelector(".btn-cart-wrapper");
const cartBtn = cart.querySelector(".btn-cart");
const cartCount = cart.querySelector(".count");
const cartItems = cart.querySelector(".items");
const cartEmptyText = cart.querySelector(".empty-text");

const setInCartClass = (item, inCart) => item.parentNode.classList.toggle('in-cart', inCart);
const setActiveItemClass = (item, isActive) => item.parentNode.classList.toggle('active', isActive);

const updateCart = (item) => {
  const hasItems = cartItems.children.length > 0;
  
  cartCount.innerText = hasItems ? cartItems.children.length : null;
  //cartEmptyText.hidden = hasItems;
  cartItems.hidden = !hasItems;
}

const cartBtnAnimation = () => {
  gsap.timeline()
    .fromTo(cartBtn, { yPercent: 0, rotation: 0 },
    {
      duration: 0.9,
      ease: "cartButtonWiggle",
      yPercent: 0,
      rotation: -5,
      clearProps: 'all'
    })
    .fromTo(cartCount, { rotation: 0 }, {
      duration: 1.3,
      ease: "power4.out",
      rotation: 720,
      y: 0,
    }, "<")
    .to(cartCount, {
      duration: 0.8,
      ease: "elastic.out(0, 0.9)",
      y: 0,
      clearProps: 'all'
    }, "-=0.1");
}

const addToCart = (item) => {
  const state = Flip.getState(item);

  setInCartClass(item, true);
  setActiveItemClass(item, true);
  cartBtnWrapper.appendChild(item);

  Flip.from(state, {
    duration: reducedMotion ? 0 : 0.5,
    ease: "back.in(0.8)",
    onComplete: () => {
      setActiveItemClass(item, false);
      cartItems.appendChild(item);
      
      gsap.fromTo(item,
        { y: 0 },
        { 
          y: -100, 
          duration: reducedMotion ? 0 : 1,
          ease: "elastic.out(1, 0.3)"
        });
      
      updateCart(item);
      !reducedMotion && cartBtnAnimation();
    }
  });
};

const removeFromCart = (item) => {
  let state = Flip.getState(item);
    
  document.querySelector(`[data-product-id="${item.dataset.productId}"]`).appendChild(item);
  updateCart(item);
  setActiveItemClass(item, true);

  Flip.from(state, {
    duration: reducedMotion ? 0 : 0.5,
    ease: "power4.out",
    onComplete: () => {
      setActiveItemClass(item, false);
      setInCartClass(item, false);
    }
  });
};

pageItems.addEventListener("click", (e) => {
  if (e.target.classList.contains("btn-item")) {
    addToCart(e.target);
  }
});

cartItems.addEventListener("click", (e) => {
  if (e.target.classList.contains("btn-item")) {
    removeFromCart(e.target);
  }
});

// cartBtn.addEventListener("click", () => cart.classList.toggle("open"));