

function rand() {
    let captcha_src =["premier","second"];
    random = Math.floor(Math.random() * (1-0+1))+0;
    let files=captcha_src[random]
    let array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    let currentIndex = array.length,  randomIndex;


    while (currentIndex != 0) {


        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;


        [array[currentIndex], array[randomIndex]] = [
            array[randomIndex], array[currentIndex]];
    }

    const img = document.querySelectorAll(".captcha");
    let j=0;
    img.forEach(image=> {

        let po = array[j];
        image.src ="assets/images/Captcha/"+files+"/"+ po + ".jpg";
        ++j;
    })
}

function checkSolved() {

 const img = document.querySelectorAll(".captcha");
 let array = [];
 img.forEach(image=>{
     const src = image.src;
     console.log(src);
     const img_captcha=(src).split('/')[7].split('.')[0];
     array.push(img_captcha);
     console.log(array);
 })

    array.reverse();
    let truearray =['1','2','3','4','5','6','7','8','9']
        let captcha_verif=0;
        if( Array.isArray(array) &&
            Array.isArray(truearray) &&
            array.length === truearray.length &&
            array.every((val, index) => val === truearray[index])) {
            captcha_verif=1;
            alert("Félicitation!");
            document.getElementById('checkbox').disabled =false;
            document.getElementById('checkbox').click();

            }
            console.log(captcha_verif);
        }











function tick(number) {
  const image = document.getElementById('img' + number);
  let check = 0;
  let j;
  for (j=1; j<=9; j++) {
    const curent = document.getElementById('img' + j);
    if (curent.style.border != ""){
        let tile = curent.src;
        curent.src = image.src;
        image.src = tile;
        curent.style.border ="";
        check = 1;
    }
  }


  if(check==0) {
      image.style.border="solid 3px blue";
      checkSolved();
    }

}
