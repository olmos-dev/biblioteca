<?php

namespace Database\Seeders;

use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //se agrega el primer libro
        $libro1 = Libro::create([
            'isbn' => '7483749340',
            'titulo' => 'El maestro de los sueños',
            'autor' => 'Roger Zelazny',
            'editorial' => 'La paz'
        ]);
        
        //se agregao su portada
        $libro1->image()->create([
            'path' => '3.jpg',
            'imageable_id' => $libro1->id,
            'imageable_type' => get_class($libro1)
        ]);

        $libro2 = Libro::create([
            'isbn' => '4852407092',
            'titulo' => 'En busca de la extinción',
            'autor' => 'Jeff Jhonson',
            'editorial' => 'Estrella'
        ]);
        
        //se agregao su portada
        $libro2->image()->create([
            'path' => '11.jfif',
            'imageable_id' => $libro2->id,
            'imageable_type' => get_class($libro2)
        ]);

        $libro3 = Libro::create([
            'isbn' => '2529107152',
            'titulo' => 'Matar a un risueñor',
            'autor' => 'Harper Lee',
            'editorial' => 'Alba'
        ]);
        
        //se agregao su portada
        $libro3->image()->create([
            'path' => '10.jfif',
            'imageable_id' => $libro3->id,
            'imageable_type' => get_class($libro3)
        ]);

        $libro4 = Libro::create([
            'isbn' => '3095042558',
            'titulo' => 'El camino de la miseria',
            'autor' => 'Laura Grantz',
            'editorial' => 'McGraw Hill'
        ]);
        
        //se agregao su portada
        $libro4->image()->create([
            'path' => '12.jfif',
            'imageable_id' => $libro4->id,
            'imageable_type' => get_class($libro4)
        ]);

        $libro5 = Libro::create([
            'isbn' => '8724564294',
            'titulo' => 'Un viaje al centro de la Tierra',
            'autor' => 'Julio Verne',
            'editorial' => 'Austral'
        ]);
        
        //se agregao su portada
        $libro5->image()->create([
            'path' => '2.jpg',
            'imageable_id' => $libro5->id,
            'imageable_type' => get_class($libro5)
        ]);

        $libro6 = Libro::create([
            'isbn' => '3431235674',
            'titulo' => 'A dos metros de ti',
            'autor' => 'Tobias Laconis',
            'editorial' => 'Aurora'
        ]);
        
        //se agregao su portada
        $libro6->image()->create([
            'path' => '1.jpg',
            'imageable_id' => $libro6->id,
            'imageable_type' => get_class($libro6)
        ]);

        $libro7 = Libro::create([
            'isbn' => '8745324901',
            'titulo' => 'La ladrona de libros',
            'autor' => 'Markus Zusak',
            'editorial' => 'Estrella'
        ]);
        
        //se agregao su portada
        $libro7->image()->create([
            'path' => '4.jpg',
            'imageable_id' => $libro7->id,
            'imageable_type' => get_class($libro7)
        ]);

        $libro8 = Libro::create([
            'isbn' => '8745424901',
            'titulo' => 'Color perdido del bosque',
            'autor' => 'Joe Chamber',
            'editorial' => 'Estrella'
        ]);
        
        //se agregao su portada
        $libro8->image()->create([
            'path' => '5.jpg',
            'imageable_id' => $libro8->id,
            'imageable_type' => get_class($libro8)
        ]);

        $libro9 = Libro::create([
            'isbn' => '1234567890',
            'titulo' => 'Cada historia cuenta',
            'autor' => 'Joe Chamber',
            'editorial' => 'Estrella'
        ]);
        
        //se agregao su portada
        $libro9->image()->create([
            'path' => '6.jpg',
            'imageable_id' => $libro9->id,
            'imageable_type' => get_class($libro9)
        ]);

        $libro10 = Libro::create([
            'isbn' => '098765431',
            'titulo' => 'Dejemos huella',
            'autor' => 'Varios Autores',
            'editorial' => 'Estrella'
        ]);
        
        //se agregao su portada
        $libro10->image()->create([
            'path' => '7.jfif',
            'imageable_id' => $libro10->id,
            'imageable_type' => get_class($libro10)
        ]);

        $libro11 = Libro::create([
            'isbn' => '7864531309',
            'titulo' => 'El final del viaje',
            'autor' => 'Silvia De Holanda',
            'editorial' => 'Baez'
        ]);
        
        //se agregao su portada
        $libro11->image()->create([
            'path' => '8.jfif',
            'imageable_id' => $libro11->id,
            'imageable_type' => get_class($libro11)
        ]);


       
        

    }
}
