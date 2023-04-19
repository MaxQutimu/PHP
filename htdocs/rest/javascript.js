

persons = [
    {id: 12, name: 'Cathy Mill', role: 'manager', gender: 'female', age: 26},
    {id: 45, name: 'Mohamed Johnson', role: 'client', gender: 'male', age: 11},
    {id: 3, name: 'Rose Ogene', role: 'designer', gender: 'female', age: 21},
    
  ]
  //console.dir
function showPerson(person){
    console.dir(person);
    let personWindow = document.getElementById('person');
    personWindow.innerText = `name: ${person.name} \nrole: ${person.role}`;
}
//clientside button
getPersonButton = document.getElementById('get-person')

//clientside

function getPersonButton_clicked(event){
    console.log('clicked');
    showPerson(persons[0]);
}
getPersonButton.onclick = getPersonButton_clicked;

//serverside button
getPersonButtonServer = document.getElementById('get-person-serverside')

//serverside communicatie

function load(event){
    person = this.response;
    showPerson(person);
}

function getPersonButtonServer_clicked(event){
    console.log('second button clicked');
    let request = new XMLHttpRequest();
    request.open('GET','phpscript.php');
    request.responseType = 'json';
    request.onload = load;
    request.send();
    //showPerson(persons[1]);
}

getPersonButtonServer.onclick = getPersonButtonServer_clicked;