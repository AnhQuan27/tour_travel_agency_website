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

function showModal() {
  const modal = document.querySelector('.modal');
  const forgot = document.getElementById('forgot');
  forgot.addEventListener('click', function (event) {
      event.preventDefault();
  modal.classList.remove('disable');
  });
}

showModal();

// function setRememberMe() {
//   const rememberMeCheckbox = document.getElementById('remember_me');
//   const username = document.getElementById('account').value;
//   const password = document.getElementById('password').value;

//   if (rememberMeCheckbox.checked) {
//       // Lưu thông tin đăng nhập vào cookies
//       document.cookie = `rememberedUsername=${username}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
//       document.cookie = `rememberedPassword=${password}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;

//       // Hoặc lưu thông tin đăng nhập vào local storage
//       localStorage.setItem('rememberedUsername', username);
//       localStorage.setItem('rememberedPassword', password);
//   }
// }

// // Hàm để kiểm tra và điền thông tin nếu có lưu trữ
// function checkRememberMe() {
//   // Kiểm tra xem có thông tin đã được lưu trữ trong cookies
//   let rememberedUsernameCookie = getCookie('rememberedUsername');
//   let rememberedPasswordCookie = getCookie('rememberedPassword');

//   // Hoặc kiểm tra xem có thông tin đã được lưu trữ trong local storage
//   let rememberedUsernameLocal = localStorage.getItem('rememberedUsername');
//   let rememberedPasswordLocal = localStorage.getItem('rememberedPassword');

//   // Ghi nhớ thông tin
//   let rememberedUsername, rememberedPassword;

//   // Sử dụng thông tin từ cookies nếu tồn tại
//   if (rememberedUsernameCookie && rememberedPasswordCookie) {
//       rememberedUsername = rememberedUsernameCookie;
//       rememberedPassword = rememberedPasswordCookie;
//   }

//   // Sử dụng thông tin từ local storage nếu tồn tại và không có thông tin từ cookies
//   else if (rememberedUsernameLocal && rememberedPasswordLocal) {
//       rememberedUsername = rememberedUsernameLocal;
//       rememberedPassword = rememberedPasswordLocal;
//   }

//   // Nếu có thông tin lưu trữ, điền nó vào các trường đăng nhập
//   if (rememberedUsername && rememberedPassword) {
//       document.getElementById('usernameInput').value = rememberedUsername;
//       document.getElementById('passwordInput').value = rememberedPassword;
//       document.getElementById('rememberMeCheckbox').checked = true;
//   }
// }

// checkRememberMe();