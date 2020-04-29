<?PHP

Rota::add('/',function(){
	LoginCtrl::index();
});

Rota::add('/verificar-login',function(){
  	LoginCtrl::verificarLogin($_POST['email'],$_POST['manterConectado']);
},'post');

Rota::add('/compras',function(){
  	ComprasCtrl::index();
});

Rota::add('/confirmar-compra',function(){

	if(isset($_POST['dados'])){
		
		$dadosJsn = $_POST['dados'];
		$dados = json_decode($dadosJsn);

		if(isset($dados->usuario)){
			ComprasCtrl::confirmarCompra($dados->usuario,$dados->qtdCesta,$dados->qtdGeladeira);
		}else{
			echo('erro');
		}
	}else{
		echo('erro');
	}
},'post');

Rota::add('/finalizar',function(){
	ComprasCtrl::finalizar();
});

Rota::add('/sair',function(){
  	LoginCtrl::sair();
});

Rota::pathNotFound(function($path){
  	echo 'Erro 404 <br/>';
  	echo 'Página '.$path.'" não encontrada!';
});

Rota::methodNotAllowed(function($path, $method){
  	echo 'Erro 405 <br/>';
	echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});