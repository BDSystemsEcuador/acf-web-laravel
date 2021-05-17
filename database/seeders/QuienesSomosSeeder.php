<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class QuienesSomosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $secciones = [
            ['seccion' => 'Superior_1',
            'titulo' => 'Quienes somos',
	    'contenido' => ' Fundación Alas de Colibrí es una organización de la sociedad civil sin fines de lucro, que trabaja en la promoción y defensa de los derechos humanos y de la naturaleza, así como en la restitución de los mismos, mediante la intervención de un equipo especializado e interdisciplinario, con enfoque de género, movilidad humana, intergeneracional, de discapacidades y étnico - cultural constituyéndonos en un aporte para la construcción de una sociedad justa, equitativa, libre y solidaria.  ',
            'imagen' => 'uploads/quienes/Superior_2.png'],
            ['seccion' => 'Superior_2',
            'titulo' => '¿Por qué un colibrí?',
	    'contenido' => ' Llevamos este nombre porque el equipo humano y profesional que trabaja en la Fundación, tiene la firme convicción de que los niños, niñas, adolescentes, jóvenes, y adultos; independientemente de su nacionalidad, religión y lenguaje son muy similares a los colibríes.  Se cuenta que el colibrí se creó para transportar los sueños y los deseos de las personas de un lado a otro, por este motivo se muestran tan libres, bellos, y ágiles, sin embargo encerrarlos, enjaularlos, detenerlos o quitarles su libertad, les provoca la muerte. Fundación Alas de Colibrí, está comprometida con la defensa de los derechos humanos y de la naturaleza e invita a que seas parte de este camino.  ',
            'imagen' => 'uploads/quienes/Superior_2.jpg'],
            ['seccion' => 'Intermedia_1',
            'titulo' => 'Misión',
	    'contenido' => '
              Somos una organización de la sociedad civil sin fines de lucro, que trabaja en la promoción y defensa de los derechos humanos y de la naturaleza, así como en la restitución de los mismos, mediante la intervención de un equipo especializado e interdisciplinario, con enfoque de género, movilidad humana, intergeneracional, de discapacidades y étnico - cultural constituyéndonos en un aporte para la construcción de una sociedad justa, equitativa, libre y solidaria.  ',
            'imagen' => 'uploads/quienes/Intermedia_1.jpg'],
            ['seccion' => 'Intermedia_2',
            'titulo' => 'Visión',
	    'contenido' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus neque itaque qui, tenetur ratione saepe sapiente accusamus magni magnam fuga optio, illum, explicabo maxime ut aperiam ulla commodi? Numquam perferendis harum neque tempora consequatur autem adipisci blanditiis facere sint inventore, fugit iusto aperiam eos quis soluta doloribus voluptatum illo laboriosam.  ',
            'imagen' => 'uploads/quienes/Intermedia_2.jpg'],
            ['seccion' => 'Intermedia_3',
            'titulo' => 'Objetivos',
	    'contenido' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nihil rerum hic quo blanditiis nobis minus eum aut unde! Voluptas asperiores quidem veniam laudantium aliquid, perspiciatis earum?  Voluptate esse quasi, veritatis eveniet nesciunt doloribus, facilis ratione itaque minima sunt repellendus culpa qui eos cupiditate aliquam? Earum praesentium sequi sint minus possimus.  Aspernatur, deserunt dolor nobis facere voluptas repellat aliquam culpa!  ',
            'imagen' => 'uploads/quienes/Intermedia_3.jpg'],
       ];

        foreach ($secciones as $seccion) {
               DB::table('quienes')->insert($seccion);
        };
    }
}
