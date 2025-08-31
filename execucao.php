<?php

require_once("modelo/Pedido.php");
require_once("modelo/Prato.php");

//Função para listar os pedidos
function listarPedidos($pedidos) {
    if (count($pedidos) > 0) {
        foreach ($pedidos as $i => $pedido) {
            echo ($i+1) . ") O cliente " . $pedido->getNomeCliente() .
                 ", foi atendido pelo garçom " . $pedido->getNomeGarcom() .
                 ", pediu um prato de " . $pedido->getPrato()->getNome() .
                 " no valor de R$ " . $pedido->getPrato()->getValor() . "\n";
        }
    } else {
        echo "Nenhum pedido cadastrado.\n";
    }
}

function retornarPrato($pratos, $numero) {
    foreach ($pratos as $p) {
        if ($numero == $p->getNumero()) {
            return $p;
        }
    }
    return null;
}


$p1 = new Prato;
$p1->setNumero(1);
$p1->setNome("Camarão à Milanesa");
$p1->setValor(110);

$p2 = new Prato;
$p2->setNumero(2);
$p2->setNome("Pizza Margherita");
$p2->setValor(80);

$p3 = new Prato;
$p3->setNumero(3);
$p3->setNome("Macarrão à Carbonara");
$p3->setValor(60);

$p4 = new Prato;
$p4->setNumero(4);
$p4->setNome("Bife à Parmegiana");
$p4->setValor(75);

$p5 = new Prato;
$p5->setNumero(5);
$p5->setNome("Risoto ao Funghi");
$p5->setValor(70);

$pratos = array($p1, $p2, $p3, $p4, $p5);

$pedidos = array();

//menu
do {
    echo "----MENU----\n";
    echo "1- Cadastrar\n";
    echo "2- Cancelar \n";
    echo "3- Listar \n";
    echo "4- Total de vendas \n";
    echo "0- Sair\n";
    $opcao = readline("Informe a opção: ");

    echo "\n";

    switch ($opcao) {
        case 1:
            //cadastrar pedido
            $pedido = new Pedido();
            $pedido->setNomeCliente(readline("Informe o nome do cliente: "));
            $pedido->setNomeGarcom(readline("Informe o nome do garçom: "));
            
            //exibir os pratos p usuário
            foreach ($pratos as $p) {
                echo $p->getNumero() . " - " . $p->getNome() . " - R$ " . $p->getValor() . "\n";
            }

            //informar o num do prato q ele quer
            $numeroPrato = readline("Informe o número do prato: ");
            $prato = retornarPrato($pratos, $numeroPrato);

            if ($prato !== null) {
                $pedido->setPrato($prato);
                $pedidos[] = $pedido;
                echo "Pedido cadastrado com sucesso!\n";
            } else {
                echo "Prato inválido!\n";
            }
            break;

        case 2:
            //cancelar pedido
            if (count($pedidos) > 0) {
                listarPedidos($pedidos);
                $idx = readline("Informe o número do pedido para excluir: ");
                if ($idx > 0 && $idx <= count($pedidos)) {
                    array_splice($pedidos, $idx-1, 1);
                    echo "Pedido cancelado!\n";
                } else {
                    echo "Número inválido!\n";
                }
            } else {
                echo "Nenhum pedido para cancelar.\n";
            }
            break;

        case 3:
            //listar pedidos
            listarPedidos($pedidos);
            break;

        case 4:
            //total de vendas
            $total = 0;
            foreach ($pedidos as $pedido) {
                $total += $pedido->getPrato()->getValor();
            }
            echo "Total de vendas: R$ " . $total . "\n";
            break;

        case 0:
            echo "Programa encerrado! \n";
            break;
        
        default:
            echo "Opção inválida!\n";
    }
} while ($opcao != 0);
