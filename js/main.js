function swiper() {
  const swiper = new Swiper('.swiper', {
      loop: true,
      speed: 900,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
}
function countNumberOfTraveler() {
  const numTravelersInput = document.querySelector('.num-travelers');
  const plus = document.querySelector(".plus");
  const minus = document.querySelector(".minus");

  plus.addEventListener('click', plusTravelers);
  minus.addEventListener('click', minusTravelers);

  function plusTravelers() {
    let input = parseInt(numTravelersInput.value);
    input++;
    updateInputAndCalculate(input);
  }

  function minusTravelers() {
    let input = parseInt(numTravelersInput.value);
    if (input <= 1) {
      input = 1;
    } else {
      input--;
    }
    updateInputAndCalculate(input);
  }

  function updateInputAndCalculate(input) {
    numTravelersInput.value = input;
    printTotalPrice();
    getNumTravelers();
  }

  function totalPrice() {
    let unitPrice = parseFloat(document.getElementById('unit_price').innerHTML);
    return unitPrice * parseFloat(numTravelersInput.value);
  }

  function printTotalPrice() {
    document.getElementById('total_price').innerHTML = totalPrice();
  }

  function getNumTravelers() {
    document.getElementById('num_travelers').innerHTML = numTravelersInput.value;
  }

  updateInputAndCalculate(parseInt(numTravelersInput.value));
}

function toastMessageSuccess(title) {
  const toastMess = document.querySelector('.toast-mess');
  const h3 = toastMess.querySelector('h3');
  const icon = toastMess.querySelector('#icon');
  icon.classList.add('fa-circle-check')
  return h3.innerHTML = title;
}

// 

function closeToastMessage() {
  const close = document.getElementById('close-modal');
  const toastMess = document.querySelector('.toast-mess');
  let timer;

  close.addEventListener('click', function (event) {
    toastMess.classList.add('disable');
  });

  toastMess.addEventListener('mouseenter', function (event) {
    // Hủy timer nếu có
    if (timer) {
      clearTimeout(timer);
    }
  });

  toastMess.addEventListener('mouseleave', function (event) {
    timer = setTimeout(function () {
      toastMess.classList.add('disable');
    }, 2000);
  });
}

function formConfirm() {
  const myForm = document.getElementById('myForm');

  myForm.addEventListener('submit', function(event) {
    event.preventDefault(); 

    Swal.fire({
      title: 'Success!',
      text: 'We have sent you an email, please check your inbox!',
      icon: 'success',
      confirmButtonText: 'Done',
    }).then(() => {
      myForm.submit();
    });
  });
}

function submitUserChange() {
  const myForm = document.querySelector('#user-setting-form');
  myForm.addEventListener('submit', function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Success!',
      text: 'Your information has just been updated',
      icon: 'success',
    }).then(() => {
      myForm.submit();
    });
  });
}

function deleteAccountUser() {
  const buttonDelete = document.querySelector('#delete-account');
  const email = document.querySelector('.user-setting .user-email');
  buttonDelete.addEventListener('click', function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Warning!',
      text: `This action will delete email ${email.innerHTML}`,
      icon: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#000',
      confirmButtonText: 'Confirm',
      cancelButtonText: 'Cancel',
    }).then((result) => {
      if(result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          `Account ${email.innerHTML} has been deleted`,
          'success',
        )
      }
    });
  });
}

function showModal() {
  const form = document.querySelector('form');
  const modal = document.querySelector('.modal');
  const forgot = document.getElementById('forgot');
  
  forgot.addEventListener('click', function (event) {
      event.preventDefault();
      modal.classList.remove('disable');
      form.submit();
  });
}

function closeModal() {
  const close = document.getElementById('close-modal');
  const modal = document.querySelector('.modal');
  close.addEventListener('click', function (event) {
      modal.classList.add('disable');
  });
}

function isValidName(name) {
  const nameRegex = /^[\w'\-,.][^0-9_!¡?÷?¿\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}|\w{2,}$/;
  return nameRegex.test(name);
}

function isValidEmail(email) {
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  return emailRegex.test(email);
}

function isValidPhone(phone) {
  const phoneRegex = /^[0|+][1-9][0-9]{8,10}$/;
  return phoneRegex.test(phone);
}

function isValidBirthDay(birthDay) {
  const birthDate = new Date(birthDay);
  const currentDate = new Date();
  const eighteenYearsAgo = new Date();
  eighteenYearsAgo.setFullYear(eighteenYearsAgo.getFullYear() - 18);

  return (
    !isNaN(birthDate) && // Kiểm tra xem ngày nhập có hợp lệ
    birthDate <= currentDate && // Kiểm tra ngày sinh không lớn hơn ngày hiện tại
    birthDate <= eighteenYearsAgo // Kiểm tra tuổi phải lớn hơn hoặc bằng 18
  );
}

function toastMessageError() {
  const toastMess = document.querySelector('.toast-mess');
  toastMess.querySelector('h3').innerHTML = 'Fail';
  toastMess.classList.remove('disable');
  // const icon = toastMess.querySelector('#icon');
  toastMess.querySelector('#icon').classList.add('fa-circle-xmark')
}

function validateBooking() {
  const toastMess = document.querySelector('.toast-mess');

  const form = document.querySelector('form');
  const firstNameInput = document.getElementById('first');
  const lastNameInput = document.getElementById('last');
  const emailInput = document.getElementById('email');
  const phoneInput = document.getElementById('phone');
  const birthDayInput = document.getElementById('day-of-birth');
  const genderMaleInput = document.querySelector('input[name="gender"][value="Male"]');
  const genderFemaleInput = document.querySelector('input[name="gender"][value="Female"]');

  form.addEventListener('submit', function(event) {
    // Reset errors
    firstNameInput.classList.remove('error');
    lastNameInput.classList.remove('error');
    emailInput.classList.remove('error');
    phoneInput.classList.remove('error');
    birthDayInput.classList.remove('error');
    genderMaleInput.classList.remove('error');
    genderFemaleInput.classList.remove('error');

    let hasError = false; 

    if (!genderMaleInput.checked && !genderFemaleInput.checked) {
      toastMessageError();
      toastMess.querySelector('span').innerHTML = `You haven't filled out gender!`;
      hasError = true;
    }

    if (!isValidBirthDay(birthDayInput.value)) {
      birthDayInput.classList.add('error');
      toastMessageError();
      toastMess.querySelector('span').innerHTML = 'Check your birthday and try again!';
      hasError = true;
    }

    if (!isValidPhone(phoneInput.value)) {
      phoneInput.classList.add('error');
      toastMessageError();
      toastMess.querySelector('span').innerHTML = 'Check your phone number and try again!';
      hasError = true;
    }

    if (!isValidEmail(emailInput.value)) {
      emailInput.classList.add('error');
      toastMessageError();
      toastMess.querySelector('span').innerHTML = 'Check your email address and try again!';
      hasError = true;
    }

    if (!isValidName(lastNameInput.value)) {
      lastNameInput.classList.add('error');
      toastMessageError();
      toastMess.querySelector('span').innerHTML = 'Check your last name and try again!';
      hasError = true;
    }

    if (!isValidName(firstNameInput.value)) {
      firstNameInput.classList.add('error');
      toastMessageError();
      toastMess.querySelector('span').innerHTML = 'Check your first name and try again!';
      hasError = true;
    }

    // Ngăn chặn việc gửi biểu mẫu nếu có lỗi
    if (hasError) {
      event.preventDefault();
    } else {

    }
  });
}



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