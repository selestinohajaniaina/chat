var url = 'https://newsapi.org/v2/everything?' +
          'q=Apple&' +
          'from=2023-03-08&' +
          'sortBy=popularity&' +
          'apiKey=5124b31088564bf081f0d3b08c47f803';

var req = new Request(url);

 fetch(req)
    .then(async function(response) {
        console.log(await response.json());
    });
