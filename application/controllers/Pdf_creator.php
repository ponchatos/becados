<?php
Class Pdf_creator extends CI_Controller {

public function __construct(){
    parent::__construct();
    $this->load->library("Pdf");

    $this->load->helper('form');

    $this->load->library('session');

    // Load form validation library
    $this->load->library('form_validation');

}


    public function index(){
        $this->form_validation->set_rules('id_solicitud', 'Solicitud', 'trim|required|xss_clean|numeric');
        if ( ( $this->form_validation->run() == FALSE ) && ( $this->input->get('id_solicitud') == null )) {
            echo "No se ha recibido petición de Solicitud";
        }else{
            $id_solicitud = ( $this->input->get('id_solicitud')==null ? $this->input->post('id_solicitud') : $this->input->get('id_solicitud') );
            
            $this->load->model('read_data');
            $query = $this->read_data->get_solicitud_info($id_solicitud);

            if(!$query){
                echo "No se ha encontrado la solicitud";
                return FALSE;
            }


            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);   
          
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Patronato');
            $pdf->SetTitle('Solicitud.pdf');
            $pdf->SetSubject('Formato de beca');
            $pdf->SetKeywords('Beca, PDF, patronato');  
          
            // set default header data
            //$pdf->SetHeaderData('css/images/pat.jpg', '40', 'Recibo de inscripcion', 'blabla', array(0,64,255), array(0,64,128));
            //$pdf->setFooterData(array(0,64,0), array(0,64,128));
          
            // set header and footer fonts
            //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
          
            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
          
            // set margins
            $pdf->SetMargins(0, 0, 0);
            $pdf->SetHeaderMargin(0);
            //$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);   
          
            // set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, 0);
          
            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
          
            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }  
          
            // ---------------------------------------------------------   
          
            // set default font subsetting mode
            $pdf->setFontSubsetting(true);  
          
            // Set font
            // dejavusans is a UTF-8 Unicode font, if you only need to
            // print standard ASCII chars, you can use core fonts like
            // helvetica or times to reduce file size.
            $pdf->SetFont('dejavusans', '', 14, '', true);  
          
            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();
          
            // set text shadow effect
            //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));   
            

            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $pdf->getAutoPageBreak();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            //$img_file = base_url()."uploads/".;
            //$img_file=base_url()."".$carrera_info->diploma_url;
            $pdf->Image(base_url()."css/images/Solicitud.png", 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $pdf->setPageMark();


            // Print a text
            /*$html = '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <span style="color:black;text-align:center;font-weight:bold;font-size:23pt;">ultrareultra reutlra reultraultraultraultra largisisisisisimo</span>';*/
            
            //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
            $fol=$id_solicitud;
            while(strlen($fol)<5){
                $fol='0'.$fol;
            }
                
            $pdf->SetTextColor(255,0,0);
            $pdf->SetXY(80,15);
            $pdf->cell(50,10,"SOLICITUD DE BECA",0,0,'L',false,'',1);    
            $pdf->SetTextColor(0,0,0);
            $pdf->SetXY(140,20);
            $pdf->cell(30,30,"FOTOGRAFÍA",1,0,'L',false,'',1);    
            $pdf->SetTextColor(0,0,0);
            $pdf->SetXY(10,38);     
            $pdf->cell(38,8,"N° de Solicitud:",0,0,'L',false,'',1);
            $pdf->SetXY(48,38);     
            $pdf->cell(18,8,$fol,"B",0,'L',false,'',1);        
            $pdf->SetXY(176,38);
            $pdf->cell(25,8,$query['fec_solicitud'],"B",0,'L',false,'',1);               
            $pdf->SetXY(75,50);
            $pdf->cell(60,10,"1.- DATOS PERSONALES",0,0,'L',false,'',1); 
            $pdf->SetXY(13,63);
            $pdf->cell(20,10,"Nombre:",0,0,'L',false,'',1); 
            $pdf->SetXY(33,63);
            $pdf->cell(96,10,$query['nombre']." ".$query['ape_pat']." ".$query['ape_mat'],"B",0,'L',false,'',1); 
            $pdf->SetXY(129,63);
            $pdf->cell(38,10,"Fecha Nacimiento:",0,0,'L',false,'',1); 
            $pdf->SetXY(167,63);
            $pdf->cell(28,10,$query['fec_nac'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,73);
            $pdf->cell(15,10,"Sexo:",0,0,'L',false,'',1); 
            $pdf->SetXY(28,73);
            $pdf->cell(10,10,$query['sexo'],"B",0,'L',false,'',1); 
            $pdf->SetXY(48,73);
            $pdf->cell(30,10,"Estado Civil:",0,0,'L',false,'',1); 
            $pdf->SetXY(78,73);
            $pdf->cell(30,10,$query['estado_civil_solicitante'],"B",0,'L',false,'',1); 
            $pdf->SetXY(118,73);
            $pdf->cell(16,10,"Hijos:",0,0,'L',false,'',1); 
            $pdf->SetXY(134,73);
            $pdf->cell(10,10,$query['hijos'],"B",0,'L',false,'',1); 
            $pdf->SetXY(13,83);
            $pdf->cell(25,10,"Dirección:",0,0,'L',false,'',1);
            $pdf->SetXY(38,83);
            $pdf->cell(90,10,$query['calle']." #".$query['num_casa'],"B",0,'L',false,'',1);
            //$pdf->SetXY(113,83);
            //$pdf->cell(15,10,"#".$query['num_casa'],"B",0,'L',false,'',1);
            $pdf->SetXY(128,83);
            $pdf->cell(66,10,"Colonia: ".$query['colonia'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,93);
            $pdf->cell(60,10,"Entre ".$query['entre_calle_1'],"B",0,'L',false,'',1);
            $pdf->SetXY(73,93);
            $pdf->cell(60,10,"y ".$query['entre_calle_2'],"B",0,'L',false,'',1);
            $pdf->SetXY(133,93);
            $pdf->cell(61,10,"cerca de ".$query['cerca_de'],"B",0,'L',false,'',1);       
            $pdf->SetXY(13,103);        
            $pdf->cell(20,10,"Ciudad:",0,0,'L',false,'',1); 
            $pdf->SetXY(33,103);
            $pdf->cell(40,10,$query['ciudad'],"B",0,'L',false,'',1); 
            $pdf->SetXY(73,103);
            $pdf->cell(24,10,"Teléfono:",0,0,'L',false,'',1); 
            $pdf->SetXY(97,103);
            $pdf->cell(33,10,$query['tel'],"B",0,'L',false,'',1); 
            $pdf->SetXY(130,103);
            $pdf->cell(20,10,"Correo:",0,0,'L',false,'',1); 
            $pdf->SetXY(150,103);
            $pdf->cell(44,10,$query['correo'],"B",0,'L',false,'',1);     
            
            $pdf->SetXY(75,115);
            $pdf->cell(60,10,"2.- DATOS FAMILIARES",0,0,'L',false,'',1); 
            $pdf->SetXY(13,127);
            $pdf->cell(48,10,"Nombre del Padre o Tutor:",0,0,'L',false,'',1); 
            $pdf->SetXY(61,127);
            $pdf->cell(100,10,$query['padre_nombre']." ".$query['padre_ape_pat']." ".$query['padre_ape_mat'],"B",0,'L',false,'',1); 
            $pdf->SetXY(161,127);
            $pdf->cell(18,10,"Edad:",0,0,'L',false,'',1); 
            $pdf->SetXY(179,127);
            $pdf->cell(15,10,$query['padre_edad'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,137);
            $pdf->cell(30,10,"Escolaridad:",0,0,'L',false,'',1); 
            $pdf->SetXY(43,137);
            $pdf->cell(35,10,$query['padre_nivel_educativo'],"B",0,'L',false,'',1); 
            $pdf->SetXY(78,137);
            $pdf->cell(30,10,"Ocupacion:",0,0,'L',false,'',1); 
            $pdf->SetXY(108,137);
            $pdf->cell(55,10,$query['padre_ocupacion'],"B",0,'L',false,'',1);
            $pdf->SetXY(163,137);
            $pdf->cell(30,10,"Estado: ".( $query['padre_vivo_muerto']==1 ? "Vivo" : "Finado" ),"B",0,'L',false,'',1);
            $pdf->SetXY(13,147);
            $pdf->cell(48,10,"Nombre de la Madre o Tutor:",0,0,'L',false,'',1); 
            $pdf->SetXY(61,147);
            $pdf->cell(100,10,$query['madre_nombre']." ".$query['madre_ape_pat']." ".$query['madre_ape_mat'],"B",0,'L',false,'',1); //$query['']
            $pdf->SetXY(161,147);
            $pdf->cell(18,10,"Edad:",0,0,'L',false,'',1); 
            $pdf->SetXY(179,147);
            $pdf->cell(15,10,$query['madre_edad'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,157);
            $pdf->cell(30,10,"Escolaridad:",0,0,'L',false,'',1); 
            $pdf->SetXY(43,157);
            $pdf->cell(35,10,$query['madre_nivel_educativo'],"B",0,'L',false,'',1); 
            $pdf->SetXY(78,157);
            $pdf->cell(30,10,"Ocupacion:",0,0,'L',false,'',1); 
            $pdf->SetXY(108,157);
            $pdf->cell(55,10,$query['madre_ocupacion'],"B",0,'L',false,'',1);
            $pdf->SetXY(163,157);
            $pdf->cell(30,10,"Estado: ".( $query['madre_vivo_muerto']==1 ? "Vivo" : "Finado" ),"B",0,'L',false,'',1);
            $pdf->SetXY(13,167);
            $pdf->cell(55,10,"Estado Civil de los Padres:",0,0,'L',false,'',1); 
            $pdf->SetXY(68,167);
            $pdf->cell(30,10,$query['edo_civil_padres'],"B",0,'L',false,'',1); 
            $pdf->SetXY(13,177);
            $pdf->cell(70,10,"Actualmente, ¿Con quién vives?",0,0,'L',false,'',1); 
            $pdf->SetXY(83,177);
            $pdf->cell(100,10,$query['vive_con'],"B",0,'L',false,'',1); 
            $pdf->SetXY(13,187);
            $pdf->cell(100,10,"¿Cuántas personas dependen del ingreso familiar?",0,0,'L',false,'',1); 
            $pdf->SetXY(113,187);
            $pdf->cell(30,10,$query['personas_dependen_ingreso'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,197);
            $pdf->cell(70,10,"¿Cuántas de ellas estudian?",0,0,'L',false,'',1); 
            $pdf->SetXY(83,197);
            $pdf->cell(30,10,$query['familia_estudian'],"B",0,'L',false,'',1); 
            $pdf->SetXY(13,207);
            $pdf->cell(70,10,"¿En qué niveles educativos?",0,0,'L',false,'',1); 
            $pdf->SetXY(83,207);
            $pdf->cell(110,10,$query['niveles_estudian'],"B",0,'L',false,'',1); 
            $pdf->SetXY(75,220);
            $pdf->cell(60,10,"3.- DATOS ESCOLARES",0,0,'L',false,'',1); 
            $pdf->SetXY(82,230);
            $pdf->cell(40,4,"(Escuela a la que ingresará)",0,0,'L',false,'',1);             
            $pdf->SetXY(13,240);
            $pdf->cell(80,10,"Nivel Eductivo: ".$query['nivel_educativo'],"B",0,'L',false,'',1);
            $pdf->SetXY(93,240);
            $pdf->cell(100,10,"Estado: ".$query['estado'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,250);
            $pdf->cell(135,10,"Escuela: ".$query['escuela'],"B",0,'L',false,'',1);
            $pdf->SetXY(148,250);
            $pdf->cell(45,10,"Turno: ".$query['turno'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,260);
            $pdf->cell(80,10,"Carrera: ".$query['carrera'],"B",0,'L',false,'',1);
            $pdf->SetXY(93,260);
            $pdf->cell(100,10,"Semestre o Grado Escolar: ".$query['grado'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,270);
            $pdf->cell(80,10,"Promedio: ".$query['promedio'],"B",0,'L',false,'',1);
            
                    
            $pdf->AddPage();
                  
            // set text shadow effect
            //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));   
          
            // -- set new background ---

            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $pdf->getAutoPageBreak();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            //$img_file = base_url()."uploads/".;
            //$img_file=base_url()."".$carrera_info->diploma_url;
            $pdf->Image(base_url()."css/images/Solicitud.png", 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $pdf->setPageMark();


            // Print a text
            /*$html = '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <span style="color:black;text-align:center;font-weight:bold;font-size:23pt;">ultrareultra reutlra reultraultraultraultra largisisisisisimo</span>';*/
            
            //Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
            $pdf->SetXY(85,20);
            $pdf->cell(40,10,"4.- ENCUESTA",0,0,'L',false,'',1); 
            $pdf->SetXY(13,40);
            $pdf->cell(180,10,"1.-¿Cuál es el total de cuartos, piezas o habitaciones con los que cuenta su hogar?",0,0,'L',false,'',1);
            $pdf->SetXY(18,50);
            $pdf->cell(30,10,$query['res1'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,60);
            $pdf->cell(180,10,"2.-¿Cuántos baños completos con regadera y W.C.(excusado) hay para uso exclusivo de los integrandes de su hogar?",0,0,'L',false,'',1);
            $pdf->SetXY(18,70);
            $pdf->cell(30,10,$query['res2'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,80);
            $pdf->cell(180,10,"3.-¿En el hogar cuenta con regadera funcionando en alguno de los baños?",0,0,'L',false,'',1);
            $pdf->SetXY(18,90);
            $pdf->cell(30,10,$query['res3'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,100);
            $pdf->cell(180,10,"4.-Contando todos los fotos que utiliza para iluminar su hogar, incluyendo los techos,",0,0,'L',false,'',1);
            $pdf->SetXY(18,110);
            $pdf->cell(170,10,"paredes y lámparas de buró o piso.¿Cuántos focos tiene la vivienda?",0,0,'L',false,'',1);
            $pdf->SetXY(18,120);
            $pdf->cell(30,10,$query['res4'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,130);
            $pdf->cell(180,10,"5.-¿El piso de su hogar es predominantemente de tierra, o de cemento, o de algún otro tipo de acabado?",0,0,'L',false,'',1);
            $pdf->SetXY(18,140);
            $pdf->cell(70,10,$query['res5'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,150);
            $pdf->cell(180,10,"6.-¿Cuantos automoviles propios, excluyendo taxis, tienen en su hogar?",0,0,'L',false,'',1);
            $pdf->SetXY(18,160);
            $pdf->cell(30,10,$query['res6'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,170);
            $pdf->cell(180,10,"7.-¿Cuántas televisiones a color funcionando tienen en su hogar?",0,0,'L',false,'',1);
            $pdf->SetXY(18,180);
            $pdf->cell(30,10,$query['res7'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,190);
            $pdf->cell(180,10,"8.-¿Cuántas computadoras personales, ya sea de escritorio o laptop tiene funcionando en su hogar?",0,0,'L',false,'',1);
            $pdf->SetXY(18,200);
            $pdf->cell(30,10,$query['res8'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,210);
            $pdf->cell(180,10,"9.-¿En su hogar cuentan con estufa de gas o electrica?",0,0,'L',false,'',1);
            $pdf->SetXY(18,220);
            $pdf->cell(30,10,$query['res9'],"B",0,'L',false,'',1);
            $pdf->SetXY(13,230);
            $pdf->cell(180,10,"10.-¿Pensando en la persona que aporta la mayor parte del ingreso a su hogar,",0,0,'L',false,'',1);
            $pdf->SetXY(18,240);
            $pdf->cell(180,10,"¿Cuál fue el ultimo año de estudios que completo? ¿Realizó otros estudios?",0,0,'L',false,'',1);
            $pdf->SetXY(18,250);
            $pdf->cell(65,10,$query['res10'],"B",0,'L',false,'',1);
            
            $salida = 'Solicitud.pdf';
            $pdf->Output($salida, 'I');   
        }
    }



}
?>