const swiper = new Swiper('.swiper', {
    loop: true,
    speed: 900,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

const plus = document.querySelector(".plus");
const minus = document.querySelector(".minus");
const numTravelersInput = document.querySelector('.num-travelers');

function plusTravelers() {
  var input = numTravelersInput.value;
  input++;
  numTravelersInput.value = input;
  printTotalPrice();
  getNumTravelers();
}

function minusTravelers() {
  var input = numTravelersInput.value;
  if(input <= 1) {
    input = 1;
  } else {
    input--;
    numTravelersInput.value = input;
  }
  printTotalPrice();
  getNumTravelers();
}

plus.addEventListener('click', plusTravelers);
minus.addEventListener('click', minusTravelers);

function totalPrice() {
  let totalPrice = document.getElementById('unit_price').innerHTML * numTravelersInput.value;
  return totalPrice;
}

function printTotalPrice() {
  document.getElementById('total_price').innerHTML = totalPrice();
}

printTotalPrice();

function getNumTravelers() {
  document.getElementById('num_travelers').innerHTML = numTravelersInput.value;
}

getNumTravelers();