function load(event){
    console.dir(this.response);
    let clients = this.response;
    let ul = document.querySelector('ul');
    for (let client of clients){
        li = document.createElement('li');
        li.innerText = `Name: ${client.name}` + ` Phone: ${client.phone}` + ` Adres: ${client.address}`;
        ul.appendChild(li);
    }
}

let request = new XMLHttpRequest();
request.open('GET','clients.php');
request.responseType = 'json';
request.onload = load;
request.send();
