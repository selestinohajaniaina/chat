let content = $("p").text();

let text = `
Welcome to this litle jumper Game. Let's share our fun :) 
use your space key to jump!
use this yellow button to play the Game.<br>
<br> GO<br>
        `;
let nbr = text.length;
var newText = "";
for (let i = 0; i < nbr; i++) {
  setTimeout(() => {
    newText += text[i];
    $("p").html(newText + " <span id='wait'>_</span>");
  }, i * 100);
}

// var text2 = text;
// $(document).keydown((e) => {
//   if (e.code == "Enter") {
//     text2 += `<br>`;
//   } else {
//     text2 += e.key;
//   }
//   $("p").html(text2 + ` <span id="wait">_</span>`);
// });
