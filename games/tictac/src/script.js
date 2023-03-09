$(document).ready(function(){
    const croix = "<p id='plus' style='color:#b00606'>+</p>";
    const circle = "<p id='rong' style='transform:none;font-size:50pt;color:#359f00'>O</p>";
    let tour=0;
    let colonne="num";
    $(".case").click(function(){
        if($(this).attr("id")){
            $(this).html()=$(this).html();
            // console.log(tour);
        }else{
            if(tour==1){
                    $(this).html(circle);
                    $(this).attr("id",tour);
                    tour=0;
                    $(".icon").html(croix);
                }else{
                    $(this).html(croix);
                    $(this).attr("id",tour);
                    tour=1;
                    $(".icon").html(circle);
                }
        }
        //selection id
        const a = $("tr").eq(0).children("td").eq(0).attr("id");
        const b = $("tr").eq(0).children("td").eq(1).attr("id");
        const c = $("tr").eq(0).children("td").eq(2).attr("id");
        const d = $("tr").eq(1).children("td").eq(0).attr("id");
        const e = $("tr").eq(1).children("td").eq(1).attr("id");
        const f = $("tr").eq(1).children("td").eq(2).attr("id");
        const g = $("tr").eq(2).children("td").eq(0).attr("id");
        const h = $("tr").eq(2).children("td").eq(1).attr("id");
        const i = $("tr").eq(2).children("td").eq(2).attr("id");

        //comparate with id
        let resulte = [a+b+c,d+e+f,g+h+i,a+d+g,b+e+h,c+f+i,a+e+i,g+e+c];
        var allRes='';
        for(let i=0;i<8;i++){
            let response = resulte[i];
            if(response=="000" || response=="111"){
                setTimeout(()=>{
                    let signe=response=="000"?'x':'0';
                    alert(` La partie est terminé! \n Gagné est celui qui port le ${signe}`);
                    document.location.href='index.html';
                },300);
            }
            allRes+=response;
        }
        // console.log(typeof(eval(allRes)));
        if(typeof(eval(allRes))){
            setTimeout(()=>{
                alert(' La partie est terminé! \n Auccun gagné pour le moment.');
                document.location.href='index.html';
            },300);
        }else{
            console.clear();
        }
        allRes='';
    });
});