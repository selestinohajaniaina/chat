let plaing = false,
  word = text;
const person = document.getElementById("per");
const accident = document.getElementById("acs");
$(".acs").css({
  position: "absolute",
  bottom: 0,
  width: "30px",
  height: "50px",
  backgroundImage: "url('src/img/cactus.png')",
  backgroundSize:"contain",
  backgroundRepeat:"no-repeat",
  animation: "asc 3s linear infinite",
  right: "0",
  animationPlayState: "paused",
});
$(".button").click(() => {
  plaing = plaing ? false : true;
  if (plaing) {
    setInterval(alive, 10);
    $(".button").text("PAUSE");
    $(".acs").css({
      animationPlayState: "running",
    });

    $(".back").css({
      animation: "bouge 7s linear infinite",
    });
    $(".back1").css({
      animation: "bouge1 7s linear infinite",
    });

    change(0, "ru.gif");

  } else {

    $(".button").text("PLAY");
    $(".acs").css({
      animationPlayState: "paused",
    });
    $(".back").css({
      animation: "none",
    });
    $(".back1").css({
      animation: "none",
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

  console.log(`top : ${perMaxTop}    ac : ${ascLeft}`);

  if ( ascLeft <= 70 && ascLeft >= 40 && perMaxTop >= 90) {
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
    
    var odv = document.createElement("dialog");
    odv.innerHTML=("GAME OVER");
    document.body.append(odv);
    odv.showModal();
    $("dialog").css({
      position:"fixed",
      color:"white",
      background:"transparent",
      top:"45%",
      left:"35%",
      fontSize:"72pt"
    })

    $(".back").css({
      animation: "none",
    });
    $(".back1").css({
      animation: "none",
    });


  }
}, 10);
