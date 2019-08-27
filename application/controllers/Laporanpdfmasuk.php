<?php
Class Laporanpdfmasuk extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function index(){
        $pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('assets/image/logo.png',0.8,1.0,4.8,1.5);
$pdf->SetFont('Arial','B',12);
$pdf->SetX(7.5);            
$pdf->MultiCell(19.5,0.5,'PT. PGAS TELEKOMUNIKASI NUSANTARA',0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetX(7.9);
$pdf->MultiCell(19.5,0.5,'  PT. Perusahaan Gas Negara (Persero)',0,'L');    
$pdf->SetFont('Arial','',10);
$pdf->SetX(7.8);
$pdf->MultiCell(19.5,0.5,'Gedung B, 4th floor Komplek PT PGN (Persero) Tbk',0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetX(5.2);
$pdf->MultiCell(19.5,0.5,'Jl. KH. Zainul Arifin No. 20 Jakarta Barat 11140, Indonesia || +62-21-633 1381 (FAX)',0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetX(9.5);
$pdf->MultiCell(19.5,0.5,'website : www.pgascom.co.id',0,'L');
$pdf->Line(0,3.6,28.5,3.6);  
$pdf->SetLineWidth(0.1);      
$pdf->Line(0,3.7,28.5,3.7);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(18.5,0.7,"Laporan Data Transaksi Barang",0,10,'C');
// $pdf->Cell(19.5,0.7,"SMK Muhammadiyah Batang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1, 0.8, 'No.', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Barcode', 1, 0, 'C');
$pdf->Cell(9, 0.8, 'Nama Barang', 1, 0, 'C');
// $pdf->Cell(1.5, 0.8, 'Jenis', 1, 0, 'C');
// $pdf->Cell(1.5, 0.8, 'Tipe', 1, 0, 'C');
//$pdf->Cell(2, 0.8, 'Kondisi', 1, 0, 'C');
// $pdf->Cell(1.5, 0.8, 'Status', 1, 0, 'C');
// $pdf->Cell(1.8, 0.8, 'Pengadaan', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Lokasi', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Jumlah', 1, 0, 'C');

$pdf->SetFont('Arial','',8);


 $query = $this->db->select('*');
	
		
        $tanggal1    =   $this->input->post('tanggal1');
        $tanggal2    =   $this->input->post('tanggal2');
       $this->db->where('tanggal >=', $tanggal1);
        $this->db->where('tanggal <=', $tanggal2);
        $query=$this->db->get('laporan')->result();

        $i=1; foreach ($query as $row){
			if($row->jenis=="masuk"){
              $pdf->ln();
 // $data_matriks = $this->db->get('data_matriks')->result();
 //        foreach ($data_matriks as $row){

 $pdf->Cell(1,0.8,$i++,1,0, 'C');

    $pdf->Cell(3,0.8,$row->tanggal,1,0, 'C');
    $pdf->Cell(2.5,0.8,$row->barcode,1,0, 'C');
    $pdf->Cell(9,0.8,$row->nama,1,0, 'C');
    // $pdf->Cell(1.5,0.8,$row->jenis_barang,1,0, 'C');
    // $pdf->Cell(1.5,0.8,$row->type_barang,1,0, 'C');
  //  $pdf->Cell(2,0.8,$row->kondisi,1,0, 'C');
   //  $pdf->Cell(2,0.8,$row->status,1,0, 'C');
    // $pdf->Cell(1.8,0.8,$row->pengadaan,1,0, 'C');
    $pdf->Cell(1.5,0.8,$row->lokasi,1,0, 'C');
    $pdf->Cell(1.5,0.8,$row->jml,1,0, 'C');
			}}




$pdf->Output();

}}