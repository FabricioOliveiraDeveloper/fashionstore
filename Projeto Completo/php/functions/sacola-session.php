<?php 

if(!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

function addCart($id, $quantity) {
	if(!isset($_SESSION['carrinho'][$id])){ 
		$_SESSION['carrinho'][$id] = $quantity; 
	}
}

function deleteCart($id) {
	if(isset($_SESSION['carrinho'][$id])){ 
		unset($_SESSION['carrinho'][$id]); 
	} 
}

function updateCart($id, $quantity) {
	if(isset($_SESSION['carrinho'][$id])){ 
		if($quantity > 0) {
			$_SESSION['carrinho'][$id] = $quantity;
		} else {
		 	deleteCart($id);
		}
	}
}

function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['carrinho']) {
		
		$cart = $_SESSION['carrinho'];
		$products =  getProductsByIds($pdo, implode(',', array_keys($cart)));

		foreach($products as $product) {

			$results[] = array(
							  'id' => $product['id'],
                              'cod' => $product['cod'],
							  'name' => $product['nome'],
							  'price' => $product['preco'],
                              'desc' => $product['desconto'],
                              'total' => $product['total'],
                              'imagem01' => $product['imagem_01'],
                              'imagem02' => $product['imagem_02'],
                              'imagem03' => $product['imagem_03'],
                              'imagem04' => $product['imagem_04'],
							  'quantity' => $cart[$product['id']],
							  'subtotal' => $cart[$product['id']] * $product['total'],
						);
		}
	}
	
	return $results;
}

function getTotalCart($pdo) {
	
	$total = 0;

	foreach(getContentCart($pdo) as $product) {
		$total += $product['subtotal'];
	} 
	return $total;
}