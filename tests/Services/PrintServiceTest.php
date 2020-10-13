<?php

namespace App\Tests\Services;

use App\Services\PrintService;
use App\Services\ServientregaService;
use PHPUnit\Framework\TestCase;

class PrintServiceTest extends TestCase
{
    private $filename1;
    private $filename2;

    protected function setUp(): void
    {
        $pdf = new \TCPDI();
        $pdf->AddPage();
        $pdf->SetFont('symbol','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $output = $pdf->Output('doc.pdf', 'S');

        $this->filename1 = sys_get_temp_dir() . '/test.pdf';
        $this->filename2 = sys_get_temp_dir() . '/test2.pdf';

        file_put_contents($this->filename1, $output);
        file_put_contents($this->filename2, $output);
    }

    public function testPrintSticker()
    {
        $servietgregaService = $this->createMock(ServientregaService::class);
        $servietgregaService->method('getSticker')->willReturn(file_get_contents($this->filename1));

        $printService = new PrintService($servietgregaService);
        $result = $printService->printSticker('123');

        static::assertEquals(file_get_contents($this->filename1), $result);
    }

    public function testPrintStickers()
    {
        $servietgregaService = $this->createMock(ServientregaService::class);
        $servietgregaService->method('getSticker')->willReturnOnConsecutiveCalls(
            file_get_contents($this->filename1),
            file_get_contents($this->filename2)
        );

        $printService = new PrintService($servietgregaService);
        $result = $printService->printStickers(['1', '2']);

        static::assertNotEmpty($result);
    }

    protected function tearDown(): void
    {
        unlink($this->filename1);
        unlink($this->filename2);
    }
}
