var express = require('express');
var serve_static = require('serve-static');
var http = require('http');
var fs = require('fs');

var app = express();
//Activation du serveur statique
app.use(serve_static(__dirname+"/public"));
//Récupération du serveur http de l'application
var serveur = http.Server(app);

//Ecoute sur un seul port
serveur.listen(3005,function()
{
    console.log("Serveur en écoute sur le port 3005");
    console.log("http://localhost:3005/");
});

let database = JSON.parse(fs.readFileSync('database.json'));
let Voyages = new Array();
let Aeroports = database.Aeroports;

app.get('/Aeroports', function (req, res) {
	res.send(Aeroports);
});

app.get('/Voyages', function (req, res) {
	if(Voyages.length == 0){
		for(var i = 0 ; i < 10; i++){
			let prix = randomInt(200,1000);
			Voyages.push([randomTab(Aeroports),randomTab(Aeroports),prix]);
		}
	}

	res.send(Voyages);
});

var bodyParser = require('body-parser');
app.use(bodyParser.json()); // support json encoded bodies
app.use(bodyParser.urlencoded({ extended: true })); // support encoded bodies
let user = new Array();

app.post('/regist',function(req,res){
	let newUser = JSON.parse(req.body.data);
	console.log('Regist...');
	//verifications
	if(i = existUser(newUser) < 0){
		user.push(newUser);
		res.send(true);
	}

	console.log(user);
})

app.post('/user',function(req,res){
	let newUser = JSON.parse(req.body.data);
	console.log("checking...");
	//verifications
	var i = existUser(newUser);
	if(i < 0){
		res.send('-1');
	}else{
		res.send(JSON.stringify(user[i]));
	}
	console.log(user);
})

app.post('/saveUser',function(req,res){
	let saveUser = JSON.parse(req.body.data);
	console.log("save...");
	//verifications
	var i = existUser(saveUser);
	if(i < 0){
		console.log('error save');
		res.send(false);
	}else{
		user[i] = saveUserAccount(saveUser,user[i]);
		res.send(true);
	}
	console.log(user);
})


/*! \brief Function to get a random int between a min and max number
* \param integer min default value is 0
* \param integer max default value is 1
*/
function randomInt(min=0, max=1) {
	min = Math.ceil(min);
	max = Math.floor(max);
  	return Math.floor(Math.random() * (max - min + 1)) + min;
}


/*! \brief Function to get a random element into an array
* \return false if it's not an array or it length egual to 0
* \return a random element of array passed in parameters  
*/
function randomTab(tab){
	if(!Array.isArray(tab)){
		console.log("It's not an array");
		return false;
	}

	if(tab.length < 1){
		console.log("The array length is egual to 0")
		return false;
	}

	return Math.floor(Math.random() * tab.length);
}

/*! \brief Function to checked if a user exist
* \param newUser an array of object will be checked 
* \return -1 if not exist
* \return the index of the object
*/
function existUser(newUser){

	for (var i = 0; i < user.length; i++) {
		
		if(user[i].nom == newUser.nom
			&& user[i].prenom == newUser.prenom
			&& user[i].mail == newUser.mail){
			return i;
		}
	}
	
	return -1;
}

/*! \brief Function to checked if there are data which changed
* \param newUser an object which replace the oldUser
* \param oldUser an object which get data of newUser if it different
* \return the oldUser even if it not modified
*/
function saveUserAccount(newUser,oldUser){

	if(oldUser.nom != newUser.nom){
		oldUser.nom = newUser.nom;
	}

	if(oldUser.prenom != newUser.prenom){
		oldUser.prenom = newUser.prenom;
	}

	if(oldUser.mail != newUser.mail){
		oldUser.mail = newUser.mail;
	}

	if(JSON.stringify(oldUser.voyages) != JSON.stringify(newUser.voyages)){
		oldUser.voyages = newUser.voyages;
	}

	return oldUser;
}