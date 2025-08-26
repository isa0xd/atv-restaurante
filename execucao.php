<?php

require_once("modelo/Pedido.php");
require_once("modelo/Prato.php");

//Função para listar os pratos
function listarPratos($pratos)
{
    if (count($pratos) > 0) {
        foreach ($pratos as $i => $prato)
            printf(
                "%d- Número: %s | Nome: %s | Valor: %f\n",
                $i + 1,
                $prato->getNumero(),
                $prato->getNome(),
                $prato->getValor()
            );
    } else
        echo "Nenhum prato cadastrado.\n";
}


function retornaPratos($pratos, $numero)
{

    foreach ($pratos as $p) {
        if ($numero == $p->getNumero())
            return $p;
    }

    return null;
}

$prato1 = new Prato;
$prato1->setNumero(1);
$prato1->setNome("Camarão à Milanesa");
$prato1->setValor(110);

$prato2 = new Prato;
$prato2->setNumero(2);
$prato2->setNome("Pizza Margherita");
$prato2->setValor(80);

$prato3 = new Prato;
$prato3->setNumero(3);
$prato3->setNome("Macarrão à Carbonara");
$prato3->setValor(60);

$prato4 = new Prato;
$prato4->setNumero(4);
$prato4->setNome("Bife à Parmegiana");
$prato4->setValor(75);

$prato5 = new Prato;
$prato5->setNumero(5);
$prato5->setNome("Risoto ao Fungi");
$prato5->setValor(70);

$pratos = array(
    $prato1,
    $prato2,
    $prato3,
    $prato4,
    $prato5
);

//menu

do {
    echo "\n\n------MENU------\n";
    echo "1- Cadastrar pedido\n";
    echo "2- Cancelar pedido\n";
    echo "3- Listar pedidos\n";
    echo "4- Total de vendas: ";
    echo "0- Sair\n";
    $opcao = readline("Informe a opção: ");

    echo "\n";

    switch ($opcao) {
        case 1:
            $pedido = new Pedido;
            $pedido->setNomeCliente(readline("Informe o nome do cliente: "));
            $pedido->setNomeGarcom(readline("Informe o nome do garçom: "));

            foreach ($pratos as $p) {
                echo $p->getNumero() . " - " . $p->getNome() . " - " . $p->getValor() . "\n";
            }



            break;

        case 2;
            //cancelar
            break;

        case 3;
            foreach ($pedidos as $pedido) {
                print("O cliente " . $pedido->setNomeCliente() . ", foi atendido pelo garçom " . $pedido->setNomeGarcom() . ", pediu um prato de " . $pedido->setPrato() . ", no valor de R$" . $pedido->setValor());
            }
            break;

        case 4;
            //total
            break;

        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "Opção inválida!\n";
    }
} while ($opcao != 0);
