<?php

use Illuminate\Database\Seeder;

class TransportadoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transportadoras = ['TNT Mercúrio Cargas e Encomendas Expressas', 'Jamef Transportes', 
            'Expresso São Miguel', 'Alfa Transportes', 'Transportes Translovato'];
        $transportadoras_ = array();
        foreach ($transportadoras as $t) {
            $transportadoras_[] = [
                'nome' => $t,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        \DB::table('transportadora')->insert($transportadoras_);
    }
}
