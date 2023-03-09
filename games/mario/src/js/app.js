let plaing = false,
  word = text;
const person = document.getElementById("per");
const accident = document.getElementById("acs");
$(".acs").css({
  position: "absolute",
  bottom: 0,
  width: "30px",
  height: "50px",
  background: "#d55555",
  animation: "asc 3s linear infinite",
  right: "0",
  animationPlayState: "paused",
});
$(".button").click(() => {
  plaing = plaing ? false : true;
  setInterval(alive, 10);
  if (plaing) {
    $(".button").text("PAUSE");
    $(".acs").css({
      animationPlayState: "running",
    });
    change(0, "ru.gif");
  } else {
    $(".button").text("PLAY");
    $(".acs").css({
      animationPlayState: "paused",
    });
    change(0, "ju.png");
  }
});

$(document).keydown((e) => {
  if (e.code == "Space") {
    let perY = 0;
    let maxY = 20;

    for (let i = 1; i < 135; i += 0.5) {
      setTimeout(() => {
        if (i < maxY) {
          perY += 15 * (1 / i) + 1;
          change(perY, "ju.png");
        }
        if (i >= maxY) {
          perY -= 5 * (1 / i) + 1;
          change(perY, "ju.png");
        }
        if (perY < 0) {
          change(0, "ru.gif");
        }
      }, i * 10);
    }
  }
});

function change(down, img) {
  $(".per").css({
    bottom: down,
    backgroundImage: `url("src/img/${img}")`,
  });
}

var alive = setInterval(() => {
  let perMaxTop = parseInt(
    window.getComputedStyle(person).getPropertyValue("top")
  );
  let ascLeft = parseInt(
    window.getComputedStyle(accident).getPropertyValue("left")
  );
  console.log(`top : ${perMaxTop}    ac : ${ascLeft}`)
  if (ascLeft < 70 && ascLeft > 22 && perMaxTop > 145) {
    clearInterval(alive);
    console.log(`accident left ${ascLeft} `);

    $(".button").text("REPLAY");
    $(".acs").css({
      animationPlayState: "paused",
      right: "0",
    });
    change(0, "ju.png");
    plaing = false;
    word += "Oh sorry, you lose! <br>";
    $("p").html(word);
  }
}, 10);
