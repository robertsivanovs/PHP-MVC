const show = (div => {
  let element = document.getElementsByClassName(div);
  element[0].style.opacity = (parseFloat(element[0].style.opacity) + 0.1);
  if (element[0].style.opacity < 1) {
      setTimeout(show, 40, div);
  }
});

const fadeIn = (div => {
  let element = document.getElementsByClassName(div);
  element[0].style.opacity = 0;
  element[0].style.display = 'inline-block';
  setTimeout(show, 40, div);
});

const fadeOut = (div => {
  let element = document.getElementsByClassName(div);
  let op = 1;
  const timer = setInterval( () => {
      if (op <= 0.1){
          clearInterval(timer);
          element[0].style.display = 'none';
      }
      element[0].style.opacity = op;
      element[0].style.filter = 'alpha(opacity=' + op * 100 + ")";
      op -= op * 0.3;
  }, 50);
});