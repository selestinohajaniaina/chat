var url = 'https://newsapi.org/v2/everything?' +
          'q=Apple&' +
          'from=2023-03-08&' +
          'sortBy=popularity&' +
          'apiKey=5124b31088564bf081f0d3b08c47f803';

var req = new Request(url);

 fetch(req)
    .then(async function(response) {
        var donne = await response.json();
        var ecran = document.querySelector("#data");
        let max =donne.articles.length;
        // let max =2;
        for(let i = 0;i<max;i++){
           let {author,description,publishedAt,title,url,urlToImage} = donne.articles[i];
            let div = document.createElement("div");
            div.innerHTML = `
            <div class="container">

            <div width="30%" class="image">
                 <img src="${urlToImage}"  alt="erreur du serveur" /> 
            </div>

                <div class="content">
                <a href="${url}" target="_blanck" class="title">
                    <div class="title_span">
                            ${title} :
                            <br>
                    </div>
                            <span class="author">${author}</span>
                </a> 

                    <div class="description">
                        <p>${description}</p>
                    </div>

                </div>
                <span class="date">${publishedAt}</span>
            </div>
            `;
            ecran.appendChild(div);
        }
        console.log(donne.articles);
    });
