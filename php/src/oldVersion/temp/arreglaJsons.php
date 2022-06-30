<?php
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------

// CORREGIR json COM PROBLEMAS DE MULTIPLAS RAIZES {DADOS}{DADOS}{DADOS} E ERRO

//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
// Carregamos o arquivo externo Json com problemas de multiplas raizes
$json = file_get_contents('install_db/response_country11.json'); // Mas actualizados
// $json = file_get_contents('dataImportoldsite/response_pais_8.json');
echo '<pre>';

//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
/** NÃO SABEMOS COMO ISSO FUNCIONA MAS FUNCIONA, VEIO DO SITE: 
 * http://ryanuber.com/07-31-2012/split-and-decode-json-php.html
 * 
 * json_split_objects - Return an array of many JSON objects
 *
 * @param string $json  The JSON data to parse
 *
 * @return array
 */
function json_split_objects($json)
{
    $q = FALSE;
    $len = strlen($json);
    for($l=$c=$i=0;$i<$len;$i++)
    {   
        $json[$i] == '"' && ($i>0?$json[$i-1]:'') != '\\' && $q = !$q;
        if(!$q && in_array($json[$i], array(" ", "\r", "\n", "\t"))){continue;}
        in_array($json[$i], array('{', '[')) && !$q && $l++;
        in_array($json[$i], array('}', ']')) && !$q && $l--;
        (isset($objects[$c]) && $objects[$c] .= $json[$i]) || $objects[$c] = $json[$i];
        $c += ($l == 0);
    }   
    // print_r($objects);
    return $objects;
}
$result = json_split_objects($json);
// NÃO MEXER NO CODIGO ACIMA, ELE FUNCIONA, OK, CORRIGE MEUS JSONS COM VARIAS RAIZ

//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
// Criamos um array valido para armazenar os dados
    $newJson['campings'] = array();

    foreach ($result as $key => $value) {
        // Inserimos na Array os valores da maneira correta

        $value = strtr($value, "'", " ");
        // $value = strtr($value, "-", "_");

        array_push($newJson['campings'], json_decode($value));
    }

    // Conferindo que ta tudo ok com nosso processo de correção de Json
    // print_r($newJson['campings']);
    echo 'Total de Campings: '.$newJson['campings'][0]->{'thesaurusCode'} . ' - ' . count($newJson['campings']);
    echo '<br>';
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
        //║  INSERE registro na tabela da Base de dados
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
        //║  Parametros de conexao
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
            $host="172.25.0.2:3306";
            $login="root";
            $senha="root";
            $banco="campingsPlaceMysql";
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
        //║  Criamos a variavel de conexao
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
                $conecta = new mysqli($host, $login, $senha, $banco);
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝


    // Outro foreach para insertar na base de dados
    foreach ($newJson['campings'] as $value) {
        // Aqui é onde podemos inserir o que queremos na base de dados
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
        //║  Criamos as variaveis para carrgar na base de dados
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        // Dados Basicos e tratamento de casos 
        $raisonSociale = $value->raisonSociale;
        $alias = $value->alias;
        $email = $value->email;
        $contactEmail = $value->email;
        $contactPhone = "";
        $addressOne = $value->Adr1;
        $addressTwo = $value->Adr2;
        $addressComplement = $value->Adr3;
        $addressPostalCode = $value->codePostal;
        $isAgroupCampings = $value->isGroup;
        // Address Location
        $addressCountry = $value->{123};
        $addressDepartement = $value->{88};
        if($addressDepartement === ""){ 
            $addressDepartement = $value->Libelle; 
        };
        $addressRegion = $value->{104};
        if($addressRegion === ""){ 
            $addressRegion = $value->{114}; 
        };
        if($addressRegion === ""){ 
            $addressRegion = $value->{115}; 
        };
        // Titulo da pagina Principal
        if($value->raisonSociale_en != ""){
            $principalTitle = $value->raisonSociale_en;
        }else{
            $principalTitle = $value->raisonSociale;
        }
        $principalDescription = "";
        $principalAdvantagesDescription = ""; // Gravar en Json {adv1 = "", adv2 = "", etc}
        $defaultLogoCamping = "";
        $principalIMGuniqueRoute = "";
        $principalIMGslideRoute = ""; // Gravar en Json {rota1 = "", rota2 = "", etc}
        // Admin Settings contact
        $namePerson = "";
        $nameSurnamePerson = "";
        $contactPerson = "";
        $emailPerson = "";
        // Coordenadas
        $coordLatitude = $value->latitude;
        if($coordLatitude === ""){ 
            $coordLatitude = $value->{55}; 
        };
        $coordLongitud = $value->longitude;
        if($coordLongitud === ""){ 
            $coordLongitud = $value->{54};
        };
        // Dados Criticos de acesso a B.O
        $login = $value->login;
        $pass = $value->pass; // Criar chave segura
        // Dados de Validação de recursos
        $backoffice = "1";
        // Dados para SEO
        if($value->raisonSociale_en != ""){
            $seoTitle = $value->raisonSociale_en;
        }else{
            $seoTitle = "";
        }
        if($value->raisonSociale_en != ""){
            $seoDescription = $value->raisonSociale_en;
        }else{
            $seoDescription = "";
        }
        // Language default 
        $languageDef = $value->thesaurusCode;
        if($languageDef === ""){ 
            $languageDef = $value->{122};
        };


        // print_r($value);
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
        //║  Definimos a query para inserir o registro na tabela na base de dados e armazenamos na variavel $sql
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
            $sqli = "INSERT INTO campings_general_data_use
            (   raisonSociale, 
                alias, 
                email, 
                contactEmail, 
                contactPhone, 
                addressOne,
                addressTwo,
                addressComplement,
                addressPostalCode,
                isAgroupCampings,
                addressCountry,
                addressRegion,
                addressDepartement,
                principalTitle,
                principalDescription,
                principalAdvantagesDescription,
                defaultLogoCamping,
                principalIMGuniqueRoute,
                principalIMGslideRoute,
                namePerson,
                nameSurnamePerson,
                contactPerson,
                emailPerson,
                coordLatitude,
                coordLongitud,
                login,
                pass,
                backoffice,
                seoTitle,
                seoDescription,
                languageDef 
                )".
            "VALUES (
                '$raisonSociale',
                '$alias', 
                '$email',
                '$contactEmail',
                '$contactPhone',
                '$addressOne',
                '$addressTwo',
                '$addressComplement',
                '$addressPostalCode',
                '$isAgroupCampings',
                '$addressCountry',
                '$addressRegion',
                '$addressDepartement',
                '$principalTitle',
                '$principalDescription',
                '$principalAdvantagesDescription',
                '$defaultLogoCamping',
                '$principalIMGuniqueRoute',
                '$principalIMGslideRoute',
                '$namePerson',
                '$nameSurnamePerson',
                '$contactPerson',
                '$emailPerson',
                '$coordLatitude',
                '$coordLongitud',
                '$login',
                '$pass',
                '$backoffice',
                '$seoTitle',
                '$seoDescription',
                '$languageDef'
                )";


        // print_r($sqli);



        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
        //║  Executamos e conferimos o estado "verdadeiro ou falso" e definimos mensagens para "true or false"
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝
        //╔══════════════════════════════════════════════════════════════════════════════════════════════════════════╗
                if ($conecta->query($sqli) === TRUE){
                echo '<div class="alert alert-success"><strong>Parabéns, '.$raisonSociale.' </strong> Dados inseridos com sucesso! </div>';
                }else{
                echo '<div class="alert alert-danger"><strong>Que pena, </strong> não foi possível inserir os dados </div>';
                }
        //╚══════════════════════════════════════════════════════════════════════════════════════════════════════════╝          
    }
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
echo '</pre>';
// 


