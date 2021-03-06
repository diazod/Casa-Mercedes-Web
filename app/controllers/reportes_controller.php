﻿<?php
class ReportesController extends AppController {
	var $name = 'Reportes';
	var $uses = array();
	var $helpers = array('Html', 'Session', 'ImagenesGaleria', 'HerramientasCalculos');
	
	
	function beforeFilter() {
        parent::beforeFilter(); 
        $this->layout = "panel_control";
    }
	
	/**
	* Genera reportes segun la selección tipo de reporte y la persona buscada
	*/
	function index() {
		$this->layout = "panel_control";
		Debug($this->data);
		//Todo ejecuta método para la generacióe reporte segun el tipo selecionado
	}

	function ficha_identificacion() {
		$this->layout = "reportes";
		$persona = $this->requestAction(
							array(
								'controller' => 'personas',
								'action' => 'fichaIdentificacionPorId',
								'named' => array('id' => $this->params["named"]['id'])
							));	
		$this->set($persona);
	}
	
	function estudio_social(){
		$this->layout = "reportes";
		$this->layout = "reportes";
		$persona = $this->requestAction(
							array(
								'controller' => 'personas',
								'action' => 'estudioSocialPorId',
								'named' => array('id' => $this->params["named"]['id'])
							));
		Debug($persona);
		$this->set($persona);
	}
	
	function convertPdf()
	{
		ob_clean();
		$this->render(false);
		require_once ('vendors/html2pdf/html2pdf.class.php');
		$html2pdf = new HTML2PDF('P','A4','fr');
		$content =  file_get_contents($this->obtenerRuta($this->params["named"]['ruta'], $this->params["named"]['id']));
		$html2pdf->WriteHTML($content);
		ob_clean();
		$html2pdf->Output('exemple.pdf');
		/*
		
		require_once ('vendors/dompdf/dompdf_config.inc.php'); 
		
		$content =  file_get_contents($this->obtenerRuta($this->params["named"]['ruta'], $this->params["named"]['id']));
		
		
		$dompdf = new DOMPDF();
		$dompdf->load_html($content);
		$dompdf->set_paper("a4", "landscape" );
		$dompdf->render();
		$dompdf->stream('Reporte_'.date('d_M_Y').'.pdf');
		*/
		
	}
	
	function obtenerRuta($ruta, $id)
	{	
		return Router::url('/', true) . 'reportes/'.$ruta.'/id:'.$id;
	}
	
	
}
