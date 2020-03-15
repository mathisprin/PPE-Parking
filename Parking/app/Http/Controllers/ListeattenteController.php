<?php


namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;


class ListeAttenteController extends BaseController
{
    public function InsertListeAttente(Request $req,$id){


        $value = $req->session()->get('id');


        $NbListeAttente = DB::table('listeattente')
            ->select('*')
            ->get();


        DB::table('listeattente')->insert(
            ['Rang' => count($NbListeAttente) + 1,  'IDpersonne' => $id]
        );
        if ($value === 'ADMIN')
            return redirect("/infoperso/$id");
        else
            return redirect("/user/$id");



    }

    public function CheckPlace(Request $req){

        $FirstListeAttente = DB::table('listeattente')
            ->select('IDpersonne')
            ->where('Rang','=',1)
            ->get();

        $PlaceDisp = DB::table('place')
            ->select ('Numplace','Etat')
            ->where('Etat',0)
            ->get();

        $array = [];
        foreach ($FirstListeAttente as $key) {
            $array[] = $key;
        }



        if(count($PlaceDisp)>0){


            if (!empty($array)) {

                $Date_debut = date('Y-m-d');
                $id = $FirstListeAttente[0]->IDpersonne;

                $arr = [];
                foreach ($PlaceDisp as $key) {
                    $arr[] = $key;
                }

                $randomind = array_rand($arr);
                $randomPlace = $arr[$randomind]->Numplace;
                DB::table('reservation')->insert(
                    ['DateReservation' => $Date_debut, 'DateExpiration' => '2010-10-10', 'NumPlace' => $randomPlace, 'IDpersonne' => $id, 'Fin' => 'n']
                );

                DB::table('place')
                    ->where('NumPlace', $randomPlace)
                    ->update(['etat' => 1]);

                DB::table('listeattente')
                    ->where(['IDpersonne' => $id])
                    ->delete();
            }

        }

        return view('welcome');




    }
}