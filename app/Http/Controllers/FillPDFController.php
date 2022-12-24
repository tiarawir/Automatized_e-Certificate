<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use App\Models\Mahasiswa;

class FillPDFController extends Controller
{
    public function process(Request $request, $id){
        $nama = Mahasiswa::where('id', $id)->pluck('nama')->first();
        $nim = Mahasiswa::where('id', $id)->pluck('id')->first();
        $outputfile = public_path().'sertif.pdf';
        $this->fillPDF(public_path().'/master/sertif.pdf',$outputfile,$nama, $nim);

        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile,$nama, $nim){
        $fpdi = new Fpdi;
        $fpdi->setSourceFile($file);
        

        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'],$size['height']));

        $fpdi->useTemplate($template);

        $top1 = 135;
        $right = 15;

        $top2 = 152;
        $right2 = 89;
         
        $name = $nama;
        $sertif = "Nomor: PWEB/UINSA/";
        $id = $nim;
        $fpdi->SetFont("Helvetica","B",20);
        $fpdi -> SetTextColor(25,26,25);
        $fpdi -> Text($right, $top1, $name);
        $fpdi -> Text($right2, $top2, $id);
        $fpdi -> Text($right, $top2, $sertif);

        return $fpdi->Output($outputfile,'F');
    }
}
