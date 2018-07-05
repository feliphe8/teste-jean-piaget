<?php 

session_start();
require_once("vendor/autoload.php");
use \Slim\Slim;
use \Classes\Page;
use \Classes\Model\User;
use \Classes\Model\Address;
use \Classes\Model\Post;

$app = new Slim();

$app->config('debug', true);

require_once("functions.php");

// Home Page
$app->get('/', function() {
    
	$page = new Page();
	
	$page->setTpl("index");

});

// CRIANDO UM USUÀRIO
$app->post('/register', function(){
	// var_dump($_POST);
	// Pegando os dados do formulário referentes a classe User
	$userFromForm = array(
		"desname" => $_POST["desname"],
		"desbirth" => $_POST["desbirth"],
		"desbiograph" => $_POST["desbiograph"],
		"desemail" => $_POST["desemail"],
		"despassword" => $_POST["despassword"],
		"nrphone" => $_POST["nrphone"]
	);

	$user = new User();// Cria a instância do usuário
	$user->setData($userFromForm); // Carrega o usuário com os dados que veio do form.
	$user->save(); // Salva os dados que veio do form no banco e carrega a instância do usuário com os ultimos dados salvos no banco.

	// Pega os dados do formulário referentes a classe Address.
	$adressFromForm = array(
		"iduser" => $user->getiduser(),
		"deszipcode" => $_POST["deszipcode"],
		"desaddress" => $_POST["desaddress"],
		"desnumber" => $_POST["desnumber"],
		"deszipcode" => $_POST["deszipcode"],
		"descomplement" => $_POST["descomplement"],
		"desdistrict" => $_POST["desdistrict"],
		"descity" => $_POST["descity"],
		"desstate" => $_POST["desstate"],
		"descountry" => $_POST["descountry"]
	);

	$address = new Address();
	$address->setData($adressFromForm);
	$address->save();

	$_SESSION['registerValues'] = $_POST; // Coloca os dados cadastrados na SESSÃO
	User::login($_POST["desemail"], $_POST["despassword"]);

	header("Location: /dashboard");
	exit;

});

// Página de Login
$app->get('/login', function() {
    
	$page = new Page();
	
	$page->setTpl("login");

});

// Login - POST
$app->post('/login', function(){
	User::login($_POST["email"], $_POST["password"]);

	header("Location: /dashboard");
	exit;
});

// LOGOUT
$app->get('/logout', function(){
	User::logout();
	header("Location: /login");
	exit;
});

// Página do usuário
$app->get('/dashboard', function() {

	$user = User::getFromSession(); // Pega o usuário da sessão.
	
	User::verifyLogin(); // Verifica se o usuário está logado.

	$address = new Address();

	$address->getAddress($user->getiduser());
	//var_dump($address->getValues());
	
	$post = Post::getPosts($user->getiduser()); // Pega os posts do banco pelo ID do usuário

	$page = new Page();
	
	$page->setTpl("dashboard", array("user" => $user->getValues(), "posts" => $post, "address" => $address->getValues()));

});

// Página de criar relato
$app->get('/criar-relato', function() {

	User::verifyLogin();
    
	$page = new Page();
	
	$page->setTpl("create-relato");

});

// Criar Relato
$app->post('/criar-relato', function() {

	User::verifyLogin();
	$user = User::getFromSession();

	$userPost = array(
		"iduser" => $user->getiduser(),
		"destitle" => $_POST["destitle"],
		"desbody" => $_POST["desbody"]
	);

	$post = new Post();
	$post->setData($userPost);
	$post->save();

	header("Location: /dashboard");
	exit;
	
	

});

// Deletar relato
$app->get('/deletar-relato/:idpost', function($idpost) {

	User::verifyLogin();
    
	$post = new Post();

	$post->get((int)$idpost); // Pega um único post

	$post->delete();

	header("Location: /dashboard");
	exit;

});

// Página de atualizar relato
$app->get('/atualizar-relato/:idpost', function($idpost) {

	User::verifyLogin();

	$post = new Post();
	$post->get((int)$idpost); // Pega um único post
    
	$page = new Page();
	
	$page->setTpl("update-relato", array("post" => $post->getValues()));

});

// Atualizar relato
$app->post('/atualizar-relato/:idpost', function($idpost) {

	User::verifyLogin();

	$post = new Post();
	$post->get((int)$idpost); // Pega um único post
	$post->setData($_POST); // Seta a instância de post com os dados que vieram do form
	$post->update(); // Atualiza o post no BD e seta a instância de post com os dados atualizados

	header("Location: /dashboard");
	exit;

});



$app->run();

 ?>