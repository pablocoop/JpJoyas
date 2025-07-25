<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InfoContent;

class InfoContentSeeder extends Seeder
{
    public function run(): void
    {
        InfoContent::updateOrCreate(
            ['section' => 'descripcion'],
            ['body' => '
                <div>
                    <p>Joyería online de Villarrica, creada por Juan Pablo Osorio Valenzuela con un objetivo claro: ofrecer joyas de plata de primera calidad, elaboradas con prolijidad, precisión, y diseñadas para ser accesibles sin comprometer la excelencia.</p>
                    <p>Al eliminar los intermediarios, te ofrecemos joyas sin sobreprecios ni comisiones por reventa, directamente del fabricante a tus manos. Descubre la auténtica calidad de la plata, sin costos innecesarios.</p>
                </div>
            ']
        );

        InfoContent::updateOrCreate(
            ['section' => 'historia'],
            ['body' => '
                <div>
                    <p>Mi historia con la joyería comenzó en 2017, cuando empecé a vender joyas de plata importadas desde fábricas de Italia y Tailandia. Sin embargo, pronto descubrí que mis habilidades manuales y formación profesional me permitían crear algo más auténtico: joyas diseñadas y fabricadas por mí mismo.</p>
                    <p>Con el tiempo, he descubierto la verdadera ventaja de trabajar con plata pura, libre de aleaciones que pueden alterar su calidad y brillo. Esto me permite crear joyas que no solo son hermosas, sino que también mantienen su pureza y valor. Mis diseños reflejan la esencia de la idiosincrasia chilena y son elaborados con dedicación y atención al detalle, lo que me permite ofrecer piezas de alta calidad a precios justos.</p>
                    <p>Hoy en día, me enorgullece ofrecer joyas que no solo son hermosas, sino que también llevan un pedacito de mi historia y dedicación.</p>
                </div>
            ']
        );
    }
}
