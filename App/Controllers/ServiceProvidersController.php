<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class ServiceProvidersController extends Action {

    public function validateAuthentication(){
        session_start();
        if(!isset($_SESSION['id']) || $_SESSION['id'] == null){
            header('Location: /?login=erro');
        }
    }

	public function serviceProviders(){
        $this->validateAuthentication();

        if($_SESSION['nivel_acesso'] == 'administrador'){
            $prestadores_servicos = Container::getModel('ServiceProviders');
            $this->view->prestadores_servicos = $prestadores_servicos->getAll();
            $this->render('service_providers_admin');
        }
        else{
            $prestadores_servicos = Container::getModel('ServiceProviders');
            $this->view->prestadores_servicos = $prestadores_servicos->getAll();
            $this->render('service_providers_user');
        }  
    }

    public function registerServiceProviders(){
        if($_POST['nome'] != '' &&  $_POST['cpf'] != '' && strlen($_POST['cpf']) == 14 && $_POST['telefone'] != '' && $_POST['apartamento'] != '' && $_POST['bloco'] != ''){
            $prestadores_servicos = Container::getModel('ServiceProviders');
            $moradores = Container::getModel('Residents');
            $visitantes = Container::getModel('Visitors');
            
            //Tratando duplicidade de CPF 
            foreach($prestadores_servicos->getAll() as $e){
                if($_POST['cpf'] == $e['cpf']){
                    echo "<script>alert('Erro ao realizar cadastro, um prestador de serviço ja possui este CPF!')</script>";
                    echo "<script> location.href = '/service_providers' </script>";
                    exit;
                }
            }
            foreach($moradores->getAll() as $e){
                if($_POST['cpf'] == $e['cpf']){
                    echo "<script>alert('Erro ao realizar cadastro, um morador ja possui este CPF!')</script>";
                    echo "<script> location.href = '/service_providers' </script>";
                    exit;
                }
            }
            foreach($visitantes->getAll() as $e){
                if($_POST['cpf'] == $e['cpf']){
                    echo "<script>alert('Erro ao realizar cadastro, um visitante ja possui este CPF!')</script>";
                    echo "<script> location.href = '/service_providers' </script>";
                    exit;
                }
            }
            
            $prestadores_servicos->nome = $_POST['nome'];
            $prestadores_servicos->cpf = $_POST['cpf'];
            $prestadores_servicos->telefone = $_POST['telefone'];
            $prestadores_servicos->apartamento = $_POST['apartamento'];
            $prestadores_servicos->bloco = $_POST['bloco'];
            $prestadores_servicos->registerServiceProvider();
            echo "<script>alert('Prestador de serviço cadastrado com sucesso!')</script>";
        }
        else if(strlen($_POST['cpf']) != 14){
            echo "<script>alert('Digite um CPF válido para realizar o cadastro!')</script>";
        }
        else{
            echo "<script>alert('Preencha todos os campos para realizar o cadastro!')</script>";
        }
        echo "<script> location.href = '/service_providers' </script>";
    }

    public function editServiceProviders(){
        if(isset($_POST['id_prestador_servico'])){
            $this->render('edit_service_providers');
        }else{
            echo "<script>alert('Selecione um registro para continuar!')</script>";
            echo "<script> location.href = '/service_providers' </script>";
        }
    }

    public function updateServiceProviders(){
        if(isset($_POST['id_prestador_servico'])){
            $prestadores_servicos = Container::getModel('ServiceProviders');
            $moradores = Container::getModel('Residents');
            $visitantes = Container::getModel('Visitors');
            
            foreach($prestadores_servicos->getAll() as $e){
                if($_POST['cpf'] == $e['cpf'] && $_POST['id_prestador_servico'] != $e['id_prestador_servico']){
                    echo "<script>alert('Erro ao atualizar registro, um prestador de serviço ja possui este CPF!')</script>";
                    echo "<script> location.href = '/service_providers' </script>";
                    exit;
                }
            } 
            foreach($moradores->getAll() as $e){
                if($_POST['cpf'] == $e['cpf']){
                    echo "<script>alert('Erro ao atualizar registro, um morador ja possui este CPF!')</script>";
                    echo "<script> location.href = '/service_providers' </script>";
                    exit;
                }
            }
            foreach($visitantes->getAll() as $e){
                if($_POST['cpf'] == $e['cpf']){
                    echo "<script>alert('Erro ao atualizar registro, um visitante ja possui este CPF!')</script>";
                    echo "<script> location.href = '/service_providers' </script>";
                    exit;
                }
            }
            
            $prestadores_servicos->nome = $_POST['nome'];
            $prestadores_servicos->cpf = $_POST['cpf'];
            $prestadores_servicos->telefone = $_POST['telefone'];
            $prestadores_servicos->apartamento = $_POST['apartamento'];
            $prestadores_servicos->bloco = $_POST['bloco'];
            $prestadores_servicos->id_prestador_servico = $_POST['id_prestador_servico'];
            $prestadores_servicos->updateServiceProvider();
            echo "<script>alert('Registro atualizado com sucesso!')</script>";
        }
        echo "<script> location.href = '/service_providers' </script>";
    }

    public function removeServiceProviders(){
        if(isset($_POST['id_prestador_servico'])){
            $this->render('remove_service_providers');
        }else{
            echo "<script>alert('Selecione um registro para continuar!')</script>";
            echo "<script> location.href = '/service_providers' </script>";
        }
    }

    public function deleteServiceProviders(){
        if(isset($_POST['id_prestador_servico'])){
            $prestadores_servicos = Container::getModel('ServiceProviders');
            $prestadores_servicos->id_prestador_servico = $_POST['id_prestador_servico'];
            $prestadores_servicos->deleteServiceProvider();
            echo "<script>alert('Registro excluído com sucesso!')</script>";
        }
        echo "<script> location.href = '/service_providers' </script>";
    }

    public function exportServiceProviders(){
        $this->validateAuthentication();
        $prestadores_servicos = Container::getModel('ServiceProviders');

        // Definindo o nome do arquivo que será exportado
		$arquivo = 'relacao_prestadores_servicos.xls';
        
        // Formatando estilo da tabela
        $style_first_header = "height: 60px; text-align:center; background-color:#1EA39C; color:#FFFFFF; display:table-cell; vertical-align:middle;";
        $style_second_header_name = "height: 45px; width: 300px; text-align:center; background-color:#F7F7F7; display:table-cell; vertical-align:middle;";
        $style_second_header = "height: 45px; width: 200px; text-align:center; background-color:#F7F7F7; display:table-cell; vertical-align:middle;";
        $style_titile_header = "font-size:22px";
        $style_content = "height:32px; text-align:center; font-size:20;  display:table-cell; vertical-align:middle";

		// Criando uma tabela HTML com o formato da planilha
        $html = '';
        $html .= '<meta charset="utf-8"/>';
		$html .= '<table border="1">';
		$html .= "<tr>";
		$html .= "<td colspan='7' style='$style_first_header'><h2>Prestadores de serviços</h2></td>";
		$html .= "</tr>";
		$html .= '<tr>';
		$html .= "<td style='$style_second_header_name'><h4 style='$style_titile_header'>Nome</h4></td>";
		$html .= "<td style='$style_second_header'><h4 style='$style_titile_header'>CPF</h4></td>";
		$html .= "<td style='$style_second_header'><h4 style='$style_titile_header'>Telefone</h4></td>";
        $html .= "<td style='$style_second_header'><h4 style='$style_titile_header'>Apartamento</h4></td>";
        $html .= "<td style='$style_second_header'><h4 style='$style_titile_header'>Bloco</h4></td>";
        $html .= "<td style='$style_second_header'><h4 style='$style_titile_header'>Data de entrada</h4></td>";
        $html .= "<td style='$style_second_header'><h4 style='$style_titile_header'>Hora de entrada</h4></td>";
		$html .= '</tr>';
        foreach($prestadores_servicos->getAll() as $prestadores_servicos){
            $html .= "<tr style='$style_content'>";
			$html .= '<td>'.$prestadores_servicos["nome"].'</td>';
			$html .= '<td>'.$prestadores_servicos["cpf"].'</td>';
			$html .= '<td>'.$prestadores_servicos["telefone"].'</td>';
            $html .= '<td>'.$prestadores_servicos['apartamento'].'</td>';
            $html .= '<td>'.$prestadores_servicos['bloco'].'</td>';
            $html .= '<td>'.date('d/m/Y', strtotime($prestadores_servicos['data_de_entrada'])).'</td>';
            $html .= '<td>'.date('H:i', strtotime($prestadores_servicos['data_de_entrada'])).'</td>';
			$html .= '</tr>';
        }
        
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit;
    }
}

?>