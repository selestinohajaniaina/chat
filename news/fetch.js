// var url = 'https://newsapi.org/v2/everything?' +
//           'q=Apple&' +
//           'from=2023-03-16&' +
//           'sortBy=popularity&' +
//           'apiKey=5124b31088564bf081f0d3b08c47f803';

var url = 'https://api.newscatcherapi.com/v2/search?' +
          'q=Tesla&' +
          'lang=en&'+
          'sort_by=relevancy&' +
          'page=1&' +
          'x-api-key=dor8jBr2OEePzEZKmmPF-EbBWgJBKD7h4DvG1_-riaM';

var req = new Request(url);

 fetch(req)
    .then(async function(response) {
        var donne = await response.json();
        // var ecran = document.querySelector("#data");
        // let max =donne.articles.length;
        // let max =2;
        // for(let i = 0;i<max;i++){
        //    let {author,description,publishedAt,title,url,urlToImage} = donne.articles[i];
        //     let div = document.createElement("div");
        //     div.innerHTML = `
        //     <div class="container">

        //     <div width="30%" class="image">
        //          <img src="${urlToImage/* image */}"  alt="erreur du serveur" /> 
        //     </div>

        //         <div class="content">
        //         <a href="${url/* url */}" target="_blanck" class="title">
        //             <div class="title_span">
        //                     ${title/* titre */} :
        //                     <br>
        //             </div>
        //                     <span class="author">${author/* autheur */}</span>
        //         </a> 

        //             <div class="description">
        //                 <p>${description/* description */}</p>
        //             </div>

        //         </div>
        //         <span class="date">${publishedAt/* date */}</span>
        //     </div>
        //     `;
        //     ecran.appendChild(div);
        // }
        console.log(donne);
    });
