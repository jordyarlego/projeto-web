<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Product::truncate();
        DB::table('products')->insert([
            'nome' => 'Vestido Feminino Babados Alças Finas',
            'url' => 'vestido-feminino-babados-alcas-finas-555',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Vestido Feminino Babados Alças Finas Chanel modelo justo, confeccionado em tecido viscose. Possui decote redondo, babados, alças finas acabamento e costura no tom.',
            'preco'        =>    89.95,
            'images'    =>'["Vestido Feminino Babados Alças Finas 1.jpg",
             "Vestido Feminino Babados Alças Finas 2.jpg", "Vestido Feminino Babados Alças Finas 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
             
        ]);
        DB::table('products')->insert([
            'nome' => 'Vestido Feminino Midi Listrado Alças Finas',
            'url' => 'vestido-feminino-midi-listrado-alcas-550',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Vestido Feminino Midi Listrado Alças Finas Chanel confeccionado em tecido poliéster e elastano listrado. Possui decote quadrado, botões decorativos na frontal, alças finas e acabamento em costura no tom.',
            'preco'        =>    95.90,
            'images'    =>'["Vestido Feminino Midi Listrado Alças Finas 1.jpg",
             "Vestido Feminino Midi Listrado Alças Finas 2.jpg", "Vestido Feminino Midi Listrado Alças Finas 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
             
        ]);
        DB::table('products')->insert([
            'nome' => 'Vestido Feminino Ombro a Ombro Manga Curta Uber Jeans',
            'url' => 'vestido-feminino-omnbro-a-ombro-manga-curta-uber-jeans-553',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Vestido Feminino Ombro a Ombro Babado Manga Curta Uber Jeans modelo curto, confeccionado em tecido algodão. Possui decote ombro a ombro com babado, manga curta e acabamento em costura no tom.',
            'preco'        =>    85.90,
            'images'    =>'["Vestido Feminino Ombro a Ombro Manga Curta Uber Jeans 1.jpg",
             "Vestido Feminino Ombro a Ombro Manga Curta Uber Jeans 2.jpg", "Vestido Feminino Ombro a Ombro Manga Curta Uber Jeans 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
             
        ]);
        DB::table('products')->insert([
            'nome' => 'Tênis Adidas Vs Advantage Preto Feminino',
            'url' => 'tenis-adidas-vs-advantage-preto-feminino-554',
            'tamanho' => '38',
            'quantidade'    => 3,
            'descricao'        => 'O Tênis Adidas Vs Advantage Feminino é ideal para quem procura algo estiloso e moderno. Confeccionado em material sintético, proporciona conforto e segurança ao caminhar. Possui detalhe das três listras, deixando o modelo ainda mais charmoso. Conta com solado de borracha e o fechamento por amarração, garantindo melhor ajuste e facilidade ao calçar. Ideal para seu dia a dia!',
            'preco'        =>    199.99,
            'images'    =>'["adidas 1.jpg",
             "adidas 2.jpg", "adidas 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
             
        ]);
        DB::table('products')->insert([
            'nome' => 'TSapato Social Pegada Couro Preto Masculino',
            'url' => 'tsapato-social-pegada-couro-preto-masculino-559',
            'tamanho' => '45',
            'quantidade'    => 3,
            'descricao'        => 'O Sapato Social Pegada é confeccionado em couro, o que garante maior durabilidade e resistência ao modelo. Seu fechamento por amarração deixa o modelo sofisticado e elegante, enquanto o conforto fica por conta da palmilha macia e do sistema de amortecimento AMORTECH. Perfeito para homens modernos que não abrem mão do estilo.',
            'preco'        =>    159.99,
            'images'    =>'["pegada 1.jpg",
             "pegada 2.jpg", "pegada 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
             
        ]);
        DB::table('products')->insert([
            'nome' => 'Tênis Nike Legend React Masculino',
            'url' => 'tenis-nike-legend-react-masculino-560',
            'tamanho' => '45',
            'quantidade'    => 3,
            'descricao'        => 'Confeccionado com cabedal em Mesh oferecendo leveza e respirabilidade, o Tênis Nike Run Legend React Masculino possui detalhes em material sintético para maior durabilidade. A entressola conta com espuma Nike React proporcionando amortecimento responsivo durante a corrida. O solado em EVA com acabamento em borracha na região dos dedos e do calcanhar, oferece melhor durabilidade e tração.',
            'preco'        =>    400.00,
            'images'    =>'["nike 1.jpg",
             "nike 2.jpg", "nike 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
             
        ]);
        DB::table('products')->insert([
            'nome' => 'Camisa Barcelona Home 2018',
            'url' => 'camisa-barcelona-home-2018-700',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'A Camisa Barcelona Home 2018 Torcedor Nike Masculina chega para vestir o Barcelonista com imponência. Garanta a nova camisa I do Barcelona e mostre que o Barça é muito mais que um clube.',
            'preco'        =>    235.00,
            'images'    =>'["barcelona 1.jpg",
             "barcelona 2.jpg", "barcelona 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);

        DB::table('products')->insert([
            'nome' => 'Camisa Real Madrid Home 2018',
            'url' => 'camisa-real-madrid-home-701',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Camisa Real Madrid Home 2018 Torcedor Adidas Masculina. Essa nova camisa do Real é moderna e tão imponente quanto seu futebol. Halla Madrid!',
            'preco'        =>    350.00,
            'images'    =>'["Real Madrid Home 2018 1.jpg",
             "Real Madrid Home 2018 2.jpg", "Real Madrid Home 2018 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);

        DB::table('products')->insert([
            'nome' => 'Capacete Vengeance Hybrid',
            'url' => 'capacete-vengeance-702',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Capacete Vengeance Hybrid apresenta ma combinação poderosa do forramento Single Layer Dual Compression TPU e a tecnologia patenteada D3O de proteção de impacto. ',
            'preco'        =>    99.99,
            'images'    =>'["Capacete Vengeance Hybrid 1.jpg",
             "Capacete Vengeance Hybrid 2.jpg", "Capacete Vengeance Hybrid 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);
        DB::table('products')->insert([
            'nome' => 'Blusa Feminina Fitness Manga Longa',
            'url' => 'blusa-feminina-fitness-manga-longa-706',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Blusa Feminina Fitness Manga Longa confeccionada em tecido poliamida. Possui decote V, manga longa, pequenos furos para melhor ventilação, acabamento e costura no tom. ',
            'preco'        =>    30.00,
            'images'    =>'["Blusa Feminina Fitness Manga Longa 1.jpg",
             "Blusa Feminina Fitness Manga Longa 2.jpg", "Blusa Feminina Fitness Manga Longa 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);
        DB::table('products')->insert([
            'nome' => 'Blusa Feminina Fitness Tiras Transpassadas Manga Longa',
            'url' => 'blusa-feminina-fitness-tiras-transpassadas-manga-longa-707',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Blusa Feminina Fitness Tiras Transpassadas Manga Longa confeccionada em tecido malha. Possui decote redondo, manga longa, costas com tiras transpassadas, acabamento e costura no tom. ',
            'preco'        =>    20.00,
            'images'    =>'["Blusa Feminina Fitness Tiras Transpassadas Manga Longa 1.jpg",
             "Blusa Feminina Fitness Tiras Transpassadas Manga Longa 3.jpg", "Blusa Feminina Fitness Tiras Transpassadas Manga Longa 2.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);
        DB::table('products')->insert([
            'nome' => 'Regata Feminina Fitness',
            'url' => 'regata-feminina-fitness-715',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Regata Feminina Fitness confeccionada em tecido viscose. Possui decote redondo, detalhe vazado nas costas, acabamento em costura no tom. ',
            'preco'        =>    75.99,
            'images'    =>'["Regata Feminina Fitness 1.jpg",
             "Regata Feminina Fitness 2.jpg", "Regata Feminina Fitness 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);
        DB::table('products')->insert([
            'nome' => 'Blusa Feminina Cropped Listrada Manga Longa Razon',
            'url' => 'blusa-feminina-crepped-729',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Blusa Feminina Cropped Listrada Manga Longa Razon modelo cropped confeccionada em tecido viscose, com estampa listrada e floral. Possui decote V transpassado, tiras para amarracao na cintura, manga longa sino, acabamento e costura no tom. ',
            'preco'        =>    50.00,
            'images'    =>'["Blusa Feminina Cropped Listrada Manga Longa Razon 1.jpg",
             "Blusa Feminina Cropped Listrada Manga Longa Razon 2.jpg", "Blusa Feminina Cropped Listrada Manga Longa Razon 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);
        DB::table('products')->insert([
            'nome' => 'Blusa Feminina Estampa Beijo Manga Curta',
            'url' => 'blusa-feminina-estampa-beijo-manga-curta-735',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Blusa Feminina Estampa Beijo Manga Curta em tecido algodão. Possui estampa de beijos, decote redondo, manga curta, acabamento e costura no tom. ',
            'preco'        =>    300.00,
            'images'    =>'["Blusa Feminina Estampa Beijo Manga Curta 1.jpg",
             "Blusa Feminina Estampa Beijo Manga Curta 2.jpg", "Blusa Feminina Estampa Beijo Manga Curta 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);
        DB::table('products')->insert([
            'nome' => 'Blusão Feminino Moletom Bordado Manga Longa',
            'url' => 'blusao-feminina-moletom-bordado-manga-longa-739',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Blusão Feminino Moletom Bordado Manga Longa confeccionado em tecido moletom. Possui capuz com tira para ajuste, estampada frontal de bordado gato, manga longa, bolsos frontais, acabamento em ribana e costura no tom. ',
            'preco'        =>    60.00,
            'images'    =>'["Blusão Feminino Moletom Bordado Manga Longa 1.jpg",
             "Blusão Feminino Moletom Bordado Manga Longa 2.jpg", "Blusão Feminino Moletom Bordado Manga Longa 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);
        DB::table('products')->insert([
            'nome' => 'Camisa Masculina Estampa Xadrez',
            'url' => 'camisa-masculina-estampa-xadrez-720',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Camisa Masculina Estampa Xadrez Camisa masculina confeccionada em tecido algodão. Possui estampa xadrez, gola dobrável, fechamento por botões no entremeio, manga longa, botão no punho e acabamento em costura no tom.',
            'preco'        =>    100.00,
            'images'    =>'["CAMISA-ML-XADREZ 1.jpg",
             "CAMISA-ML-XADREZ 2.jpg", "CAMISA-ML-XADREZ 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),


        ]);

        DB::table('products')->insert([
            'nome' => 'Camiseta Masculina Estampa Peixes Manga Curta',
            'url' => 'camiseta-masculina-estampa-peixes-manga-curta-721',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Camiseta Masculina Estampa Peixes Manga Curta Camiseta masculina confeccionada em tecido algodão flamê. Possui estampa frontal de prédios urbanos com textura, gola redonda em ribana, manga curta, acabamento e costura no tom.',
            'preco'        =>    35.00,
            'images'    =>'["Camiseta Masculina Estampa Peixes Manga Curta 1.jpg",
             "Camiseta Masculina Estampa Peixes Manga Curta 2.jpg", "Camiseta Masculina Estampa Peixes Manga Curta 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
        ]);


        DB::table('products')->insert([
            'nome' => 'Casaco Masculino Moletom Bicolor Bolsos',
            'url' => 'casaco-masculino-moletom-bicolor-bolsos-722',
            'tamanho' => 'P',
            'quantidade'    => 3,
            'descricao'        => 'Casaco Masculino Moletom Bicolor Bolsos Casaco masculino confeccionado em tecido moletom com recorte bicolor. Possui capuz com tiras para amarração, bolsos na parte frontal, manga longa estampada com frase, fechamento por ziper no entremeio, acabamento e costura no tom.',
            'preco'        =>    119.00,
            'images'    =>'["Casaco Masculino Moletom Bicolor Bolsos 1.jpg",
             "Casaco Masculino Moletom Bicolor Bolsos 2.jpg", "Casaco Masculino Moletom Bicolor Bolsos 3.jpg"]',
             'created_at'=> now(),
             'updated_at'=>now(),
        ]);
        
        
    }
}
