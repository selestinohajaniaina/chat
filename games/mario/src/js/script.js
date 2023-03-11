let content = $("p").text();

let text = `
Bienvenue dans Super Mario jumper, cliquer sur play pour commencer et espace pour sauter.
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
