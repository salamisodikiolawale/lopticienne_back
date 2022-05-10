<?php

namespace App\DataFixtures;

use Faker;
use DateTime;
use App\Entity\Article;
use App\Entity\MakeArticle;
use App\Entity\ArticleBrand;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // $faker = Faker\Factory::create('fr_FR');
        //Homme, femme, enfant
        $GENRE = ["HOMME","FEMME","ENFANT"];
        $TYPE = ["LUNETTE_DE_VUE","LUNETTE_DE_SOLEIL","LENTILLE_DE_COULEUR", "LENTILLE_CORRECTRICE", "LENTILLE_JOURNALIERE"];
        $MARQUE = ["Baila","Cosmoss","Bouge"];
        $listM = [];
        for($j=0; $j<3; $j++)
        {   
            $make = new MakeArticle();
            $make->setName($MARQUE[$j]);
            $make->setDescription("Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore, maxime odio soluta provident odit minus perferendis");
            $manager->persist($make);
            $listM[$j] = $make;
        }

        for($i=0; $i<30; $i++)
        {
            $article = new Article();
            $article->setName("Article ".$i)
                    ->setPrice(random_int(100, 900))
                    ->setQuantity(random_int(40, 100))
                    ->setCreateAt(new DateTime())
                    ->setType($TYPE[random_int(0, 4)])
                    ->setGender($GENRE[random_int(0, 2)])
                    ->setMake($listM[random_int(0, 2)]);

            $manager->persist($article);
        }

        $manager->flush();
    }
}
