// fonctions personnelles



/**
 * 
 * @param {*} id 
 * @param {*} div 
 * @param {*} nomVue 
 */
function chargeModale(id, div, nomVue){
    //console.log(numCompetence, login, div, nomVue);
    var http = new XMLHttpRequest();
    //var url = '../index.php';
    var params = "?action=modale&id="+id+"&nomVue="+nomVue;
    http.open('GET', params, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            //console.log(http.responseText);
            $(div).html(http.responseText);
        }
    }
    http.open('GET', params);
    http.send();
}