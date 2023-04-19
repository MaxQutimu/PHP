function load(event){
    console.dir(this.response);
    let cars = this.response;
    let ul = document.querySelector('ul');
    for (let car of cars){
        li = document.createElement('li');
        li.innerHTML = `<strong>Brand:</strong> ${car.brand} ` + ` <strong>Model:</strong> ${car.model} ` + ` <strong>Color:</strong> ${car.color} ` + ` <strong>Consturction Year:</strong> ${car.consturction_year} ` + ` <strong>License Plate:</strong> ${car.license_plate} ` + ` <strong>Price:</strong> € ${car.Price} ` + ` <strong>Status:</strong> ${car.Status} `;
        ul.appendChild(li);
        li = document.createElement('li');
        ul.appendChild(li);
    }
}

let request = new XMLHttpRequest();
request.open('GET','carslist.php');
request.responseType = 'json';
request.onload = load;
request.send();
