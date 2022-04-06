<?php

use Illuminate\Database\Seeder;

class Countries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Afghanistan 1
        DB::table('country_language')->insert([
            'id_country' => 1,
            'id_language' => 1,
            'name' => 'Afeganistão'
        ]);

        //Afghanistan 2
        DB::table('country_language')->insert([
            'id_country' => 1,
            'id_language' => 2,
            'name' => 'Afghanistan'
        ]);

        //Afghanistan 3
        DB::table('country_language')->insert([
            'id_country' => 1,
            'id_language' => 3,
            'name' => 'Afganistán'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AF',
            'phone_code' => 93
        ]);
/* ************************************************************************************************************ */
        //South Africa 1
        DB::table('country_language')->insert([
            'id_country' => 2,
            'id_language' => 1,
            'name' => 'África do Sul'
        ]);

        //South Africa 2
        DB::table('country_language')->insert([
            'id_country' => 2,
            'id_language' => 2,
            'name' => 'South Africa'
        ]);

        //South Africa 3
        DB::table('country_language')->insert([
            'id_country' => 2,
            'id_language' => 3,
            'name' => 'Sudáfrica'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ZA',
            'phone_code' => 27
        ]);
/* ************************************************************************************************************ */
        //Albânia 1
        DB::table('country_language')->insert([
            'id_country' => 3,
            'id_language' => 1,
            'name' => 'Albânia'
        ]);

        //Albânia 2
        DB::table('country_language')->insert([
            'id_country' => 3,
            'id_language' => 2,
            'name' => 'Albany'
        ]);

        //Albânia 3
        DB::table('country_language')->insert([
            'id_country' => 3,
            'id_language' => 3,
            'name' => 'Albania'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AL',
            'phone_code' => 355
        ]);
/* ************************************************************************************************************ */
        //Germany 1
        DB::table('country_language')->insert([
            'id_country' => 4,
            'id_language' => 1,
            'name' => 'Alemanah'
        ]);

        //Germany 2
        DB::table('country_language')->insert([
            'id_country' => 4,
            'id_language' => 2,
            'name' => 'Germany'
        ]);

        //Germany 3
        DB::table('country_language')->insert([
            'id_country' => 4,
            'id_language' => 3,
            'name' => 'Alemania'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'DE',
            'phone_code' => 49
        ]);
/* ************************************************************************************************************ */
        //Angola 1
        DB::table('country_language')->insert([
            'id_country' => 5,
            'id_language' => 1,
            'name' => 'Angola'
        ]);

        //Angola 2
        DB::table('country_language')->insert([
            'id_country' => 5,
            'id_language' => 2,
            'name' => 'Angola'
        ]);

        //Angola 3
        DB::table('country_language')->insert([
            'id_country' => 5,
            'id_language' => 3,
            'name' => 'Angola'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AO',
            'phone_code' => 244
        ]);
/* ************************************************************************************************************ */
        //Antigua and Barbuda 1
        DB::table('country_language')->insert([
            'id_country' => 6,
            'id_language' => 1,
            'name' => 'Antígua e Barbuda'
        ]);

         //Antigua and Barbuda 2
        DB::table('country_language')->insert([
            'id_country' => 6,
            'id_language' => 2,
            'name' => 'Antigua and Barbuda',
        ]);

         //Antigua and Barbuda 3
        DB::table('country_language')->insert([
            'id_country' => 6,
            'id_language' => 3,
            'name' => 'Antigua y Barbuda'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AG',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Saudi Arabia 1
        DB::table('country_language')->insert([
            'id_country' => 7,
            'id_language' => 1,
            'name' => 'Arábia Saudita'
        ]);

        //Saudi Arabia 2
        DB::table('country_language')->insert([
            'id_country' => 7,
            'id_language' => 2,
            'name' => 'Saudi Arabia'
        ]);

        //Saudi Arabia 3
        DB::table('country_language')->insert([
            'id_country' => 7,
            'id_language' => 3,
            'name' => 'Arabia Saudita'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SA',
            'phone_code' => 966
        ]);
/* ************************************************************************************************************ */
        //Algeria 1
         DB::table('country_language')->insert([
            'id_country' => 8,
            'id_language' => 1,
            'name' => 'Argélia'
        ]);

        //Algeria 2
        DB::table('country_language')->insert([
            'id_country' => 8,
            'id_language' => 2,
            'name' => 'Algeria'
        ]);

        //Algeria 3
        DB::table('country_language')->insert([
            'id_country' => 8,
            'id_language' => 3,
            'name' => 'Argelia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'DZ',
            'phone_code' => 213
        ]);
/* ************************************************************************************************************ */
        //Argentina
        DB::table('country_language')->insert([
            'id_country' => 9,
            'id_language' => 1,
            'name' => 'Argentina'
        ]);

        //Argentina 2
        DB::table('country_language')->insert([
            'id_country' => 9,
            'id_language' => 2,
            'name' => 'Argentina'
        ]);

        //Argentina 3
        DB::table('country_language')->insert([
            'id_country' => 9,
            'id_language' => 3,
            'name' => 'Argentina'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AR',
            'phone_code' => 54
        ]);
/* ************************************************************************************************************ */
        //Armenian 1
        DB::table('country_language')->insert([
            'id_country' => 10,
            'id_language' => 1,
            'name' => 'Arménia'
        ]);

        //Armenian 2
        DB::table('country_language')->insert([
            'id_country' => 10,
            'id_language' => 2,
            'name' => 'Armenian'
        ]);

        //Armenian 3
        DB::table('country_language')->insert([
            'id_country' => 10,
            'id_language' => 3,
            'name' => 'Armenia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AM',
            'phone_code' => 374
        ]);
/* ************************************************************************************************************ */
        //Australia 1
        DB::table('country_language')->insert([
            'id_country' => 11,
            'id_language' => 1,
            'name' => 'Austrália'

        ]);

        //Australia 2
        DB::table('country_language')->insert([
            'id_country' => 11,
            'id_language' => 2,
            'name' => 'Australia'
        ]);

        //Australia 3
        DB::table('country_language')->insert([
            'id_country' => 11,
            'id_language' => 3,
            'name' => 'Australia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AU',
            'phone_code' => 61
        ]);
/* ************************************************************************************************************ */
        //Austria 1
        DB::table('country_language')->insert([
            'id_country' => 12,
            'id_language' => 1,
            'name' => 'Áustria'
        ]);

        //Austria 2
        DB::table('country_language')->insert([
            'id_country' => 12,
            'id_language' => 2,
            'name' => 'Austria'
        ]);;

        //Austria 3
        DB::table('country_language')->insert([
            'id_country' => 12,
            'id_language' => 3,
            'name' => 'Austria'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AT',
            'phone_code' => 43
        ]);
/* ************************************************************************************************************ */
        //Azerbaijan 1
        DB::table('country_language')->insert([
            'id_country' => 13,
            'id_language' => 1,
            'name' => 'Azerbaijão'
        ]);

        //Azerbaijan 2
        DB::table('country_language')->insert([
            'id_country' => 13,
            'id_language' => 2,
            'name' => 'Azerbaijan'
        ]);

        //Azerbaijan 3
        DB::table('country_language')->insert([
            'id_country' => 13,
            'id_language' => 3,
            'name' => 'Azerbaiyán'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AZ',
            'phone_code' => 994
        ]);
/* ************************************************************************************************************ */
        //Bahamas 1
        DB::table('country_language')->insert([
            'id_country' => 14,
            'id_language' => 1,
            'name' => 'Bahamas'
        ]);

        //Bahamas 2
        DB::table('country_language')->insert([
            'id_country' => 14,
            'id_language' => 2,
            'name' => 'Bahamas'
        ]);

        //Bahamas 3
        DB::table('country_language')->insert([
            'id_country' => 14,
            'id_language' => 3,
            'name' => 'Bahamas'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BS',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Bangladesh 1
        DB::table('country_language')->insert([
            'id_country' => 15,
            'id_language' => 1,
            'name' => 'Bangladexe'
        ]);

        //Bangladesh 2
        DB::table('country_language')->insert([
             'id_country' => 15,
             'id_language' => 2,
             'name' => 'Bangladesh'
        ]);

        //Bangladesh 3
        DB::table('country_language')->insert([
             'id_country' => 15,
             'id_language' => 3,
             'name' => 'Bangladesh'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BD',
            'phone_code' => 880
        ]);
/* ************************************************************************************************************ */
        //Barbados 1
        DB::table('country_language')->insert([
            'id_country' => 16,
            'id_language' => 1,
            'name' => 'Barbados'
        ]);

        //Barbados 2
        DB::table('country_language')->insert([
            'id_country' => 16,
            'id_language' => 2,
            'name' => 'Barbados'
        ]);

        //Barbados 3
        DB::table('country_language')->insert([
            'id_country' => 16,
            'id_language' => 3,
            'name' => 'Barbados'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BB',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Bahrein
        DB::table('country_language')->insert([
            'id_country' => 17,
            'id_language' => 1,
            'name' => 'Bahrein'
        ]);

        //Bahrein 2
        DB::table('country_language')->insert([
            'id_country' => 17,
            'id_language' => 2,
            'name' => 'Bahrain'
        ]);

        //Bahrein 3
        DB::table('country_language')->insert([
            'id_country' => 17,
            'id_language' => 3,
            'name' => 'Bahrein'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BH',
            'phone_code' => 973
        ]);
/* ************************************************************************************************************ */
        //Belgium 1
        DB::table('country_language')->insert([
            'id_country' => 18,
            'id_language' => 1,
            'name' => 'Bélgica'
        ]);

        //Belgium 2
        DB::table('country_language')->insert([
            'id_country' => 18,
            'id_language' => 2,
            'name' => 'Belgium'
        ]);

        //Belgium 3
        DB::table('country_language')->insert([
            'id_country' => 18,
            'id_language' => 3,
            'name' => 'Bélgica'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BE',
            'phone_code' => 32
        ]);
/* ************************************************************************************************************ */
        //Belize 1
        DB::table('country_language')->insert([
            'id_country' => 19,
            'id_language' => 1,
            'name' => 'Belize'
        ]);

        //Belize 2
        DB::table('country_language')->insert([
            'id_country' => 19,
            'id_language' => 2,
            'name' => 'Belize'
        ]);

        //Belize 3
        DB::table('country_language')->insert([
            'id_country' => 19,
            'id_language' => 3,
            'name' => 'Belize'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BZ',
            'phone_code' => 501
        ]);
/* ************************************************************************************************************ */
        //Benim 1
        DB::table('country_language')->insert([
            'id_country' => 20,
            'id_language' => 1,
            'name' => 'Benim',
        ]);

        //Benim 2
        DB::table('country_language')->insert([
            'id_country' => 20,
            'id_language' => 2,
            'name' => 'Benin'
        ]);

        //Benim 3
        DB::table('country_language')->insert([
            'id_country' => 20,
            'id_language' => 3,
            'name' => 'Benín'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BJ',
            'phone_code' => 229
        ]);
/* ************************************************************************************************************ */
        //Bolivia 1
        DB::table('country_language')->insert([
            'id_country' => 21,
            'id_language' => 1,
            'name' => 'Bolívia'
        ]);

        //Bolivia 2
        DB::table('country_language')->insert([
            'id_country' => 21,
            'id_language' => 2,
            'name' => 'Bolivia'
        ]);

        //Bolivia 3
        DB::table('country_language')->insert([
            'id_country' => 21,
            'id_language' => 3,
            'name' => 'Bolivia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BO',
            'phone_code' => 591
        ]);
/* ************************************************************************************************************ */
        //Bosnia and Herzegovina 1
        DB::table('country_language')->insert([
            'id_country' => 22,
            'id_language' => 1,
            'name' => 'Bósnia e Herzegovina'
        ]);

        //Bosnia and Herzegovina 2
        DB::table('country_language')->insert([
            'id_country' => 22,
            'id_language' => 2,
            'name' => 'Bosnia and Herzegovina'
        ]);

        //Bosnia and Herzegovina 3
        DB::table('country_language')->insert([
            'id_country' => 22,
            'id_language' => 3,
            'name' => 'Bosnia y Herzegovina'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BA',
            'phone_code' => 387
        ]);
/* ************************************************************************************************************ */
        //Botswana 1
        DB::table('country_language')->insert([
            'id_country' => 23,
            'id_language' => 1,
            'name' => 'Botsuana'
        ]);

        //Botswana 2
        DB::table('country_language')->insert([
            'id_country' => 23,
            'id_language' => 2,
            'name' => 'Botswana'
        ]);

        //Botswana 3
        DB::table('country_language')->insert([
            'id_country' => 23,
            'id_language' => 3,
            'name' => 'Botsuana'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BW',
            'phone_code' => 267
        ]);
/* ************************************************************************************************************ */
        //Brazil 1
        DB::table('country_language')->insert([
            'id_country' => 24,
            'id_language' => 1,
            'name' => 'Brasil'
        ]);

        //Brazil 2
        DB::table('country_language')->insert([
            'id_country' => 24,
            'id_language' => 2,
            'name' => 'Brazil'
        ]);;

        //Brazil 3
        DB::table('country_language')->insert([
            'id_country' => 24,
            'id_language' => 3,
            'name' => 'Brasil'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 1,
            'code' => 'BR',
            'phone_code' => 55
        ]);
/* ************************************************************************************************************ */
        //Bulgaria 1
        DB::table('country_language')->insert([
            'id_country' => 25,
            'id_language' => 1,
            'name' => 'Bulgaria'
        ]);

        //Bulgaria 2
        DB::table('country_language')->insert([
            'id_country' => 25,
            'id_language' => 2,
            'name' => 'Bulgaria'
        ]);

        //Bulgaria 3
        DB::table('country_language')->insert([
            'id_country' => 25,
            'id_language' => 3,
            'name' => 'Bulgaria'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BG',
            'phone_code' => 359
        ]);
/* ************************************************************************************************************ */
        //Burkina Faso 1
        DB::table('country_language')->insert([
            'id_country' => 26,
            'id_language' => 1,
            'name' => 'Burkina Faso'
        ]);

        //Burkina Faso 2
        DB::table('country_language')->insert([
            'id_country' => 26,
            'id_language' => 2,
            'name' => 'Burkina Faso'
        ]);

        //Burkina Faso 3
        DB::table('country_language')->insert([
            'id_country' => 26,
            'id_language' => 3,
            'name' => 'Burkina Faso'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BF',
            'phone_code' => 226
        ]);
/* ************************************************************************************************************ */
        //Burundi 1
        DB::table('country_language')->insert([
            'id_country' => 27,
            'id_language' => 1,
            'name' => 'Burundi'
        ]);

        //Burundi 2
        DB::table('country_language')->insert([
            'id_country' => 27,
            'id_language' => 2,
            'name' => 'Burundi'
        ]);

        //Burundi 3
        DB::table('country_language')->insert([
            'id_country' => 27,
            'id_language' => 3,
            'name' => 'Burundi'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'BI',
            'phone_code' => 257
        ]);
/* ************************************************************************************************************ */
        //Cape Verde 1
        DB::table('country_language')->insert([
            'id_country' => 28,
            'id_language' => 1,
            'name' => 'Cabo Verde'
        ]);

        //Cape Verde 2
        DB::table('country_language')->insert([
            'id_country' => 28,
            'id_language' => 2,
            'name' => 'Cape Verde'
        ]);

        //Cape Verde 3
        DB::table('country_language')->insert([
            'id_country' => 28,
            'id_language' => 3,
            'name' => 'Cabo Verde'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CV',
            'phone_code' => 238
        ]);
/* ************************************************************************************************************ */
        //Cameroon 1
        DB::table('country_language')->insert([
            'id_country' => 29,
            'id_language' => 1,
            'name' => 'Camarões'
        ]);

        //Cameroon 2
        DB::table('country_language')->insert([
            'id_country' => 29,
            'id_language' => 2,
            'name' => 'Cameroon'
        ]);

        //Cameroon 3
        DB::table('country_language')->insert([
            'id_country' => 29,
            'id_language' => 3,
            'name' => 'Camaroes'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CM',
            'phone_code' => 237
        ]);
/* ************************************************************************************************************ */
        //Cambodia 1
        DB::table('country_language')->insert([
            'id_country' => 30,
            'id_language' => 1,
            'name' => 'Cambodja',
        ]);

        //Cambodia 2
        DB::table('country_language')->insert([
            'id_country' => 30,
            'id_language' => 2,
            'name' => 'Cambodia'
        ]);

        //Cambodia 3
        DB::table('country_language')->insert([
            'id_country' => 30,
            'id_language' => 3,
            'name' => 'Camboya'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KH',
            'phone_code' => 855
        ]);
/* ************************************************************************************************************ */
        //Canada 1
        DB::table('country_language')->insert([
            'id_country' => 31,
            'id_language' => 1,
            'name' => 'Canadá'
        ]);

        //Canada 2
        DB::table('country_language')->insert([
            'id_country' => 31,
            'id_language' => 2,
            'name' => 'Canada'
        ]);

        //Canada 3
        DB::table('country_language')->insert([
            'id_country' => 31,
            'id_language' => 3,
            'name' => 'Canada'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CA',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Qatar 1
        DB::table('country_language')->insert([
            'id_country' => 32,
            'id_language' => 1,
            'name' => 'Catar'
        ]);

        //Qatar 2
        DB::table('country_language')->insert([
            'id_country' => 32,
            'id_language' => 2,
            'name' => 'Qatar'
        ]);

        //Qatar 3
        DB::table('country_language')->insert([
            'id_country' => 32,
            'id_language' => 3,
            'name' => 'Qatar'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'QA',
            'phone_code' => 974
        ]);
/* ************************************************************************************************************ */
        //Kazakhstan 1
        DB::table('country_language')->insert([
            'id_country' => 33,
            'id_language' => 1,
            'name' => 'Cazaquistão',
        ]);

        //Kazakhstan 2
        DB::table('country_language')->insert([
            'id_country' => 33,
            'id_language' => 2,
            'name' => 'Kazakhstan'
        ]);

        //Kazakhstan 3
        DB::table('country_language')->insert([
            'id_country' => 33,
            'id_language' => 3,
            'name' => 'Kazajstán'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KZ',
            'phone_code' => 7
        ]);
/* ************************************************************************************************************ */
        //Chad 1
        DB::table('country_language')->insert([
            'id_country' => 34,
            'id_language' => 1,
            'name' => 'Chade'
        ]);

        //Chad 2
        DB::table('country_language')->insert([
            'id_country' => 34,
            'id_language' => 2,
            'name' => 'Chad'
        ]);

        //Chad 3
        DB::table('country_language')->insert([
            'id_country' => 34,
            'id_language' => 3,
            'name' => 'Chad'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'TD',
            'phone_code' => 235
        ]);
/* ************************************************************************************************************ */
        //Chile 1
        DB::table('country_language')->insert([
            'id_country' => 35,
            'id_language' => 1,
            'name' => 'Chile'
        ]);

        //Chile 2
        DB::table('country_language')->insert([
            'id_country' => 35,
            'id_language' => 2,
            'name' => 'Chile'
        ]);

        //Chile 3
        DB::table('country_language')->insert([
            'id_country' => 35,
            'id_language' => 3,
            'name' => 'Chile'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CL',
            'phone_code' => 56
        ]);
/* ************************************************************************************************************ */
        //China 1
        DB::table('country_language')->insert([
            'id_country' => 36,
            'id_language' => 1,
            'name' => 'China'
        ]);

        //China 2
        DB::table('country_language')->insert([
            'id_country' => 36,
            'id_language' => 2,
            'name' => 'China'
        ]);

        //China 3
        DB::table('country_language')->insert([
            'id_country' => 36,
            'id_language' => 3,
            'name' => 'China'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CN',
            'phone_code' => 86
        ]);
/* ************************************************************************************************************ */
        //Chipre 1
        DB::table('country_language')->insert([
            'id_country' => 37,
            'id_language' => 1,
            'name' => 'Chipre'
        ]);

        //Chipre 2
        DB::table('country_language')->insert([
            'id_country' => 37,
            'id_language' => 2,
            'name' => 'Chipre'
        ]);

        //Chipre 3
        DB::table('country_language')->insert([
            'id_country' => 37,
            'id_language' => 3,
            'name' => 'Chipre'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CY',
            'phone_code' => 357
        ]);
/* ************************************************************************************************************ */
        //Colombia 1
        DB::table('country_language')->insert([
            'id_country' => 38,
            'id_language' => 1,
            'name' => 'Colômbia'
        ]);

        //Colombia 2
        DB::table('country_language')->insert([
            'id_country' => 38,
            'id_language' => 2,
            'name' => 'Colombia'
        ]);

        //Colombia 3
        DB::table('country_language')->insert([
            'id_country' => 38,
            'id_language' => 3,
            'name' => 'Colombia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CO',
            'phone_code' => 57
        ]);
/* ************************************************************************************************************ */
        //Comoros 1
        DB::table('country_language')->insert([
            'id_country' => 39,
            'id_language' => 1,
            'name' => 'Comores'
        ]);

        //Comoros 2
        DB::table('country_language')->insert([
            'id_country' => 39,
            'id_language' => 2,
            'name' => 'Comoros'
        ]);

        //Comoros 3
        DB::table('country_language')->insert([
            'id_country' => 39,
            'id_language' => 3,
            'name' => 'Comoras'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KM',
            'phone_code' => 269
        ]);
/* ************************************************************************************************************ */
        //Congo 1
        DB::table('country_language')->insert([
            'id_country' => 40,
            'id_language' => 1,
            'name' => 'Congo'
        ]);

        //Congo 2
        DB::table('country_language')->insert([
            'id_country' => 40,
            'id_language' => 2,
            'name' => 'Congo'
        ]);

        //Congo 3
        DB::table('country_language')->insert([
            'id_country' => 40,
            'id_language' => 3,
            'name' => 'Congo'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CG',
            'phone_code' => 242
        ]);
/* ************************************************************************************************************ */
        //North Korea 1
        DB::table('country_language')->insert([
            'id_country' => 41,
            'id_language' => 1,
            'name' => 'Coreia do Norte'
        ]);

        //North Korea 2
        DB::table('country_language')->insert([
            'id_country' => 41,
            'id_language' => 2,
            'name' => 'North Korea'
        ]);

        //North Korea 3
        DB::table('country_language')->insert([
            'id_country' => 41,
            'id_language' => 3,
            'name' => 'Corea del Norte'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KP',
            'phone_code' => 850
        ]);
/* ************************************************************************************************************ */
        //South Korea 1
        DB::table('country_language')->insert([
            'id_country' => 42,
            'id_language' => 1,
            'name' => 'Coreia do Sul'
        ]);

        //South Korea 2
        DB::table('country_language')->insert([
            'id_country' => 42,
            'id_language' => 2,
            'name' => 'South Korea'
        ]);

        //South Korea 3
        DB::table('country_language')->insert([
            'id_country' => 42,
            'id_language' => 3,
            'name' => 'Corea del Sur'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KR',
            'phone_code' => 82
        ]);
/* ************************************************************************************************************ */
        //Ivory Coast 1
        DB::table('country_language')->insert([
            'id_country' => 43,
            'id_language' => 1,
            'name' => 'Costa do Marfim'
        ]);

        //Ivory Coast 2
        DB::table('country_language')->insert([
            'id_country' => 43,
            'id_language' => 2,
            'name' => 'Ivory Coast'
        ]);

        //Ivory Coast 3
        DB::table('country_language')->insert([
            'id_country' => 43,
            'id_language' => 3,
            'name' => 'Costa de Marfil'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CI',
            'phone_code' => 225
        ]);
/* ************************************************************************************************************ */
        //Costa Rica 1
        DB::table('country_language')->insert([
            'id_country' => 44,
            'id_language' => 1,
            'name' => 'Costa Rica'
        ]);

        //Costa Rica 2
        DB::table('country_language')->insert([
            'id_country' => 44,
            'id_language' => 2,
            'name' => 'Costa Rica'
        ]);

        //Costa Rica 3
        DB::table('country_language')->insert([
            'id_country' => 44,
            'id_language' => 3,
            'name' => 'Costa Rica'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CR',
            'phone_code' => 506
        ]);
/* ************************************************************************************************************ */
        //Croatia 1
        DB::table('country_language')->insert([
            'id_country' => 45,
            'id_language' =>  1,
            'name' => 'Croácia'
        ]);

        //Croatia 2
        DB::table('country_language')->insert([
            'id_country' => 45,
            'id_language' => 2,
            'name' => 'Croatia'
        ]);

        //Croatia 3
        DB::table('country_language')->insert([
            'id_country' => 45,
            'id_language' => 3,
            'name' => 'Croacia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'HR',
            'phone_code' => 385
        ]);
/* ************************************************************************************************************ */
        //Cuba 1
        DB::table('country_language')->insert([
            'id_country' => 46,
            'id_language' => 1,
            'name' => 'Cuba'
        ]);

        //Cuba 2
        DB::table('country_language')->insert([
            'id_country' => 46,
            'id_language' => 2,
            'name' => 'Cuba'
        ]);

        //Cuba 3
        DB::table('country_language')->insert([
            'id_country' => 46,
            'id_language' => 3,
            'name' => 'Cuba'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CU',
            'phone_code' => 53
        ]);
/* ************************************************************************************************************ */
        //Denmark 1
        DB::table('country_language')->insert([
            'id_country' => 47,
            'id_language' => 1,
            'name' => 'Dinamarca'
        ]);

        //Denmark 2
        DB::table('country_language')->insert([
            'id_country' => 47,
            'id_language' => 2,
            'name' => 'Denmark'
        ]);

        //Denmark 3
        DB::table('country_language')->insert([
            'id_country' => 47,
            'id_language' => 3,
            'name' => 'Dinamarca'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'DK',
            'phone_code' => 45
        ]);
/* ************************************************************************************************************ */
        //Djibouti 1
        DB::table('country_language')->insert([
            'id_country' => 48,
            'id_language' => 1,
            'name' => 'Djibouti'
        ]);

        //Djibouti 2
        DB::table('country_language')->insert([
            'id_country' => 48,
            'id_language' => 2,
            'name' => 'Djibouti'
        ]);

        //Djibouti 3
        DB::table('country_language')->insert([
            'id_country' => 48,
            'id_language' => 3,
            'name' => 'Djibouti'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'DJ',
            'phone_code' => 253
        ]);
/* ************************************************************************************************************ */
        //Dominica 1
        DB::table('country_language')->insert([
            'id_country' => 49,
            'id_language' => 1,
            'name' => 'Dominica'
        ]);

        //Dominica 2
        DB::table('country_language')->insert([
            'id_country' => 49,
            'id_language' => 2,
            'name' => 'Dominica'
        ]);

        //Dominica 3
        DB::table('country_language')->insert([
            'id_country' => 49,
            'id_language' => 3,
            'name' => 'Dominica'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'DM',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Egypt 1
        DB::table('country_language')->insert([
            'id_country' => 50,
            'id_language' => 1,
            'name' => 'Egito'
        ]);

        //Egypt 2
        DB::table('country_language')->insert([
            'id_country' => 50,
            'id_language' => 2,
            'name' => 'Egypt'
        ]);

        //Egypt 3
        DB::table('country_language')->insert([
            'id_country' => 50,
            'id_language' => 3,
            'name' => 'Egipto'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'EG',
            'phone_code' => 20
        ]);
/* ************************************************************************************************************ */
        //El Salvador 1
        DB::table('country_language')->insert([
            'id_country' => 51,
            'id_language' => 1,
            'name' => 'El Salvador'
        ]);

        //El Salvador 2
        DB::table('country_language')->insert([
            'id_country' => 51,
            'id_language' => 2,
            'name' => 'El Salvador'
        ]);

        //El Salvador 3
        DB::table('country_language')->insert([
            'id_country' => 51,
            'id_language' => 3,
            'name' => 'El Salvador'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SV',
            'phone_code' => 503
        ]);
/* ************************************************************************************************************ */
        //United Arab Emirates 1
        DB::table('country_language')->insert([
            'id_country' => 52,
            'id_language' => 1,
            'name' => 'Emirados Árabes Unidos'
        ]);

        //United Arab Emirates 2
        DB::table('country_language')->insert([
            'id_country' => 52,
            'id_language' => 2,
            'name' => 'United Arab Emirates'
        ]);

        //United Arab Emirates 3
        DB::table('country_language')->insert([
            'id_country' => 52,
            'id_language' => 3,
            'name' => 'Emiratos Árabes Unidos'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'AE',
            'phone_code' => 971
        ]);
/* ************************************************************************************************************ */
        //Ecuador 1
        DB::table('country_language')->insert([
            'id_country' => 53,
            'id_language' => 1,
            'name' => 'Equador',
        ]);

        //Ecuador 2
        DB::table('country_language')->insert([
            'id_country' => 53,
            'id_language' => 2,
            'name' => 'Ecuador'
        ]);

        //Ecuador 3
        DB::table('country_language')->insert([
            'id_country' => 53,
            'id_language' => 3,
            'name' => 'Ecuador'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'EC',
            'phone_code' => 593
        ]);
/* ************************************************************************************************************ */
        //Eritrea 1
        DB::table('country_language')->insert([
            'id_country' => 54,
            'id_language' => 1,
            'name' => 'Eritreia'
        ]);

        //Eritrea 2
        DB::table('country_language')->insert([
            'id_country' => 54,
            'id_language' => 2,
            'name' => 'Eritrea'
        ]);

        //Eritrea 3
        DB::table('country_language')->insert([
            'id_country' => 54,
            'id_language' => 3,
            'name' => 'Eritrea'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ER',
            'phone_code' => 291
        ]);
/* ************************************************************************************************************ */
        //Eslovaquia 1
        DB::table('country_language')->insert([
            'id_country' => 55,
            'id_language' => 1,
            'name' => 'Eslováquia'
        ]);

        //Eslovaquia 2
        DB::table('country_language')->insert([
            'id_country' => 55,
            'id_language' => 2,
            'name' => 'Slovakia'
        ]);

        //Eslovaquia 3
        DB::table('country_language')->insert([
            'id_country' => 55,
            'id_language' => 3,
            'name' => 'Eslovaquia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SK',
            'phone_code' => 421
        ]);
/* ************************************************************************************************************ */
        //Slovenia 1
        DB::table('country_language')->insert([
            'id_country' => 56,
            'id_language' => 1,
            'name' => 'Eslovênia'
        ]);

        //Slovenia 2
        DB::table('country_language')->insert([
            'id_country' => 56,
            'id_language' => 2,
            'name' => 'Slovenia'
        ]);

        //Slovenia 3
        DB::table('country_language')->insert([
            'id_country' => 56,
            'id_language' => 3,
            'name' => 'Eslovenia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SI',
            'phone_code' => 386
        ]);
/* ************************************************************************************************************ */
        //Spain 1
        DB::table('country_language')->insert([
            'id_country' => 57,
            'id_language' => 1,
            'name' => 'Espanha'
        ]);

        //Spain 2
        DB::table('country_language')->insert([
            'id_country' => 57,
            'id_language' => 2,
            'name' => 'Spain'
        ]);

        //Spain 3
        DB::table('country_language')->insert([
            'id_country' => 57,
            'id_language' => 3,
            'name' => 'España'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 3,
            'code' => 'KM',
            'phone_code' => 269
        ]);
/* ************************************************************************************************************ */
        //Eswatini 1
        DB::table('country_language')->insert([
            'id_country' => 58,
            'id_language' => 1,
            'name' => 'Suazilândia'
        ]);

        //Eswatini 2
        DB::table('country_language')->insert([
            'id_country' => 58,
            'id_language' => 2,
            'name' => 'Eswatini'
        ]);

        //Eswatini 3
        DB::table('country_language')->insert([
            'id_country' => 58,
            'id_language' => 3,
            'name' => 'Eswatini'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SZ',
            'phone_code' => 268
        ]);
/* ************************************************************************************************************ */
        //State of Palestine 1
        DB::table('country_language')->insert([
            'id_country' => 59,
            'id_language' => 1,
            'name' => 'Estado da Palestina'
        ]);

        //State of Palestine 2
        DB::table('country_language')->insert([
            'id_country' => 59,
            'id_language' => 2,
            'name' => 'State of Palestine'
        ]);

        //State of Palestine 3
        DB::table('country_language')->insert([
            'id_country' => 59,
            'id_language' => 3,
            'name' => 'Estado de Palestina'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PS',
            'phone_code' => 970
        ]);
/* ************************************************************************************************************ */
        //United States of America
        DB::table('country_language')->insert([
            'id_country' => 60,
            'id_language' => 1,
            'name' => 'Estados Unidos da América'
        ]);

        //United States of America 2
        DB::table('country_language')->insert([
            'id_country' => 60,
            'id_language' => 2,
            'name' => 'United States of America'
        ]);

        //United States of America 3
        DB::table('country_language')->insert([
            'id_country' => 60,
            'id_language' => 3,
            'name' => 'Estados Unidos de América'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 2,
            'unidade_medida' => 2,
            'formato_data' => 2,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'US',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Estonia 1
        DB::table('country_language')->insert([
            'id_country' => 61,
            'id_language' => 1,
            'name' => 'Estônia'
        ]);

        //Estonia 2
        DB::table('country_language')->insert([
            'id_country' => 61,
            'id_language' => 2,
            'name' => 'Estonia'
        ]);

        //Estonia 3
        DB::table('country_language')->insert([
            'id_country' => 61,
            'id_language' => 3,
            'name' => 'Estonia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'EE',
            'phone_code' => 372
        ]);
/* ************************************************************************************************************ */
        //Ethiopia 1
        DB::table('country_language')->insert([
            'id_country' => 62,
            'id_language' => 1,
            'name' => 'Etiópia'
        ]);

        //Ethiopia 2
        DB::table('country_language')->insert([
            'id_country' => 62,
            'id_language' => 2,
            'name' => 'Ethiopia'
        ]);

        //Ethiopia 3
        DB::table('country_language')->insert([
            'id_country' => 62,
            'id_language' => 3,
            'name' => 'Etiopía'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ET',
            'phone_code' => 251
        ]);
/* ************************************************************************************************************ */
        //Fiji 1
        DB::table('country_language')->insert([
            'id_country' => 63,
            'id_language' => 1,
            'name' => 'Fiji'
        ]);

        //Fiji 2
        DB::table('country_language')->insert([
            'id_country' => 63,
            'id_language' => 2,
            'name' => 'Fiji'
        ]);

        //Fiji 3
        DB::table('country_language')->insert([
            'id_country' => 63,
            'id_language' => 3,
            'name' => 'Fiji'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'FJ',
            'phone_code' => 679
        ]);
/* ************************************************************************************************************ */
        //Philippines 1
        DB::table('country_language')->insert([
            'id_country' => 64,
            'id_language' => 1,
            'name' => 'Filipinas'
        ]);

        //Philippines 2
        DB::table('country_language')->insert([
            'id_country' => 64,
            'id_language' => 2,
            'name' => 'Philippines'
        ]);

        //Philippines 3
        DB::table('country_language')->insert([
            'id_country' => 64,
            'id_language' => 3,
            'name' => 'Filipinas'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PH',
            'phone_code' => 269
        ]);
/* ************************************************************************************************************ */
        //Finland 1
        DB::table('country_language')->insert([
            'id_country' => 65,
            'id_language' => 1,
            'name' => 'Finlândia'
        ]);

        //Finland 2
        DB::table('country_language')->insert([
            'id_country' => 65,
            'id_language' => 2,
            'name' => 'Finland'
        ]);

        //Finland 3
        DB::table('country_language')->insert([
            'id_country' => 65,
            'id_language' => 3,
            'name' => 'Finlandia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'FI',
            'phone_code' => 358
        ]);
/* ************************************************************************************************************ */
        //France 1
        DB::table('country_language')->insert([
            'id_country' => 66,
            'id_language' => 1,
            'name' => 'França'
        ]);

        //France 2
        DB::table('country_language')->insert([
            'id_country' => 66,
            'id_language' => 2,
            'name' => 'France'
        ]);

        //France 3
        DB::table('country_language')->insert([
            'id_country' => 66,
            'id_language' => 3,
            'name' => 'Francia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'FR',
            'phone_code' => 33
        ]);
/* ************************************************************************************************************ */
        //Gabon 1
        DB::table('country_language')->insert([
            'id_country' => 67,
            'id_language' => 1,
            'name' => 'Gabão'
        ]);

        //Gabon 2
        DB::table('country_language')->insert([
            'id_country' => 67,
            'id_language' => 2,
            'name' => 'Gabon'
        ]);

        //Gabon  3
        DB::table('country_language')->insert([
            'id_country' => 67,
            'id_language' => 3,
            'name' => 'Gabón'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GA',
            'phone_code' => 241
        ]);
/* ************************************************************************************************************ */
        //Gambia 1
        DB::table('country_language')->insert([
            'id_country' => 68,
            'id_language' => 1,
            'name' => 'Gâmbia'
        ]);

        //Gambia 2
        DB::table('country_language')->insert([
            'id_country' => 68,
            'id_language' => 2,
            'name' => 'Gambia'
        ]);

        //Gambia 3
        DB::table('country_language')->insert([
            'id_country' => 68,
            'id_language' => 3,
            'name' => 'Gambia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GM',
            'phone_code' => 220
        ]);
/* ************************************************************************************************************ */
        //Ghana 1
        DB::table('country_language')->insert([
            'id_country' => 69,
            'id_language' => 1,
            'name' => 'Gana'
        ]);

        //Ghana 2
        DB::table('country_language')->insert([
            'id_country' => 69,
            'id_language' => 2,
            'name' => 'Ghana'
        ]);

        //Ghana 3
        DB::table('country_language')->insert([
            'id_country' => 69,
            'id_language' => 3,
            'name' => 'Ghana'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GH',
            'phone_code' => 233
        ]);
/* ************************************************************************************************************ */
        //Georgia 1
        DB::table('country_language')->insert([
            'id_country' => 70,
            'id_language' => 1,
            'name' => 'Geórgia'
        ]);

        //Georgia 2
        DB::table('country_language')->insert([
            'id_country' => 70,
            'id_language' => 2,
            'name' => 'Georgia'
        ]);

        //Georgia 3
        DB::table('country_language')->insert([
            'id_country' => 70,
            'id_language' => 3,
            'name' => 'Georgia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GE',
            'phone_code' => 995
        ]);
/* ************************************************************************************************************ */
        //Grenada 1
        DB::table('country_language')->insert([
            'id_country' => 71,
            'id_language' => 1,
            'name' => 'Granada'
        ]);

        //Grenada 2
        DB::table('country_language')->insert([
            'id_country' => 71,
            'id_language' => 2,
            'name' => 'Grenada'
        ]);

        //Grenada 3
        DB::table('country_language')->insert([
            'id_country' => 71,
            'id_language' => 3,
            'name' => 'Granada'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GD',
            'phone_code' =>  473
        ]);
/* ************************************************************************************************************ */
        //Greece 1
        DB::table('country_language')->insert([
            'id_country' => 72,
            'id_language' => 1,
            'name' => 'Grécia',
        ]);

        //Greece 2
        DB::table('country_language')->insert([
            'id_country' => 72,
            'id_language' => 2,
            'name' => 'Greece'
        ]);

        //Greece 3
        DB::table('country_language')->insert([
            'id_country' => 72,
            'id_language' => 3,
            'name' => 'Grecia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GR',
            'phone_code' => 30
        ]);
/* ************************************************************************************************************ */
        //Guatemala 1
        DB::table('country_language')->insert([
            'id_country' => 74,
            'id_language' => 1,
            'name' => 'Guatemala'
        ]);

        //Guatemala 2
        DB::table('country_language')->insert([
            'id_country' => 74,
            'id_language' => 2,
            'name' => 'Guatemala'
        ]);

        //Guatemala 3
        DB::table('country_language')->insert([
            'id_country' => 74,
            'id_language' => 3,
            'name' => 'Guatemala'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GT',
            'phone_code' => 502
        ]);
/* ************************************************************************************************************ */
        //Guyana 1
        DB::table('country_language')->insert([
            'id_country' => 75,
            'id_language' => 1,
            'name' => 'Guiana'
        ]);

        //Guyana 2
        DB::table('country_language')->insert([
            'id_country' => 75,
            'id_language' => 2,
            'name' => 'Guyana'
        ]);

        //Guyana 3
        DB::table('country_language')->insert([
            'id_country' => 75,
            'id_language' => 3,
            'name' => 'Guyana'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GY',
            'phone_code' => 592
        ]);
/* ************************************************************************************************************ */
        //French Guiana 1
        DB::table('country_language')->insert([
            'id_country' => 76,
            'id_language' => 1,
            'name' => 'Guiana Francesa'
        ]);

        //French Guiana 2
        DB::table('country_language')->insert([
            'id_country' => 76,
            'id_language' => 2,
            'name' => 'French Guiana'
        ]);

        //French Guiana 3
        DB::table('country_language')->insert([
            'id_country' => 76,
            'id_language' => 3,
            'name' => 'Guiana Francesa'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GF',
            'phone_code' => 594
        ]);
/* ************************************************************************************************************ */
        //Guinea 1
        DB::table('country_language')->insert([
            'id_country' => 77,
            'id_language' => 1,
            'name' => 'Guiné'
        ]);

        //Guinea 2
        DB::table('country_language')->insert([
            'id_country' => 77,
            'id_language' => 2,
            'name' => 'Guinea'
        ]);

        //Guinea 3
        DB::table('country_language')->insert([
            'id_country' => 77,
            'id_language' => 3,
            'name' => 'Guinea'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GN',
            'phone_code' => 245
        ]);
/* ************************************************************************************************************ */
        //Equatorial Guinea 1
        DB::table('country_language')->insert([
            'id_country' => 78,
            'id_language' => 1,
            'name' => 'Guiné Equatorial'
        ]);

        //Equatorial Guinea 2
        DB::table('country_language')->insert([
            'id_country' => 78,
            'id_language' => 2,
            'name' => 'Equatorial Guinea'
        ]);

        //Equatorial Guinea 3
        DB::table('country_language')->insert([
            'id_country' => 78,
            'id_language' => 3,
            'name' => 'Guinea Ecuatorial'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GQ',
            'phone_code' => 240
        ]);
/* ************************************************************************************************************ */
        //Guinea-Bissau 1
        DB::table('country_language')->insert([
            'id_country' => 79,
            'id_language' => 1,
            'name' => 'Guiné-Bissau'
        ]);

        //Guinea-Bissau 2
        DB::table('country_language')->insert([
            'id_country' => 79,
            'id_language' => 2,
            'name' => 'Guinea-Bissau'
        ]);

        //Guinea-Bissau 3
        DB::table('country_language')->insert([
            'id_country' => 79,
            'id_language' => 3,
            'name' => 'Guinea-Bissau'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'GW',
            'phone_code' => 245
        ]);
/* ************************************************************************************************************ */
        //Haiti 1
        DB::table('country_language')->insert([
            'id_country' => 80,
            'id_language' => 1,
            'name' => 'Haiti'
        ]);

        //Haiti 2
        DB::table('country_language')->insert([
            'id_country' => 80,
            'id_language' => 2,
            'name' => 'Haiti'
        ]);

        //Haiti 3
        DB::table('country_language')->insert([
            'id_country' => 80,
            'id_language' => 3,
            'name' => 'Haití'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'HT',
            'phone_code' => 509
        ]);
/* ************************************************************************************************************ */
        //Honduras 1
        DB::table('country_language')->insert([
            'id_country' => 81,
            'id_language' => 1,
            'name' => 'Honduras'
        ]);

        //Honduras 2
        DB::table('country_language')->insert([
            'id_country' => 81,
            'id_language' => 2,
            'name' => 'Honduras'
        ]);

        //Honduras 3
        DB::table('country_language')->insert([
            'id_country' => 81,
            'id_language' => 3,
            'name' => 'Honduras'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'HN',
            'phone_code' => 504
        ]);
/* ************************************************************************************************************ */
        //Hungary 1
        DB::table('country_language')->insert([
            'id_country' => 82,
            'id_language' => 1,
            'name' => 'Hungria'
        ]);

        //Hungary 2
        DB::table('country_language')->insert([
            'id_country' => 82,
            'id_language' => 2,
            'name' => 'Hungary'
        ]);

        //Hungary 3
        DB::table('country_language')->insert([
            'id_country' => 82,
            'id_language' => 3,
            'name' => 'Hungría'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'HU',
            'phone_code' => 36
        ]);
/* ************************************************************************************************************ */
        //Yemen
        DB::table('country_language')->insert([
            'id_country' => 83,
            'id_language' => 1,
            'name' => 'Iêmen'
        ]);

        //Yemen 2
        DB::table('country_language')->insert([
            'id_country' => 83,
            'id_language' => 2,
            'name' => 'Yemen'
        ]);

        //Yemen 3
        DB::table('country_language')->insert([
            'id_country' => 83,
            'id_language' => 3,
            'name' => 'Yemen'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'YE',
            'phone_code' => 967
        ]);
/* ************************************************************************************************************ */
        //Marshal Islands 1
        DB::table('country_language')->insert([
            'id_country' => 84,
            'id_language' => 1,
            'name' => 'Ilhas Marshall'
        ]);

        //Marshal Islands 2
        DB::table('country_language')->insert([
            'id_country' => 84,
            'id_language' => 2,
            'name' => 'Marshal Islands'
        ]);

        //Marshal Islands 3
        DB::table('country_language')->insert([
            'id_country' => 84,
            'id_language' => 3,
            'name' => 'Islas Marechales'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MH',
            'phone_code' => 692
        ]);
/* ************************************************************************************************************ */
        //Ilhas Malvinas 1
        DB::table('country_language')->insert([
            'id_country' => 85,
            'id_language' => 1,
            'name' => 'Ilhas Malvinas'
        ]);

        //Ilhas Malvinas 2
        DB::table('country_language')->insert([
            'id_country' => 85,
            'id_language' => 2,
            'name' => 'Falkland Islands'
        ]);

        //Ilhas Malvinas 3
        DB::table('country_language')->insert([
            'id_country' => 85,
            'id_language' => 3,
            'name' => 'Islas Malvinas'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'FK',
            'phone_code' => 500
        ]);
/* ************************************************************************************************************ */
        //India 1
        DB::table('country_language')->insert([
            'id_country' => 86,
            'id_language' => 1,
            'name' => 'Índia'
        ]);

        //India 2
        DB::table('country_language')->insert([
            'id_country' => 86,
            'id_language' => 2,
            'name' => 'India'
        ]);

        //India 3
        DB::table('country_language')->insert([
            'id_country' => 86,
            'id_language' => 3,
            'name' => 'India'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'IN',
            'phone_code' => 91
        ]);
/* ************************************************************************************************************ */
        //England 1
        DB::table('country_language')->insert([
            'id_country' => 87,
            'id_language' => 1,
            'name' => 'Inglaterra'
        ]);

        //England 2
        DB::table('country_language')->insert([
            'id_country' => 87,
            'id_language' => 2,
            'name' => 'England'
        ]);

        //England 3
        DB::table('country_language')->insert([
            'id_country' => 87,
            'id_language' => 3,
            'name' => 'Inglaterra'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'EN',
            'phone_code' => 44
        ]);
/* ************************************************************************************************************ */
        //Indonesia 1
        DB::table('country_language')->insert([
            'id_country' => 88,
            'id_language' => 1,
            'name' => 'Indonésia'
        ]);

        //Indonesia 2
        DB::table('country_language')->insert([
            'id_country' => 88,
            'id_language' => 2,
            'name' => 'Indonesia'
        ]);

        //Indonesia 3
        DB::table('country_language')->insert([
            'id_country' => 88,
            'id_language' => 3,
            'name' => 'Indonesia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ID',
            'phone_code' => 62
        ]);
/* ************************************************************************************************************ */
        //Iran 1
        DB::table('country_language')->insert([
            'id_country' => 89,
            'id_language' => 1,
            'name' => 'Irã'
        ]);

        //Iran 2
        DB::table('country_language')->insert([
            'id_country' => 89,
            'id_language' => 2,
            'name' => 'Iran'
        ]);

        //Iran 3
        DB::table('country_language')->insert([
            'id_country' => 89,
            'id_language' => 3,
            'name' => 'Iran'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'IR',
            'phone_code' => 98
        ]);
/* ************************************************************************************************************ */
        //Iraq 1
        DB::table('country_language')->insert([
            'id_country' => 90,
            'id_language' => 1,
            'name' => 'Iraque',
        ]);

        //Iraq 2
        DB::table('country_language')->insert([
            'id_country' => 90,
            'id_language' => 2,
            'name' => 'Iraq'
        ]);

        //Iraq 3
        DB::table('country_language')->insert([
            'id_country' => 90,
            'id_language' => 3,
            'name' => 'Iraq'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'IQ',
            'phone_code' => 964
        ]);
/* ************************************************************************************************************ */
        //Ireland 1
        DB::table('country_language')->insert([
            'id_country' => 91,
            'id_language' => 1,
            'name' => 'Irlanda'
        ]);

        //Ireland 2
        DB::table('country_language')->insert([
            'id_country' => 91,
            'id_language' => 2,
            'name' => 'Ireland'
        ]);

        //Ireland 3
        DB::table('country_language')->insert([
            'id_country' => 91,
            'id_language' => 3,
            'name' => 'Irlanda'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'IE',
            'phone_code' => 353
        ]);
/* ************************************************************************************************************ */
        //Iceland 1
        DB::table('country_language')->insert([
            'id_country' => 92,
            'id_language' => 1,
            'name' => 'Islândia'
        ]);

        //Iceland 2
        DB::table('country_language')->insert([
            'id_country' => 92,
            'id_language' => 2,
            'name' => 'Iceland'
        ]);

        //Iceland 3
        DB::table('country_language')->insert([
            'id_country' => 92,
            'id_language' => 3,
            'name' => 'Islandia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'IS',
            'phone_code' => 354
        ]);
/* ************************************************************************************************************ */
        //Israel 1
        DB::table('country_language')->insert([
            'id_country' => 93,
            'id_language' => 1,
            'name' => 'Israel'
        ]);

        //Israel 2
        DB::table('country_language')->insert([
            'id_country' => 93,
            'id_language' => 2,
            'name' => 'Israel'
        ]);

        //Israel 3
        DB::table('country_language')->insert([
            'id_country' => 93,
            'id_language' => 3,
            'name' => 'Israel'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'IL',
            'phone_code' => 972
        ]);
/* ************************************************************************************************************ */
        //Italy 1
        DB::table('country_language')->insert([
            'id_country' => 94,
            'id_language' => 1,
            'name' => 'Itália'
        ]);

        //Italy 2
        DB::table('country_language')->insert([
            'id_country' => 94,
            'id_language' => 2,
            'name' => 'Italy'
        ]);

        //Italy 3
        DB::table('country_language')->insert([
            'id_country' => 94,
            'id_language' => 3,
            'name' => 'Italia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'IT',
            'phone_code' => 39
        ]);
/* ************************************************************************************************************ */
        //Jamaica 1
        DB::table('country_language')->insert([
            'id_country' => 95,
            'id_language' => 1,
            'name' => 'Jamaica'
        ]);

        //Jamaica 2
        DB::table('country_language')->insert([
            'id_country' => 95,
            'id_language' => 2,
            'name' => 'Jamaica'
        ]);

        //Jamaica 3
        DB::table('country_language')->insert([
            'id_country' => 95,
            'id_language' => 3,
            'name' => 'Jamaica'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'JM',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Jordan 1
        DB::table('country_language')->insert([
            'id_country' => 96,
            'id_language' => 1,
            'name' => 'Jordânia'
        ]);

        //Jordan 2
        DB::table('country_language')->insert([
            'id_country' => 96,
            'id_language' => 2,
            'name' => 'Jordan'
        ]);

        //Jordan 3
        DB::table('country_language')->insert([
            'id_country' => 96,
            'id_language' => 3,
            'name' => 'Jordania'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'JO',
            'phone_code' => 962
        ]);
/* ************************************************************************************************************ */
        //Laos 1
        DB::table('country_language')->insert([
            'id_country' => 97,
            'id_language' => 1,
            'name' => 'Laos'
        ]);

        //Laos 2
        DB::table('country_language')->insert([
            'id_country' => 97,
            'id_language' => 2,
            'name' => 'Laos'
        ]);

        //Laos 3
        DB::table('country_language')->insert([
            'id_country' => 97,
            'id_language' => 3,
            'name' => 'Laos'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LA',
            'phone_code' => 856
        ]);
/* ************************************************************************************************************ */
        //Lesotho 1
        DB::table('country_language')->insert([
            'id_country' => 98,
            'id_language' => 1,
            'name' => 'Lesoto'
        ]);

        //Lesotho 2
        DB::table('country_language')->insert([
            'id_country' => 98,
            'id_language' => 2,
            'name' => 'Lesotho'
        ]);

        //Lesotho 3
        DB::table('country_language')->insert([
            'id_country' => 98,
            'id_language' => 3,
            'name' => 'Lesoto'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LS',
            'phone_code' => 266
        ]);
/* ************************************************************************************************************ */
        //Kuwait 1
        DB::table('country_language')->insert([
            'id_country' => 99,
            'id_language' => 1,
            'name' => 'Kuwait'
        ]);

        //Kuwait 2
        DB::table('country_language')->insert([
            'id_country' => 99,
            'id_language' => 2,
            'name' => 'Kuwait'
        ]);

        //Kuwait 3
        DB::table('country_language')->insert([
            'id_country' => 99,
            'id_language' => 3,
            'name' => 'Kuwait'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KW',
            'phone_code' => 965
        ]);
/* ************************************************************************************************************ */
        //Latvia 1
        DB::table('country_language')->insert([
            'id_country' => 100,
            'id_language' => 1,
            'name' => 'Letônia'
        ]);

        //Latvia 2
        DB::table('country_language')->insert([
            'id_country' => 100,
            'id_language' => 2,
            'name' => 'Latvia'
        ]);

        //Latvia 3
        DB::table('country_language')->insert([
            'id_country' => 100,
            'id_language' => 3,
            'name' => 'Letonia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LV',
            'phone_code' => 371
        ]);
/* ************************************************************************************************************ */
        //Lebanon 1
        DB::table('country_language')->insert([
            'id_country' => 101,
            'id_language' => 1,
            'name' => 'Líbano'
        ]);

        //Lebanon 2
        DB::table('country_language')->insert([
            'id_country' => 101,
            'id_language' => 2,
            'name' => 'Lebanon'
        ]);

        //Lebanon 3
        DB::table('country_language')->insert([
            'id_country' => 101,
            'id_language' => 3,
            'name' => 'Líbano'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LB',
            'phone_code' => 961
        ]);
/* ************************************************************************************************************ */
        //Liberia
        DB::table('country_language')->insert([
            'id_country' => 102,
            'id_language' => 1,
            'name' => 'Libéria'
        ]);

        //Liberia 2
        DB::table('country_language')->insert([
            'id_country' => 102,
            'id_language' => 2,
            'name' => 'Liberia'
        ]);

        //Liberia 3
        DB::table('country_language')->insert([
            'id_country' => 102,
            'id_language' => 3,
            'name' => 'Liberia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LR',
            'phone_code' => 231
        ]);
/* ************************************************************************************************************ */
        //Libya 1
        DB::table('country_language')->insert([
            'id_country' => 103,
            'id_language' => 1,
            'name' => 'Líbia',
        ]);

        //Libya 2
        DB::table('country_language')->insert([
            'id_country' => 103,
            'id_language' => 2,
            'name' => 'Libya'
        ]);

        //Libya 3
        DB::table('country_language')->insert([
            'id_country' => 103,
            'id_language' => 3,
            'name' => 'Libia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LY',
            'phone_code' => 218
        ]);
/* ************************************************************************************************************ */
        //Liechtenstein 1
        DB::table('country_language')->insert([
            'id_country' => 104,
            'id_language' => 1,
            'name' => 'Liechtenstein'
        ]);

        //Liechtenstein 2
        DB::table('country_language')->insert([
            'id_country' => 104,
            'id_language' => 2,
            'name' => 'Liechtenstein'
        ]);

        //Liechtenstein 3
        DB::table('country_language')->insert([
            'id_country' => 104,
            'id_language' => 3,
            'name' => 'Liechtenstein'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LI',
            'phone_code' => 423
        ]);
/* ************************************************************************************************************ */
        //Lithuania 1
        DB::table('country_language')->insert([
            'id_country' => 105,
            'id_language' => 1,
            'name' => 'Lituânia'
        ]);

        //Lithuania 2
        DB::table('country_language')->insert([
            'id_country' => 105,
            'id_language' => 2,
            'name' => 'Lithuania'
        ]);

        //Lithuania 3
        DB::table('country_language')->insert([
            'id_country' => 105,
            'id_language' => 3,
            'name' => 'Lituania'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LT',
            'phone_code' => 370
        ]);
/* ************************************************************************************************************ */
        //Luxembourg 1
        DB::table('country_language')->insert([
            'id_country' => 106,
            'id_language' => 1,
            'name' => 'Luxemburgo'
        ]);

        //Luxembourg 2
        DB::table('country_language')->insert([
            'id_country' => 106,
            'id_language' => 2,
            'name' => 'Luxembourg'
        ]);

        //Luxembourg 3
        DB::table('country_language')->insert([
            'id_country' => 106,
            'id_language' => 3,
            'name' => 'Luxemburgo'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'LU',
            'phone_code' => 352
        ]);
/* ************************************************************************************************************ */
        //Macedonia 1
        DB::table('country_language')->insert([
            'id_country' => 107,
            'id_language' => 1,
            'name' => 'Macedónia'
        ]);

        //Macedonia 2
        DB::table('country_language')->insert([
            'id_country' => 107,
            'id_language' => 2,
            'name' => 'Macedonia'
        ]);

        //Macedonia 3
        DB::table('country_language')->insert([
            'id_country' => 107,
            'id_language' => 3,
            'name' => 'Macedonia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MK',
            'phone_code' => 389
        ]);
/* ************************************************************************************************************ */
        //Madagascar 1
        DB::table('country_language')->insert([
            'id_country' => 108,
            'id_language' => 1,
            'name' => 'Madagáscar'
        ]);

        //Madagascar 2
        DB::table('country_language')->insert([
            'id_country' => 108,
            'id_language' => 2,
            'name' => 'Madagascar'
        ]);

        //Madagascar 3
        DB::table('country_language')->insert([
            'id_country' => 108,
            'id_language' => 3,
            'name' => 'Madagascar'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MG',
            'phone_code' => 261
        ]);
/* ************************************************************************************************************ */
        //Malaysia 1
        DB::table('country_language')->insert([
            'id_country' => 109,
            'id_language' => 1,
            'name' => 'Malásia'
        ]);

        //Malaysia 2
        DB::table('country_language')->insert([
            'id_country' => 109,
            'id_language' => 2,
            'name' => 'Malaysia'
        ]);

        //Malaysia 3
        DB::table('country_language')->insert([
            'id_country' => 109,
            'id_language' => 3,
            'name' => 'Malasia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MY',
            'phone_code' => 60
        ]);
/* ************************************************************************************************************ */
        //Malawi 1
        DB::table('country_language')->insert([
            'id_country' => 110,
            'id_language' => 1,
            'name' => 'Malawi',
        ]);

        //Malawi 2
        DB::table('country_language')->insert([
            'id_country' => 110,
            'id_language' => 2,
            'name' => 'Malawi'
        ]);

        //Malawi 3
        DB::table('country_language')->insert([
            'id_country' => 110,
            'id_language' => 3,
            'name' => 'Malawi'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MW',
            'phone_code' => 265
        ]);
/* ************************************************************************************************************ */
        //Maldives 1
        DB::table('country_language')->insert([
            'id_country' => 111,
            'id_language' => 1,
            'name' => 'Maldivas'
        ]);

        //Maldives 2
        DB::table('country_language')->insert([
            'id_country' => 111,
            'id_language' => 2,
            'name' => 'Maldives'
        ]);

        //Maldives 3
        DB::table('country_language')->insert([
            'id_country' => 111,
            'id_language' => 3,
            'name' => 'Maldivas'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MV',
            'phone_code' => 960
        ]);
/* ************************************************************************************************************ */
        //Malaysia 1
        DB::table('country_language')->insert([
            'id_country' => 112,
            'id_language' => 1,
            'name' => 'Malásia'
        ]);

        //Malaysia 2
        DB::table('country_language')->insert([
            'id_country' => 112,
            'id_language' => 2,
            'name' => 'Malaysia'
        ]);

        //Malaysia 3
        DB::table('country_language')->insert([
            'id_country' => 112,
            'id_language' => 3,
            'name' => 'Malasia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MY',
            'phone_code' => 60
        ]);
/* ************************************************************************************************************ */
        //Mali 1
        DB::table('country_language')->insert([
            'id_country' => 113,
            'id_language' => 1,
            'name' => 'Mali'
        ]);

        //Mali 2
        DB::table('country_language')->insert([
            'id_country' => 113,
            'id_language' => 2,
            'name' => 'Mali'
        ]);

        //Mali 3
        DB::table('country_language')->insert([
            'id_country' => 113,
            'id_language' => 3,
            'name' => 'Mali'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ML',
            'phone_code' => 223
        ]);
/* ************************************************************************************************************ */
        //Malta 1
        DB::table('country_language')->insert([
            'id_country' => 114,
            'id_language' => 1,
            'name' => 'Malta'
        ]);

        //Malta 2
        DB::table('country_language')->insert([
            'id_country' => 114,
            'id_language' => 2,
            'name' => 'Malta'
        ]);

        //Malta 3
        DB::table('country_language')->insert([
            'id_country' => 114,
            'id_language' => 3,
            'name' => 'Malta'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MT',
            'phone_code' => 356
        ]);
/* ************************************************************************************************************ */
        //Morocco 1
        DB::table('country_language')->insert([
            'id_country' => 115,
            'id_language' => 1,
            'name' => 'Marrocos'
        ]);

        //Morocco 2
        DB::table('country_language')->insert([
            'id_country' => 115,
            'id_language' => 2,
            'name' => 'Morocco'
        ]);

        //Morocco 3
        DB::table('country_language')->insert([
            'id_country' => 115,
            'id_language' => 3,
            'name' => 'Marruecos'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MA',
            'phone_code' => 212
        ]);
/* ************************************************************************************************************ */
        //Mauritius Islands 1
        DB::table('country_language')->insert([
            'id_country' => 116,
            'id_language' => 1,
            'name' => 'Ilhas Maurício'
        ]);

        //Mauritius Islands 2
        DB::table('country_language')->insert([
            'id_country' => 116,
            'id_language' => 2,
            'name' => 'Mauritius Islands'
        ]);

        //Mauritius Islands 3
        DB::table('country_language')->insert([
            'id_country' => 116,
            'id_language' => 3,
            'name' => 'Mauricio'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MU',
            'phone_code' => 230
        ]);
/* ************************************************************************************************************ */
        //Mauritania 1
        DB::table('country_language')->insert([
            'id_country' => 117,
            'id_language' => 1,
            'name' => 'Mauritânia'
        ]);

        //Mauritania 2
        DB::table('country_language')->insert([
            'id_country' => 117,
            'id_language' => 2,
            'name' => 'Mauritania'
        ]);

        //Mauritania 3
        DB::table('country_language')->insert([
            'id_country' => 117,
            'id_language' => 3,
            'name' => 'Mauritania'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MR',
            'phone_code' => 222
        ]);
/* ************************************************************************************************************ */
        //Mexico 1
        DB::table('country_language')->insert([
            'id_country' => 118,
            'id_language' => 1,
            'name' => 'México'
        ]);

        //Mexico 2
        DB::table('country_language')->insert([
            'id_country' => 118,
            'id_language' => 2,
            'name' => 'Mexico'
        ]);

        //Mexico 3
        DB::table('country_language')->insert([
            'id_country' => 118,
            'id_language' => 3,
            'name' => 'Mexico'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MX',
            'phone_code' => 52
        ]);
/* ************************************************************************************************************ */
        //Myanmar
        DB::table('country_language')->insert([
            'id_country' => 119,
            'id_language' => 1,
            'name' => 'Myanmar'
        ]);

        //Myanmar 2
        DB::table('country_language')->insert([
            'id_country' => 119,
            'id_language' => 2,
            'name' => 'Myanmar'
        ]);

        //Myanmar 3
        DB::table('country_language')->insert([
            'id_country' => 119,
            'id_language' => 3,
            'name' => 'Myanmar'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MM',
            'phone_code' => 95
        ]);
/* ************************************************************************************************************ */
        //Federated States of Micronesia 1
        DB::table('country_language')->insert([
            'id_country' => 120,
            'id_language' => 1,
            'name' => 'Estados Federados da Micronésia'
        ]);

        //Federated States of Micronesia 2
        DB::table('country_language')->insert([
            'id_country' => 120,
            'id_language' => 2,
            'name' => 'Federated States of Micronesia'
        ]);

        //Federated States of Micronesia 3
        DB::table('country_language')->insert([
            'id_country' => 120,
            'id_language' => 3,
            'name' => 'Estados Federados de Micronesia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'FM',
            'phone_code' => 691
        ]);
/* ************************************************************************************************************ */
        //Mozambique 1
        DB::table('country_language')->insert([
            'id_country' => 121,
            'id_language' => 1,
            'name' => 'Moçambique'
        ]);

        //Mozambique 2
        DB::table('country_language')->insert([
            'id_country' => 121,
            'id_language' => 2,
            'name' => 'Mozambique'
        ]);

        //Mozambique 3
        DB::table('country_language')->insert([
            'id_country' => 121,
            'id_language' => 3,
            'name' => 'Mozambique'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MZ',
            'phone_code' => 258
        ]);
/* ************************************************************************************************************ */
        //Moldova
        DB::table('country_language')->insert([
            'id_country' => 122,
            'id_language' => 1,
            'name' => 'Moldávia'
        ]);

        //Moldova 2
        DB::table('country_language')->insert([
            'id_country' => 122,
            'id_language' => 2,
            'name' => 'Moldova'
        ]);

        //Moldova 3
        DB::table('country_language')->insert([
            'id_country' => 122,
            'id_language' => 3,
            'name' => 'Moldavia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MD',
            'phone_code' => 373
        ]);
/* ************************************************************************************************************ */
        //Monaco 1
        DB::table('country_language')->insert([
            'id_country' => 123,
            'id_language' => 1,
            'name' => 'Mônaco'
        ]);

        //Monaco 2
        DB::table('country_language')->insert([
            'id_country' => 123,
            'id_language' => 2,
            'name' => 'Monaco'
        ]);

        //Monaco 3
        DB::table('country_language')->insert([
            'id_country' => 123,
            'id_language' => 3,
            'name' => 'Mónaco'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MC',
            'phone_code' => 377
        ]);
/* ************************************************************************************************************ */
        //Mongolia 1
        DB::table('country_language')->insert([
            'id_country' => 124,
            'id_language' => 1,
            'name' => 'Mongólia'
        ]);

        //Mongolia 2
        DB::table('country_language')->insert([
            'id_country' => 124,
            'id_language' => 2,
            'name' => 'Mongolia'
        ]);

        //Mongolia 3
        DB::table('country_language')->insert([
            'id_country' => 124,
            'id_language' => 3,
            'name' => 'Mongolia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MN',
            'phone_code' => 976
        ]);
/* ************************************************************************************************************ */
        //Montenegro 1
        DB::table('country_language')->insert([
            'id_country' => 125,
            'id_language' => 1,
            'name' => 'Montenegro'
        ]);

        //Montenegro 2
        DB::table('country_language')->insert([
            'id_country' => 125,
            'id_language' => 2,
            'name' => 'Montenegro'
        ]);

        //Montenegro 3
        DB::table('country_language')->insert([
            'id_country' => 125,
            'id_language' => 3,
            'name' => 'Montenegro'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ME',
            'phone_code' => 382
        ]);
/* ************************************************************************************************************ */
        //Namibia 1
        DB::table('country_language')->insert([
            'id_country' => 126,
            'id_language' => 1,
            'name' => 'Namíbia'
        ]);

        //Namibia 2
        DB::table('country_language')->insert([
            'id_country' => 126,
            'id_language' => 2,
            'name' => 'Namibia'
        ]);

        //Namibia 3
        DB::table('country_language')->insert([
            'id_country' => 126,
            'id_language' => 3,
            'name' => 'Namibia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NA',
            'phone_code' => 264
        ]);
/* ************************************************************************************************************ */
        //Nauru 1
        DB::table('country_language')->insert([
            'id_country' => 127,
            'id_language' => 1,
            'name' => 'Nauru'
        ]);

        //Nauru 2
        DB::table('country_language')->insert([
            'id_country' => 127,
            'id_language' => 2,
            'name' => 'Nauru'
        ]);

        //Nauru 3
        DB::table('country_language')->insert([
            'id_country' => 127,
            'id_language' => 3,
            'name' => 'Nauru'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NR',
            'phone_code' => 674
        ]);
/* ************************************************************************************************************ */
        //Nepal 1
        DB::table('country_language')->insert([
            'id_country' => 128,
            'id_language' => 1,
            'name' => 'Nepal'
        ]);

        //Nepal 2
        DB::table('country_language')->insert([
            'id_country' => 128,
            'id_language' => 2,
            'name' => 'Nepal'
        ]);

        //Nepal 3
        DB::table('country_language')->insert([
            'id_country' => 128,
            'id_language' => 3,
            'name' => 'Nepal'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NP',
            'phone_code' => 977
        ]);
/* ************************************************************************************************************ */
        //Nicaragua 1
        DB::table('country_language')->insert([
            'id_country' => 129,
            'id_language' => 1,
            'name' => 'Nicarágua'
        ]);

        //Nicaragua 2
        DB::table('country_language')->insert([
            'id_country' => 129,
            'id_language' => 2,
            'name' => 'Nicaragua'
        ]);

        //Nicaragua 3
        DB::table('country_language')->insert([
            'id_country' => 129,
            'id_language' => 3,
            'name' => 'Nicaragua'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NI',
            'phone_code' => 505
        ]);
/* ************************************************************************************************************ */
        //Niger 1
        DB::table('country_language')->insert([
            'id_country' => 130,
            'id_language' => 1,
            'name' => 'Níger'
        ]);

        //Niger 2
        DB::table('country_language')->insert([
            'id_country' => 130,
            'id_language' => 2,
            'name' => 'Niger'
        ]);

        //Niger 3
        DB::table('country_language')->insert([
            'id_country' => 130,
            'id_language' => 3,
            'name' => 'Níger'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NE',
            'phone_code' => 227
        ]);
/* ************************************************************************************************************ */
        //Nigeria 1
        DB::table('country_language')->insert([
            'id_country' => 131,
            'id_language' => 1,
            'name' => 'Nigéria'
        ]);

        //Nigeria 2
        DB::table('country_language')->insert([
            'id_country' => 131,
            'id_language' => 2,
            'name' => 'Nigeria'
        ]);

        //Nigeria 3
        DB::table('country_language')->insert([
            'id_country' => 131,
            'id_language' => 3,
            'name' => 'Nigeria'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NG',
            'phone_code' => 234
        ]);
/* ************************************************************************************************************ */
        //Norway 1
        DB::table('country_language')->insert([
            'id_country' => 132,
            'id_language' => 1,
            'name' => 'Noruega'
        ]);

        //Norway 2
        DB::table('country_language')->insert([
            'id_country' => 132,
            'id_language' => 2,
            'name' => 'Norway'
        ]);

        //Norway 3
        DB::table('country_language')->insert([
            'id_country' => 132,
            'id_language' => 3,
            'name' => 'Noruega'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NO',
            'phone_code' => 47
        ]);
/* ************************************************************************************************************ */
        //New Zealand 1
        DB::table('country_language')->insert([
            'id_country' => 133,
            'id_language' => 1,
            'name' => 'Nova Zelândia'
        ]);

        //New Zealand 2
        DB::table('country_language')->insert([
            'id_country' => 133,
            'id_language' => 2,
            'name' => 'New Zealand'
        ]);

        //New Zealand 3
        DB::table('country_language')->insert([
            'id_country' => 133,
            'id_language' => 3,
            'name' => 'Nueva Zelanda'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NZ',
            'phone_code' => 64
        ]);
/* ************************************************************************************************************ */
        //Oman 1
        DB::table('country_language')->insert([
            'id_country' => 134,
            'id_language' => 1,
            'name' => 'Omã'
        ]);

        //Oman 2
        DB::table('country_language')->insert([
            'id_country' => 134,
            'id_language' => 2,
            'name' => 'Oman'
        ]);

        //Oman 3
        DB::table('country_language')->insert([
            'id_country' => 134,
            'id_language' => 3,
            'name' => 'Oman'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'OM',
            'phone_code' => 968
        ]);
/* ************************************************************************************************************ */
        //Malaysia 1
        DB::table('country_language')->insert([
            'id_country' => 135,
            'id_language' => 1,
            'name' => 'Malásia'
        ]);

        //Malaysia 2
        DB::table('country_language')->insert([
            'id_country' => 135,
            'id_language' => 2,
            'name' => 'Malaysia'
        ]);

        //Malaysia 3
        DB::table('country_language')->insert([
            'id_country' => 135,
            'id_language' => 3,
            'name' => 'Malasia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'MY',
            'phone_code' => 60
        ]);
/* ************************************************************************************************************ */
        //Netherlands 1
        DB::table('country_language')->insert([
            'id_country' => 136,
            'id_language' => 1,
            'name' => 'Países Baixos'
        ]);

        //Netherlands 2
        DB::table('country_language')->insert([
            'id_country' => 136,
            'id_language' => 2,
            'name' => 'Netherlands'
        ]);

        //Netherlands 3
        DB::table('country_language')->insert([
            'id_country' => 136,
            'id_language' => 3,
            'name' => 'Países Bajos'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'NL',
            'phone_code' => 31
        ]);
/* ************************************************************************************************************ */
        //Palau 1
        DB::table('country_language')->insert([
            'id_country' => 137,
            'id_language' => 1,
            'name' => 'Palau'
        ]);

        //Palau 2
        DB::table('country_language')->insert([
            'id_country' => 137,
            'id_language' => 2,
            'name' => 'Palau'
        ]);

        //Palau 3
        DB::table('country_language')->insert([
            'id_country' => 137,
            'id_language' => 3,
            'name' => 'Palau'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PW',
            'phone_code' => 680
        ]);
/* ************************************************************************************************************ */
        //Panama 1
        DB::table('country_language')->insert([
            'id_country' => 138,
            'id_language' => 1,
            'name' => 'Panamá'
        ]);

        //Panama 2
        DB::table('country_language')->insert([
            'id_country' => 138,
            'id_language' => 2,
            'name' => 'Panama'
        ]);

        //Panama 3
        DB::table('country_language')->insert([
            'id_country' => 138,
            'id_language' => 3,
            'name' => 'Panama'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PA',
            'phone_code' => 507
        ]);
/* ************************************************************************************************************ */
        //Papua New Guinea 1
        DB::table('country_language')->insert([
            'id_country' => 139,
            'id_language' => 1,
            'name' => 'Papua Nova Guiné'
        ]);

        //Papua New Guinea 2
        DB::table('country_language')->insert([
            'id_country' => 139,
            'id_language' => 2,
            'name' => 'Papua New Guinea'
        ]);

        //Papua New Guinea 3
        DB::table('country_language')->insert([
            'id_country' => 139,
            'id_language' => 3,
            'name' => 'Papúa Nueva Guinea'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PG',
            'phone_code' => 675
        ]);
/* ************************************************************************************************************ */
        //Pakistan 1
        DB::table('country_language')->insert([
            'id_country' => 140,
            'id_language' => 1,
            'name' => 'Paquistão'
        ]);

        //Pakistan 2
        DB::table('country_language')->insert([
            'id_country' => 140,
            'id_language' => 2,
            'name' => 'Pakistan'
        ]);

        //Pakistan 3
        DB::table('country_language')->insert([
            'id_country' => 140,
            'id_language' => 3,
            'name' => 'Pakistán'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PK',
            'phone_code' => 92
        ]);
/* ************************************************************************************************************ */
        //Paraguay 1
        DB::table('country_language')->insert([
            'id_country' => 141,
            'id_language' => 1,
            'name' => 'Paraguai'
        ]);

        //Paraguay 2
        DB::table('country_language')->insert([
            'id_country' => 141,
            'id_language' => 2,
            'name' => 'Paraguay'
        ]);

        //Paraguay 3
        DB::table('country_language')->insert([
            'id_country' => 141,
            'id_language' => 3,
            'name' => 'Paraguay'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PY',
            'phone_code' => 595
        ]);
/* ************************************************************************************************************ */
        //Peru 1
        DB::table('country_language')->insert([
            'id_country' => 142,
            'id_language' => 1,
            'name' => 'Peru'
        ]);

        //Peru 2
        DB::table('country_language')->insert([
            'id_country' => 142,
            'id_language' => 2,
            'name' => 'Peru'
        ]);

        //Peru 3
        DB::table('country_language')->insert([
            'id_country' => 142,
            'id_language' => 3,
            'name' => 'Peru'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PE',
            'phone_code' => 51
        ]);
/* ************************************************************************************************************ */
        //Poland 1
        DB::table('country_language')->insert([
            'id_country' => 143,
            'id_language' => 1,
            'name' => 'Polônia'
        ]);

        //Poland 2
        DB::table('country_language')->insert([
            'id_country' => 143,
            'id_language' => 2,
            'name' => 'Poland'
        ]);

        //Poland 3
        DB::table('country_language')->insert([
            'id_country' => 143,
            'id_language' => 3,
            'name' => 'Polonia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PL',
            'phone_code' => 48
        ]);
/* ************************************************************************************************************ */
        //Portugal 1
        DB::table('country_language')->insert([
            'id_country' => 144,
            'id_language' => 1,
            'name' => 'Portugal'
        ]);

        //Portugal 2
        DB::table('country_language')->insert([
            'id_country' => 144,
            'id_language' => 2,
            'name' => 'Portugal'
        ]);

        //Portugal 3
        DB::table('country_language')->insert([
            'id_country' => 144,
            'id_language' => 3,
            'name' => 'Portugal'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'PT',
            'phone_code' => 351
        ]);
/* ************************************************************************************************************ */
        //Kenya 1
        DB::table('country_language')->insert([
            'id_country' => 145,
            'id_language' => 1,
            'name' => 'Quênia'
        ]);

        //Kenya 2
        DB::table('country_language')->insert([
            'id_country' => 145,
            'id_language' => 2,
            'name' => 'Kenya'
        ]);

        //Kenya 3
        DB::table('country_language')->insert([
            'id_country' => 145,
            'id_language' => 3,
            'name' => 'Kenia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KE',
            'phone_code' => 254
        ]);
/* ************************************************************************************************************ */
        //Kyrgyzstan 1
        DB::table('country_language')->insert([
            'id_country' => 146,
            'id_language' => 1,
            'name' => 'Quirguistão'
        ]);

        //Kyrgyzstan 2
        DB::table('country_language')->insert([
            'id_country' => 146,
            'id_language' => 2,
            'name' => 'Kyrgyzstan'
        ]);

        //Kyrgyzstan 3
        DB::table('country_language')->insert([
            'id_country' => 146,
            'id_language' => 3,
            'name' => 'Kirguistán'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KG',
            'phone_code' => 996
        ]);
/* ************************************************************************************************************ */
        //Kiribati 1
        DB::table('country_language')->insert([
            'id_country' => 147,
            'id_language' => 1,
            'name' => 'Quiribati'
        ]);

        //Kiribati 2
        DB::table('country_language')->insert([
            'id_country' => 147,
            'id_language' => 2,
            'name' => 'Kiribati'
        ]);

        //Kiribati 3
        DB::table('country_language')->insert([
            'id_country' => 147,
            'id_language' => 3,
            'name' => 'Kiribati'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'KI',
            'phone_code' => 686
        ]);
/* ************************************************************************************************************ */
        //United Kingdom 1
        DB::table('country_language')->insert([
            'id_country' => 148,
            'id_language' => 1,
            'name' => 'Reino Unido'
        ]);

        //United Kingdom 2
        DB::table('country_language')->insert([
            'id_country' => 148,
            'id_language' => 2,
            'name' => 'United Kingdom'
        ]);

        //United Kingdom 3
        DB::table('country_language')->insert([
            'id_country' => 148,
            'id_language' => 3,
            'name' => 'Reino Unido'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'UK',
            'phone_code' => 44
        ]);
/* ************************************************************************************************************ */
        //Central African Republic 1
        DB::table('country_language')->insert([
            'id_country' => 149,
            'id_language' => 1,
            'name' => 'República Centro-Africana'
        ]);

        //Central African Republic 2
        DB::table('country_language')->insert([
            'id_country' => 149,
            'id_language' => 2,
            'name' => 'Central African Republic'
        ]);

        //Central African Republic 3
        DB::table('country_language')->insert([
            'id_country' => 149,
            'id_language' => 3,
            'name' => 'República Centroafricana'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CF',
            'phone_code' => 236
        ]);
/* ************************************************************************************************************ */
        //Czech Republic 1
        DB::table('country_language')->insert([
            'id_country' => 150,
            'id_language' => 1,
            'name' => 'República Tcheca'
        ]);

        //Czech Republic 2
        DB::table('country_language')->insert([
            'id_country' => 150,
            'id_language' => 2,
            'name' => 'Czech Republic'
        ]);

        //Czech Republic 3
        DB::table('country_language')->insert([
            'id_country' => 150,
            'id_language' => 3,
            'name' => 'República Checa'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CZ',
            'phone_code' => 420
        ]);
/* ************************************************************************************************************ */
        //DRC (Democratic Republic of Congo) 1
        DB::table('country_language')->insert([
            'id_country' => 151,
            'id_language' => 1,
            'name' => 'RDC (República Democrática do Congo)'
        ]);

        //DRC (Democratic Republic of Congo) 2
        DB::table('country_language')->insert([
            'id_country' => 151,
            'id_language' => 2,
            'name' => 'DRC (Democratic Republic of Congo)'
        ]);

        //DRC (Democratic Republic of Congo) 3
        DB::table('country_language')->insert([
            'id_country' => 151,
            'id_language' => 3,
            'name' => 'DRC (República Democrática del Congo)'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'CD',
            'phone_code' => 243
        ]);
/* ************************************************************************************************************ */
        //Dominican Republic 1
        DB::table('country_language')->insert([
            'id_country' => 152,
            'id_language' => 1,
            'name' => 'República Dominicana'
        ]);

        //Dominican Republic 2
        DB::table('country_language')->insert([
            'id_country' => 152,
            'id_language' => 2,
            'name' => 'Dominican Republic'
        ]);

        //Dominican Republic 3
        DB::table('country_language')->insert([
            'id_country' => 152,
            'id_language' => 3,
            'name' => 'República Dominicana'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'DO',
            'phone_code' => 1
        ]);
/* ************************************************************************************************************ */
        //Romania 1
        DB::table('country_language')->insert([
            'id_country' => 153,
            'id_language' => 1,
            'name' => 'Romênia'
        ]);

        //Romania 2
        DB::table('country_language')->insert([
            'id_country' => 153,
            'id_language' => 2,
            'name' => 'Romania'
        ]);

        //Romania 3
        DB::table('country_language')->insert([
            'id_country' => 153,
            'id_language' => 3,
            'name' => 'Rumania'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'RO',
            'phone_code' => 40
        ]);
/* ************************************************************************************************************ */
        //Rwanda 1
        DB::table('country_language')->insert([
            'id_country' => 154,
            'id_language' => 1,
            'name' => 'Ruanda'
        ]);

        //Rwanda 2
        DB::table('country_language')->insert([
            'id_country' => 154,
            'id_language' => 2,
            'name' => 'Rwanda'
        ]);

        //Rwanda 3
        DB::table('country_language')->insert([
            'id_country' => 154,
            'id_language' => 3,
            'name' => 'Ruanda'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'RW',
            'phone_code' => 250
        ]);
/* ************************************************************************************************************ */
        //Russia 1
        DB::table('country_language')->insert([
            'id_country' => 155,
            'id_language' => 1,
            'name' => 'Rússia'
        ]);

        //Russia 2
        DB::table('country_language')->insert([
            'id_country' => 155,
            'id_language' => 2,
            'name' => 'Russia'
        ]);

        //Russia 3
        DB::table('country_language')->insert([
            'id_country' => 155,
            'id_language' => 3,
            'name' => 'Russia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'RU',
            'phone_code' => 7
        ]);
/* ************************************************************************************************************ */
        //Saint Thomas 1
        DB::table('country_language')->insert([
            'id_country' => 156,
            'id_language' => 1,
            'name' => 'São Tomé e Príncipe'
        ]);

        //Saint Thomas 2
        DB::table('country_language')->insert([
            'id_country' => 156,
            'id_language' => 2,
            'name' => 'Saint Thomas'
        ]);

        //Saint Thomas 3
        DB::table('country_language')->insert([
            'id_country' => 156,
            'id_language' => 3,
            'name' => 'Santo Tomás'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ST',
            'phone_code' => 239
        ]);
/* ************************************************************************************************************ */
        //Senegal 1
        DB::table('country_language')->insert([
            'id_country' => 157,
            'id_language' => 1,
            'name' => 'Senegal'
        ]);

        //Senegal 2
        DB::table('country_language')->insert([
            'id_country' => 157,
            'id_language' => 2,
            'name' => 'Senegal'
        ]);

        //Senegal 3
        DB::table('country_language')->insert([
            'id_country' => 157,
            'id_language' => 3,
            'name' => 'Senegal'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SN',
            'phone_code' => 221
        ]);
/* ************************************************************************************************************ */
        //Serbia 1
        DB::table('country_language')->insert([
            'id_country' => 158,
            'id_language' => 1,
            'name' => 'Sérvia'
        ]);

        //Serbia 2
        DB::table('country_language')->insert([
            'id_country' => 158,
            'id_language' => 2,
            'name' => 'Serbia',
        ]);

        //Serbia 3
        DB::table('country_language')->insert([
            'id_country' => 158,
            'id_language' => 3,
            'name' => 'Serbia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'RS',
            'phone_code' => 381
        ]);
/* ************************************************************************************************************ */
        //Seychelles 1
        DB::table('country_language')->insert([
            'id_country' => 159,
            'id_language' => 1,
            'name' => 'Seychelles'
        ]);

        //Seychelles 2
        DB::table('country_language')->insert([
            'id_country' => 159,
            'id_language' => 2,
            'name' => 'Seychelles'
        ]);

        //Seychelles 3
        DB::table('country_language')->insert([
            'id_country' => 159,
            'id_language' => 3,
            'name' => 'Seychelles'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SC',
            'phone_code' => 248
        ]);
/* ************************************************************************************************************ */
        //Syria 1
        DB::table('country_language')->insert([
            'id_country' => 160,
            'id_language' => 1,
            'name' => 'Síria'
        ]);

        //Syria 2
        DB::table('country_language')->insert([
            'id_country' => 160,
            'id_language' => 2,
            'name' => 'Syria'
        ]);

        //Syria 3
        DB::table('country_language')->insert([
            'id_country' => 160,
            'id_language' => 3,
            'name' => 'Siria'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SY',
            'phone_code' => 963
        ]);
/* ************************************************************************************************************ */
        //Somalia 1
        DB::table('country_language')->insert([
            'id_country' => 161,
            'id_language' => 1,
            'name' => 'Somália'
        ]);

        //Somalia 2
        DB::table('country_language')->insert([
            'id_country' => 161,
            'id_language' => 2,
            'name' => 'Somalia'
        ]);

        //Somalia 3
        DB::table('country_language')->insert([
            'id_country' => 161,
            'id_language' => 3,
            'name' => 'Somalia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SO',
            'phone_code' => 252
        ]);
/* ************************************************************************************************************ */
        //Sudan 1
        DB::table('country_language')->insert([
            'id_country' => 162,
            'id_language' => 1,
            'name' => 'Sudão'
        ]);

        //Sudan 2
        DB::table('country_language')->insert([
            'id_country' => 162,
            'id_language' => 2,
            'name' => 'Sudan'
        ]);

        //Sudan 3
        DB::table('country_language')->insert([
            'id_country' => 162,
            'id_language' => 3,
            'name' => 'Sudan'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SD',
            'phone_code' => 249
        ]);
/* ************************************************************************************************************ */
        //South Sudan 1
        DB::table('country_language')->insert([
            'id_country' => 163,
            'id_language' => 1,
            'name' => 'Sudão do Sul'
        ]);

        //South Sudan 2
        DB::table('country_language')->insert([
            'id_country' => 163,
            'id_language' => 2,
            'name' => 'South Sudan'
        ]);

        //South Sudan 3
        DB::table('country_language')->insert([
            'id_country' => 163,
            'id_language' => 3,
            'name' => 'Sudán del Sur'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SS',
            'phone_code' => 211
        ]);
/* ************************************************************************************************************ */
        //Rwanda 1
        DB::table('country_language')->insert([
            'id_country' => 164,
            'id_language' => 1,
            'name' => 'Ruanda'
        ]);

        //Rwanda 2
        DB::table('country_language')->insert([
            'id_country' => 164,
            'id_language' => 2,
            'name' => 'Rwanda'
        ]);

        //Rwanda 3
        DB::table('country_language')->insert([
            'id_country' => 164,
            'id_language' => 3,
            'name' => 'Ruanda'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'RW',
            'phone_code' => 250
        ]);
/* ************************************************************************************************************ */
        //Suriname 1
        DB::table('country_language')->insert([
            'id_country' => 165,
            'id_language' => 1,
            'name' => 'Suriname'
        ]);

        //Suriname 2
        DB::table('country_language')->insert([
            'id_country' => 165,
            'id_language' => 2,
            'name' => 'Suriname'
        ]);

        //Suriname 3
        DB::table('country_language')->insert([
            'id_country' => 165,
            'id_language' => 3,
            'name' => 'Surinam'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'SR',
            'phone_code' => 597
        ]);
/* ************************************************************************************************************ */
        //Tanzania 1
        DB::table('country_language')->insert([
            'id_country' => 166,
            'id_language' => 1,
            'name' => 'Tanzânia'
        ]);

        //Tanzania 2
        DB::table('country_language')->insert([
            'id_country' => 166,
            'id_language' => 2,
            'name' => 'Tanzania'
        ]);

        //Tanzania 3
        DB::table('country_language')->insert([
            'id_country' => 166,
            'id_language' => 3,
            'name' => 'Tanzania'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'TZ',
            'phone_code' => 255
        ]);
/* ************************************************************************************************************ */
        //Trinidad and Tobago 1
        DB::table('country_language')->insert([
            'id_country' => 167,
            'id_language' => 1,
            'name' => 'Trinidad e Tobago'
        ]);

        //Trinidad and Tobago 2
        DB::table('country_language')->insert([
            'id_country' => 167,
            'id_language' => 2,
            'name' => 'Trinidad and Tobago'
        ]);

        //Trinidad and Tobago 3
        DB::table('country_language')->insert([
            'id_country' => 167,
            'id_language' => 3,
            'name' => 'Trinidad y Tobago'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'TT',
            'phone_code' => 868
        ]);
/* ************************************************************************************************************ */
        //Turkey 1
        DB::table('country_language')->insert([
            'id_country' => 168,
            'id_language' => 1,
            'name' => 'Turquia'
        ]);

        //Turkey 2
        DB::table('country_language')->insert([
            'id_country' => 168,
            'id_language' => 2,
            'name' => 'Turkey'
        ]);

        //Turkey 3
        DB::table('country_language')->insert([
            'id_country' => 168,
            'id_language' => 3,
            'name' => 'Turkey'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'TR',
            'phone_code' => 90
        ]);
/* ************************************************************************************************************ */
        //Ukraine 1
        DB::table('country_language')->insert([
            'id_country' => 169,
            'id_language' => 1,
            'name' => 'Ucrânia'
        ]);

        //Ukraine 2
        DB::table('country_language')->insert([
            'id_country' => 169,
            'id_language' => 2,
            'name' => 'Ukraine'
        ]);

        //Ukraine 3
        DB::table('country_language')->insert([
            'id_country' => 169,
            'id_language' => 3,
            'name' => 'Ukraine'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'UA',
            'phone_code' => 380
        ]);
/* ************************************************************************************************************ */
        //Uganda 1
        DB::table('country_language')->insert([
            'id_country' => 170,
            'id_language' => 1,
            'name' => 'Uganda'
        ]);

        //Uganda 2
        DB::table('country_language')->insert([
            'id_country' => 170,
            'id_language' => 2,
            'name' => 'Uganda'
        ]);

        //Uganda 3
        DB::table('country_language')->insert([
            'id_country' => 170,
            'id_language' => 3,
            'name' => 'Uganda'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'UG',
            'phone_code' => 256
        ]);
/* ************************************************************************************************************ */
        //Uruguay 1
        DB::table('country_language')->insert([
            'id_country' => 171,
            'id_language' => 1,
            'name' => 'Uruguai'
        ]);

        //Uruguay 2
        DB::table('country_language')->insert([
            'id_country' => 171,
            'id_language' => 2,
            'name' => 'Uruguay'
        ]);

        //Uruguay 3
        DB::table('country_language')->insert([
            'id_country' => 171,
            'id_language' => 3,
            'name' => 'Uruguay'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'UY',
            'phone_code' => 598
        ]);
/* ************************************************************************************************************ */
        //Uzbekistan 1
        DB::table('country_language')->insert([
            'id_country' => 172,
            'id_language' => 1,
            'name' => 'Uzbequistão'
        ]);

        //Uzbekistan 2
        DB::table('country_language')->insert([
            'id_country' => 172,
            'id_language' => 2,
            'name' => 'Uzbekistan'
        ]);

        //Uzbekistan 3
        DB::table('country_language')->insert([
            'id_country' => 172,
            'id_language' => 3,
            'name' => 'Uzbekistán'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'UZ',
            'phone_code' => 998
        ]);
/* ************************************************************************************************************ */
        //Venezuela 1
        DB::table('country_language')->insert([
            'id_country' => 173,
            'id_language' => 1,
            'name' => 'Venezuela'
        ]);

        //Venezuela 2
        DB::table('country_language')->insert([
            'id_country' => 173,
            'id_language' => 2,
            'name' => 'Venezuela'
        ]);

        //Venezuela 3
        DB::table('country_language')->insert([
            'id_country' => 173,
            'id_language' => 3,
            'name' => 'Venezuela'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'VE',
            'phone_code' => 58
        ]);
/* ************************************************************************************************************ */
        //Zambia 1
        DB::table('country_language')->insert([
            'id_country' => 174,
            'id_language' => 1,
            'name' => 'Zâmbia'
        ]);

        //Zambia 2
        DB::table('country_language')->insert([
            'id_country' => 174,
            'id_language' => 2,
            'name' => 'Zambia'
        ]);

        //Zambia 3
        DB::table('country_language')->insert([
            'id_country' => 174,
            'id_language' => 3,
            'name' => 'Zambia'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ZM',
            'phone_code' => 260
        ]);
/* ************************************************************************************************************ */
        //Zimbabwe 1
        DB::table('country_language')->insert([
            'id_country' => 175,
            'id_language' => 1,
            'name' => 'Zimbábue'
        ]);

        //Zimbabwe 2
        DB::table('country_language')->insert([
            'id_country' => 175,
            'id_language' => 2,
            'name' => 'Zimbabwe'
        ]);

        //Zimbabwe 3
        DB::table('country_language')->insert([
            'id_country' => 175,
            'id_language' => 3,
            'name' => 'Zimbabue'
        ]);
        DB::table('country')->insert([
            'sistema_medida' => 1,
            'unidade_medida' => 1,
            'formato_data' => 1,
            'formato_numero' => 1,
            'idioma_padrao' => 2,
            'code' => 'ZW',
            'phone_code' => 263
        ]);
/* ************************************************************************************************************ */
    }

}
