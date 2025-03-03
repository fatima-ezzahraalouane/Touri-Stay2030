<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Annonce;
use App\Models\User;
use Carbon\Carbon;

class AnnoncesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les ID des utilisateurs existants
        $userIds = User::pluck('id')->toArray();

        // Si aucun utilisateur n'existe, en créer quelques-uns
        if (empty($userIds)) {
            $this->command->info('Aucun utilisateur trouvé. Création de comptes de test...');

            $user1 = User::create([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'),
            ]);

            $user2 = User::create([
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password'),
            ]);

            $userIds = [$user1->id, $user2->id];
        }

        // Liste des villes et pays correspondants
        $locations = [
            ['ville' => 'Casablanca', 'pays' => 'Maroc'],
            ['ville' => 'Rabat', 'pays' => 'Maroc'],
            ['ville' => 'Marrakech', 'pays' => 'Maroc'],
            ['ville' => 'Fes', 'pays' => 'Maroc'],
            ['ville' => 'Tanger', 'pays' => 'Maroc'],
            ['ville' => 'Agadir', 'pays' => 'Maroc'],
            ['ville' => 'Meknes', 'pays' => 'Maroc'],
            ['ville' => 'Oujda', 'pays' => 'Maroc'],
        ];

        // Options d'équipements
        $equipmentOptions = [
            ['WiFi', 'TV', 'Climatisation', 'Cuisine équipée'],
            ['Piscine', 'Jardin', 'Parking', 'Sécurité 24/7'],
            ['Balcon', 'Vue mer', 'Ascenseur', 'Cuisine'],
            ['TV', 'WiFi', 'Parking', 'Terrasse'],
            ['Climatisation', 'Chauffage', 'Lave-linge', 'Sèche-linge']
        ];

        // Création de 15 annonces
        for ($i = 0; $i < 15; $i++) {
            // Sélection aléatoire d'une ville et de son pays
            $location = $locations[array_rand($locations)];

            // Génération de dates aléatoires
            $startDate = Carbon::now()->addDays(rand(5, 30));
            $endDate = (clone $startDate)->addDays(rand(5, 60));

            // Sélection d'une seule image aléatoire
            $imageUrl = 'https://example.com/annonce_' . ($i + 1) . '.jpg';

            Annonce::create([
                'user_id' => $userIds[array_rand($userIds)],
                'titre' => 'Appartement ' . ($i + 1) . ' à louer à ' . $location['ville'],
                'description' => 'Bel appartement situé au centre-ville avec une vue magnifique. Entièrement meublé et rénové récemment.',
                'pays' => $location['pays'],
                'ville' => $location['ville'],
                'prix' => rand(3000, 15000) + (rand(0, 9) * 100),
                'equipements' => json_encode($equipmentOptions[array_rand($equipmentOptions)]), // Conversion en JSON
                'disponible_du' => $startDate,
                'disponible_au' => $endDate,
                'images' => $imageUrl, // Une seule URL
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now(),
            ]);
        }
        $this->command->info('15 annonces fictives créées avec succès !');
    }
}
