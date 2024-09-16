import Swal from "sweetalert2";

async function flashMessage(icon, text, title) {
  const swal = await Swal.fire({
    icon,
    text,
    title,
  });
  const result = swal.isConfirmed;
  return result;
}

function isLogin() {
  if (localStorage.getItem("user_access")) {
    return true;
  }
  return false;
}

function getUserInfo() {
  if (isLogin()) {
    return JSON.parse(localStorage.getItem("user_access"));
  }
  return false;
}
function getDataAssesmen() {
  if (isLogin()) {
    return JSON.parse(localStorage.getItem("data_assesmen"));
  }
  return false;
}

function escapeHtml(text) {
  return text
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}

function redirect(page) {
  window.location.href = page;
}
// function getFilename(file, name) {
//   const extension = file.name.substring(file.name.lastIndexOf('.') + 1);
//   return `${name}.${extension}`;
// }
// async function uploadFile(file, name) {
//   const storage = getStorage();
//   const filename = getFilename(file, name);
//   const storageRef = ref(storage, filename);
//   const uploadImage = await uploadBytes(storageRef, file);
//   return getDownloadURL(uploadImage.ref).then((url) => Promise.resolve(url));
// }

function formatDate(date) {
  const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
  };
  const dateTemp = new Date(date);
  return dateTemp.toLocaleDateString("id-ID", options);
}
function formatDateWithTime(date) {
  const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
    hour12: false,
    hour: "2-digit",
    minute: "2-digit",
  };
  const dateTemp = new Date(date);
  return dateTemp.toLocaleDateString("id-ID", options);
}

function addClassElement(element, className) {
  document.querySelector(element).classList.add(className);
}
function removeClassElement(element, className) {
  document.querySelector(element).classList.remove(className);
}
function innerElement(idOrClass, element) {
  document.querySelector(idOrClass).innerHTML = element;
}

async function questionSwal(title, icon, text) {
  const swal = await Swal.fire({
    title,
    icon,
    text,
    showCancelButton: true,
    confirmButtonText: "Yes",
    confirmButtonColor: "#9061f9",
  });
  const result = swal.isConfirmed;
  return result;
}
function formatTimeLeft(time) {
  // The largest round integer less than or equal to the result of time divided being by 60.
  const minutes = Math.floor(time / 60);

  // Seconds are the remainder of the time divided by 60 (modulus operator)
  let seconds = time % 60;

  // If the value of seconds is less than 10, then display seconds with a leading zero
  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  // The output in MM:SS format
  return `${minutes}:${seconds}`;
}

function formatRupiah(angka) {
  let separator = ".";
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return rupiah;
}

function toDate(date_param) {
  const date = new Date(date_param);
  const mounth =
    date.getMonth() + 1 >= 10 ? date.getMonth() + 1 : `0${date.getMonth() + 1}`;
  const tgl = date.getDate() >= 10 ? date.getDate() : `0${date.getDate()}`;
  return `${date.getFullYear()}-${mounth}-${tgl}`;
}
function tNumber(val) {
  if (val == null) val = 0;
  val = parseFloat(val.toString().replace(/\,/g, ""));
  if (isNaN(val)) val = 0;
  return val;
}
function addCommas(x) {
  if (x == null || x.length == 0) {
    return "";
  }
  x = tNumber(x);
  var parts = x.toString().split(",");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  return parts.join(".");
}
function removeCommas(sStr) {
  sStr = sStr.toString().replace(/\,/g, "");
  return sStr;
}

function getDateNow() {
  const date = new Date();
  const this_date = `${date.getFullYear()}-${
    date.getMonth() < 10 ? `0${date.getMonth() + 1}` : date.getMonth() + 1
  }-${date.getDate() < 10 ? `0${date.getDate()}` : date.getDate()}`;
  return this_date;
}
function getDateTimeNow() {
  const options = {
    hour12: false,
    hour: "2-digit",
    minute: "2-digit",
  };
  const date = new Date();
  date.toLocaleDateString("id-ID", options);
  const this_date = `${date.getFullYear()}-${
    date.getMonth() < 10 ? `0${date.getMonth() + 1}` : date.getMonth() + 1
  }-${date.getDate() < 10 ? `0${date.getDate()}` : date.getDate()} ${
    date.getHours() < 10 ? `0${date.getHours()}` : date.getHours()
  }:${date.getMinutes() < 10 ? `0${date.getMinutes()}` : date.getMinutes()}`;
  return this_date;
}

function disableInspect() {
  // Disable right-click context menu
  document.addEventListener("contextmenu", function (event) {
    event.preventDefault();
  });

  // Disable keyboard shortcuts for developer tools
  document.onkeydown = function (event) {
    if (event.keyCode == 123) {
      // F12 key
      return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
      // Ctrl+Shift+I
      return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 67) {
      // Ctrl+Shift+C
      return false;
    } else if (event.ctrlKey && event.keyCode == 85) {
      // Ctrl+U
      return false;
    } else if (event.ctrlKey && event.shiftKey && event.key == "J") {
      //ctrl+J
      return false;
    } else if(event.ctrlKey && event.key == 'S'){
      return false;
    }
  };
}

export {
  isLogin,
  getUserInfo,
  escapeHtml,
  redirect,
  formatDate,
  flashMessage,
  addClassElement,
  removeClassElement,
  innerElement,
  questionSwal,
  formatTimeLeft,
  formatRupiah,
  toDate,
  addCommas,
  removeCommas,
  disableInspect,
  formatDateWithTime,
  getDateNow,
  getDateTimeNow,
  getDataAssesmen,
};
