<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\User;
use App\Tipo;
use App\Subsistema;
use App\Sistema;
use App\Equipo;
use App\Protocolo;
use App\Insumo;
use App\Servicio;
use App\Herramienta;
use App\Repuesto;
use App\Falla;
use App\Zona;
use App\Team;
use App\Parametro;
use App\Estadistica;
use App\Profile;
use App\Plan;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Zona::create([
            'name'=>'no asignada',
            'slug'=>'no-asignada',
        ]);

        Zona::create([
            'name'=>'todas las zonas',
            'slug'=>'todas-las-zonas',
        ]);



        for ($i=3; $i <10 ; $i++) {
           $zona='zona '.$i;
           $slug=Str::slug($zona);
           Zona::create([
               'name'=>$zona,
               'slug'=>$slug,
           ]);
        }

        //$this->call(UsersTableSeeder::class, 25)->create();
        $this->call(RolesAndPermissionsSeeder::class);



        \factory(User::class,25)->create()->each(function($user){
            $user->assignRole('inhabilitado');
            $id=$user->id;
            $profile= \factory(Profile::class)->create();
            $profile->fill(['card_id'=>$user->card_id,'user_id'=>$id]);
            $profile->save();

         });


        $tipos=Tipo::all()->pluck('id');


       $operador=User::find(3);
       $operador->fill(['zona_id'=>2,'area'=>'operativa'])->save();

       $operador=User::find(4);
       $operador->fill(['zona_id'=>2,'area'=>'tecnica'])->save();


        $subsistemas=Subsistema::all();
        foreach($subsistemas as $subsistema){
            $id=rand(1,6);
            $sistema=Sistema::find($id,['id','name']);
            $subsistema->update([
            "sistema_id"=>$sistema->id,
            "sistema"=>$sistema->name,
            "validador"=>$sistema->id.'-'.$sistema->name,
            ]);
            $subsistema->save();
        }

        foreach($subsistemas as $s){

            $equipos=\factory(Equipo::class, 15)->create();
              foreach($equipos as $e){
                  $zId=rand(2,10);
                  $zona='zona_'.$zId;
                $tipo=Tipo::inRandomOrder()->first();
                  $e->update([
                       "sistema_id"=>$s->sistema_id,
                       "sistema"=>$s->sistema,
                       "subsistema_id"=>$s->id,
                       "subsistema"=>$s->name,
                       "validador"=>$s->id.'-'.$s->name,
                       "tipo"=>$tipo->name,
                       "tipo_id"=>$tipo->id,
                  ]);
                  $e->save();
              }
                    }

                    \factory(Protocolo::class,125)->create();
                    \factory(Insumo::class,100)->create();
                    \factory(Servicio::class,25)->create();
                    \factory(Herramienta::class,100)->create();
                    \factory(Repuesto::class,300)->create();
                    \factory(Falla::class,300)->create();


                    $parametros=parametros();
                    foreach($parametros as $p){
                        Parametro::create([
                         'name'=>$p,
                         'valor'=>1,
                         'unidad'=>'unidad',
                         'simbolo'=>'simbolo',
                         'slug'=>Str::slug($p),
                        ]);
                    }




                    Team::create([
                     'name'=>'mantenimiento general',
                     'kind'=>'mantenimiento general',
                    ]);


                    Team::create([
                        'name'=>'Equipo de mantenimiento diario',
                        'kind'=>'tipo mantenimiento multidiciplinario',
                        'description'=>'Equipo encardo de las tareas de rutina diaria'
                       ]);

                       Team::create([
                        'name'=>'Equipo de mantenimiento semanal',
                        'kind'=>'tipo mantenimiento multidiciplinario',
                        'description'=>'Equipo encardo de las tareas semanales'
                       ]);


                       Team::create([
                        'name'=>'Equipo de mantenimiento mensual',
                        'kind'=>'tipo mantenimiento multidiciplinario',
                        'description'=>'Equipo encardo de las tareas mensuales'
                       ]);


                       Team::create([
                        'name'=>'Equipo de mantenimiento semestral',
                        'kind'=>'tipo mantenimiento multidiciplinario',
                        'description'=>'Equipo encardo de las tareas semestral'
                       ]);

                       Team::create([
                        'name'=>'Equipo de mantenimiento anual',
                        'kind'=>'tipo mantenimiento multidiciplinario',
                        'description'=>'Equipo encardo de las tareas anuales'
                       ]);



                    Team::create([
                        'name'=>'mantenimiento eléctrico',
                        'kind'=>'mantenimiento eléctrico',
                       ]);

                       Team::create([
                        'name'=>'mantenimiento mecánico',
                        'kind'=>'mantenimiento mecánico',
                       ]);

                       Team::create([
                        'name'=>'mantenimiento eletromecánico',
                        'kind'=>'mantenimiento eletromecánico',
                       ]);


                       for ($i=9; $i <20; $i++) {
                        $jd=rand(1,4);
                        $user = User::find($i);
                        $team=Team::find($jd);
                        $user->teams()->sync($jd);
                        $team=Team::find($jd);
                        $users=$team->users;
                        $costo=0;
                        foreach ($users as $user) {
                          if($user->profile){
                               $costo=$costo+$user->profile->costo;
                            }
                        }
                        $team->fill(['integrantes'=>$users->count(),'costo'=>$costo])->save();
                    }

                    Plan::create([
                    'name'=>'Primer plan de Mantenimiento',
                    'fecha_inicio'=>'2020-01-01',
                    'hora_inicio'=>'07:00:00',
                    'horas_descanso'=>1,
                    'hora_descanso'=>'12:00:00',
                    ]);

                    \factory(Estadistica::class,300)->create();



    }
}
