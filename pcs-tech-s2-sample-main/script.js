function auth(login, password) {
    var client = new HttpClient();
    client.get("https://djdesbsdfpnznjezkrsom3g2du0fkuls.lambda-url.us-east-1.on.aws?login="+login+"&password="+password+"", function(response) {
         let elem = document.createElement('div');
         elem.innerHTML = response;
         document.getElementById('result').appendChild(elem);
         //document.getElementById('result').innerHTML = response;
    });
}

var HttpClient = function() {
    this.get = function(aUrl, aCallback) {
        var anHttpRequest = new XMLHttpRequest();
        anHttpRequest.onreadystatechange = function() { 
            if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                aCallback(anHttpRequest.responseText);
        }

        anHttpRequest.open( "GET", aUrl, true );            
        anHttpRequest.send( null );
    }
}