$(document).ready(function() {
    var cardContainer = $('#cardContainer');
  
    // Headers a serem incluídos na requisição
    var headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    };
  
    // Configuração da requisição, incluindo os headers
    var requestConfig = {
      url: 'http://127.0.0.1:8000/api/images',
      method: 'GET',
      dataType: 'json',
      headers: headers,  // Adicionando os headers à requisição
      success: function(data) {
        // Manipular os dados recebidos e criar os cards dinamicamente
        data.images.forEach(function(item) {
          var card = $('<div class="col"><div class="card"><img src="' + item.url + '" class="card-img-top" alt="' + item.name + '"><div class="card-body"><h5 class="card-title">' + item.name + '</h5></div></div></div>');
          cardContainer.append(card);
        });
      },
      error: function(error) {
        console.log('Erro na requisição à API:', error);
      }
    };
  
    // Fazer a requisição GET à API
    $.ajax(requestConfig);
  });