<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Constantes\Notificacao;
use Illuminate\Support\Facades\DB;
use App\Classes\Sistema\Country;
use App\Classes\Sistema\CountryLanguage;
use App\Classes\Sistema\Language;

class CountryController extends Controller
{
    public function searchCountry(Request $request)
    {
        $country = $request->all();

        if (empty($request['filter'])) {
            $country = DB::table('country')
                ->join('country_language', 'country_language.id_country', '=', 'country.id')
                ->select('country.*', 'country_language.name')
                ->where('country_language.id_language', '=', 1)
                ->orderBy('country_language.name', 'ASC')
                ->where(function ($query) use ($request) {
                    if (!empty($request['filter'])) {
                        $query->orWhere('name', 'like', '%' . $request['filter'] . '%')
                            ->orWhere('code', 'like', '%' . $request['filter'] . '%');
                    }
                })->paginate(10);
        } else {
            $country = DB::table('country')
                ->join('country_language', 'country_language.id_country', '=', 'country.id')
                ->select('country.*', 'country_language.name')
                ->where('country_language.id_language', '=', 1)
                ->orderBy('country_language.name', 'ASC')
                ->where(function ($query) use ($request) {
                    if (!empty($request['filter'])) {
                        $query->orWhere('name', 'like', '%' . $request['filter'] . '%')
                              ->orWhere('code', 'like', '%' . $request['filter'] . '%');
                    }
                })->paginate(10);
        }
        return view('sistema.countries.manage', compact('country'));
    }

    public function manageCountry()
    {
         $country = DB::table('country')
             ->join('country_language', 'country_language.id_country', '=', 'country.id')
             ->select('country.*', 'country_language.name')
             ->where('country_language.id_language', '=', 1)
             ->orderBy('country_language.name', 'ASC')
             ->paginate(10);

        return view('sistema.countries.manage', compact('country'));
    }

    public function createCountry()
    {
        return view('sistema.countries.create');
    }

    public function saveCountry(Request $request)
    {
        $country['sistema_medida'] = $request->get('sistema_medida');
        $country['unidade_medida'] = $request->get('unidade_medida');
        $country['formato_data'] = $request->get('formato_data');
        $country['formato_numero'] = $request->get('formato_numero');
        $country['idioma_padrao'] = $request->get('idioma_padrao');
        $country['code'] = strtoupper($request->get('code'));
        $country['phone_code'] = $request->get('phone_code');
        $createCountry = Country::create($country);

        $nameLanguage = array(
            ucfirst($request->get('inputPTBR')),
            ucfirst($request->get('inputEN')),
            ucfirst($request->get('inputES'))
        );

        for ($i = 0; $i < count($nameLanguage); $i++) {
            CountryLanguage::create([
                'id_country' => $createCountry['id'],
                'id_language' => $i + 1,
                'name' => $nameLanguage[$i]
            ]);
        }
        Notificacao::gerarAlert('', 'countries.cadastro_country_sucesso', 'success');
        return redirect()->route('country_manage');
    }

    public function editCountry($id)
    {
        $id_country = Country::find($id);

        $country = Country::where('sistema_medida', $id_country['sistema_medida'])->where('unidade_medida', $id_country['unidade_medida'])
            ->where('formato_data', $id_country['formato_data'])->where('formato_numero', $id_country['formato_numero'])
            ->where('idioma_padrao', $id_country['idioma_padrao'])->where('code', $id_country['code'])
            ->where('phone_code', $id_country['phone_code'])->get();

        $countryLang = CountryLanguage::select('id_country', 'id_language', 'name')->where('id_country', $id_country['id'])->get();

        return view('sistema.countries.edit', compact('country', 'countryLang'));
    }

    public function updateCountry(Request $request)
    {
        $country = $request->all();

        $countryArray = [
            'sistema_medida' => $country['sistema_medida'],
            'unidade_medida' => $country['unidade_medida'],
            'formato_data' => $country['formato_data'],
            'formato_numero' => $country['formato_numero'],
            'idioma_padrao' => $country['idioma_padrao'],
            'code' => strtoupper($country['code']),
            'phone_code' => $country['phone_code']
        ];
        Country::where('id', $country['id'])->update($countryArray);

        $nameLanguage = array(
            ucfirst($request->get('inputPTBR')),
            ucfirst($request->get('inputEN')),
            ucfirst($request->get('inputES'))
        );

        for ($i = 0; $i < count($nameLanguage); $i++) {
            CountryLanguage::where('id_country', $country['id'])
            ->where('id_language', ($i + 1))
            ->update(['name' => $nameLanguage[$i]]);
        }
        Notificacao::gerarAlert('', 'countries.editar_country_sucesso', 'success');
        return redirect()->route('country_manage');
    }

    public function deleteCountry($id)
    {
        $id_country = Country::find($id);

        $country = Country::where('sistema_medida', $id_country['sistema_medida'])->where('unidade_medida', $id_country['unidade_medida'])
            ->where('formato_data', $id_country['formato_data'])->where('formato_numero', $id_country['formato_numero'])
            ->where('idioma_padrao', $id_country['idioma_padrao'])->where('code', $id_country['code'])
            ->where('phone_code', $id_country['phone_code'])->delete();

        $countryLang = CountryLanguage::select('id_country', 'id_language', 'name')->where('id_country', $id_country['id'])->delete();

        Notificacao::gerarAlert('countries.sucesso', 'countries.remocao_sucesso', 'info');
        return redirect()->route('country_manage')->with('Sucesso', 'Foi deletado');
    }
}
