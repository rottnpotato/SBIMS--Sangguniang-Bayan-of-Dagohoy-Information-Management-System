<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\Settings;
use App\Models\documents; // Make sure to import your Document model

class DocumentController extends Controller
{
    public function generateReport(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $documents = documents::whereBetween('date_published', [$startDate.'-01', $endDate.'-31'])
                             ->orderBy('date_published', 'asc')
                             ->get();

        $pdf = new \Dompdf\Dompdf();
        $pdf->setPaper('A4', 'portrait');

        // Prepare HTML content
        $html = '<html><body style="font-family: Arial, sans-serif;">';
        
        // Header with image and text
        $html .= '<div style="text-align: center;">';
        $html .= '<table style="margin: 0 auto; border-spacing: 0;"><tr><td style="width: 80px; text-align: center; vertical-align: middle; padding-right: 10px;">';
        if (file_exists(public_path('images/icons.png'))) {
            $imageData = base64_encode(file_get_contents(public_path('images/icons.png')));
            $html .= '<img src="data:image/png;base64,' . $imageData . '" style="width: 75px; height: 75px;">';
        }
        $html .= '</td><td style="text-align: center; vertical-align: middle; padding-left: 0;">';
        $html .= '<strong style="font-size: 12pt; margin: 0;">Republic of the Philippines</strong><br>';
        $html .= '<span style="font-size: 11pt; margin: 0;">Province of Bohol</span><br>';
        $html .= '<span style="font-size: 11pt; margin: 0;">Municipality of Dagohoy</span><br>';
        $html .= '<strong style="font-size: 12pt; margin: 0;">OFFICE OF THE 17TH SANGGUNIANG BAYAN</strong>';
        $html .= '</td></tr></table><br>';
        
        $html .= '<h1 style="font-size: 16pt;">DOCUMENT MONITORING REPORT</h1>';
        $startMonth = date('F', strtotime($startDate . '-01'));
        $endMonth = date('F', strtotime($endDate . '-01'));
        $startYear = date('Y', strtotime($startDate . '-01'));
        $endYear = date('Y', strtotime($endDate . '-01'));
        $html .= "<p style='font-size: 12pt;'>Covering Period: {$startMonth} {$startYear} to {$endMonth} {$endYear}</p><br>";
        
        // Table
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">';
        $html .= '<tr style="background-color: #D3D3D3;">';
        $headers = ['Title', 'Principal Sponsor', 'Co Sponsor', 'Date Published', 'Year In Series'];
        foreach ($headers as $header) {
            $html .= "<th style='font-size: 11pt;'>$header</th>";
        }
        $html .= '</tr>';

        foreach ($documents as $document) {
            $html .= '<tr>';
            $cells = [
                $document->title,
                $document->sponsored,
                $document->co_sponsored ?? 'N/A',
                $document->date_published,
                $document->year_in_series
            ];
            foreach ($cells as $cell) {
                $html .= "<td style='font-size: 10pt; text-align: center;'>$cell</td>";
            }
            $html .= '</tr>';
        }
        
        $html .= '</table></div></body></html>';

        $pdf->loadHtml($html);
        $pdf->render();

        $filePdfName = "document_report_{$startDate}_to_{$endDate}.pdf";
        $pdfPath = storage_path("app/public/$filePdfName");
        file_put_contents($pdfPath, $pdf->output());

        return response()->json([
            'success' => true,
            'file' => $filePdfName,
            'message' => 'Report generated successfully'
        ]);
    }

    public function downloadReport($fileName)
    {
        $filePath = storage_path('app/public/' . $fileName);
        
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"'
        ])->deleteFileAfterSend(true);
    }
    
    public function checkDuplicate(Request $request)
{
    try {
        // Get all form data
        $data = $request->all();
        
        // Get title directly from form data
        $title = $data['title'] ?? null;
        //$documentId = $data['document_id'] ?? null;
        $documentId = (int) $request->input('document_id');

        if (!$title) {
            return response()->json([
                'success' => false,
                'message' => 'Title is required',
                'received_data' => $data
            ], 422);
        }


            $query = ($documentId) ? documents::where('title', $title)
                ->where('id', '!=', $documentId) : documents::where('title', $title);

        $duplicate = $query->exists();

        return response()->json([
            'success' => true,
            'duplicate' => $duplicate,
            'message' => $duplicate ? 'Document with this title already exists.' : 'Title is available.',
            'received_data' => [
                'title' => $title,
                'document_id' => $documentId
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred',
            'error' => $e->getMessage()
        ], 500);
    }
}
    public function checkBulkDuplicate(Request $request)
            {
                $titles = $request->json()->all();
                $duplicates = [];
            
                foreach ($titles as $title) {
                    $duplicate = documents::where('title', $title)->exists();
                    if ($duplicate) {
                        $duplicates[] = $title;
                    }
                }
            
                return response()->json(['duplicates' => $duplicates]);
            }
}