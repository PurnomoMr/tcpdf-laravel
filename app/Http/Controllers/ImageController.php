<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use PDF;

class ImageController extends Controller
{
    public function index()
    {
     return view('image');
    }

    // this function opens the PDF in browser. If we want, we can downlod
    public function imageCenter()
    {
        // Set title in the PDF
        PDF::SetTitle("Image Center");
        PDF::AddPage();
        // userlist is the name of the PDF downloading
        PDF::image(public_path('image').'/seo-and-web.png',54, 5, 9,9, '','','',true,500,'C');
        PDF::Output('imageCenter.pdf');    
        PDF::Output(public_path('pdf').'/imagecenter.pdf', 'F'); 
    }
    // this function directly downloads the PDF. 
    public function imageSVG()
    {
        PDF::SetTitle("Image SVG Bottom Right");
        PDF::AddPage();
        // D is the change of these two functions. Including D parameter will avoid 
        // loading PDF in browser and allows downloading directly
        PDF::ImageSVG(public_path('image').'/mono-xsldbg-data.svg',150, 220, 50,50, '','','',true,500,'C');
        PDF::Output('imageSVG.pdf');    
        PDF::Output(public_path('pdf').'/imageSVG.pdf', 'F'); 
    }
}