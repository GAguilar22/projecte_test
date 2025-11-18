<?php

namespace Tests\Feature;

use App\Models\Joc;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class TaskTest extends TestCase
{
    // Utilitza RefreshDatabase per assegurar que cada test comença amb una base de dades neta
    // Això evita que els tests interfereixin entre ells
    use RefreshDatabase;

    /**
     * Test que verifica que la pàgina principal carrega correctament
     * Aquest és un test bàsic de "smoke test" que assegura que l'aplicació funciona
     */
    public function test_the_homepage_loads()
    {
        // Simula una petició GET a la ruta principal '/'
        // Verifica que la resposta tingui status HTTP 200 (èxit)
        // Verifica que el contingut HTML contingui la paraula 'Jocs'
        $this->get('/')->assertStatus(200)->assertSee('Jocs');
    }

    /**
     * Test que verifica que podem crear un nou videojoc mitjançant el formulari web
     * Prova tot el flux de creació: validació, emmagatzematge i redirect
     */
    public function test_we_can_create_a_joc()
    {
        // Prepara les dades d'un videojoc de prova amb tots els camps obligatoris
        $jocData = [
            'nom' => 'Test Game',                           // Nom del videojoc
            'estudi' => 'Test Studio',                      // Estudi desenvolupador
            'data_publicacio' => '2023-01-01',             // Data de publicació en format YYYY-MM-DD
            'genere' => 'Acció',                           // Gènere del joc
            'puntuacio' => 8.5,                           // Puntuació decimal entre 0 i 10
            'fotografia' => 'https://example.com/test.jpg' // URL de la imatge del joc
        ];

        // Simula l'enviament d'un formulari POST a la ruta '/jocs' amb les dades preparades
        $response = $this->post('/jocs', $jocData);
        
        // Verifica que després de crear el joc, l'usuari és redirigit a la llista de jocs
        $response->assertRedirect('/jocs');
        
        // Verifica que el nou joc s'ha guardat correctament a la base de dades
        // Comprova que existeix un registre amb el nom i estudi especificats
        $this->assertDatabaseHas('jocs', ['nom' => 'Test Game', 'estudi' => 'Test Studio']);
    }
    
    /**
     * Test que verifica que podem eliminar un videojoc existent
     * Prova la funcionalitat de delete del CRUD
     */
    public function test_we_can_delete_a_joc()
    {
        // Primer, crea un videojoc directament a la base de dades utilitzant el model
        // Això simula que ja tenim un joc existent que volem eliminar
        $joc = Joc::create([
            'nom' => 'Game to Delete',                      // Nom descriptiu per identificar el joc a eliminar
            'estudi' => 'Test Studio',
            'data_publicacio' => '2023-01-01',
            'genere' => 'Aventura',
            'puntuacio' => 7.0,
            'fotografia' => 'https://example.com/delete.jpg'
        ]);

        // Verifica que el joc s'ha creat correctament abans d'intentar eliminar-lo
        // Això és una verificació prèvia per assegurar l'estat inicial
        $this->assertDatabaseHas('jocs', ['nom' => 'Game to Delete']);

        // Simula una petició DELETE a la ruta específica del joc (utilitzant el seu ID)
        // Verifica que després d'eliminar, l'usuari és redirigit a la llista de jocs
        $this->delete("/jocs/{$joc->id}")->assertRedirect('/jocs');

        // Verifica que el joc ja no existeix a la base de dades
        // assertDatabaseMissing comprova que NO hi ha cap registre amb aquest ID
        $this->assertDatabaseMissing('jocs', ['id' => $joc->id]);
    }
}