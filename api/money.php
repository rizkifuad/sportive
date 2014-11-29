<?php 
include_once "./library/OAuthStore.php";
include_once "./library/OAuthRequester.php";

define("CONSUMER_KEY", "bestapp58");
define("CONSUMER_SECRET", "57IRU");
define("OAUTH_HOST", "http://sandbox.appprime.net");
define("REQUEST_TOKEN_URL", OAUTH_HOST."/TemanDev/rest/RequestToken/");
define("ACCESS_TOKEN_URL", OAUTH_HOST."/TemanDev/rest/AccessToken/");

//  Init the OAuthStore
$options = array(
	'consumer_key' => CONSUMER_KEY, 
	'consumer_secret' => CONSUMER_SECRET,
	'server_uri' => OAUTH_HOST,
	'request_token_uri' => REQUEST_TOKEN_URL,
	'access_token_uri' => ACCESS_TOKEN_URL
);
// Note: do not use "Session" storage in production. Prefer a database storage, such as MySQL.
OAuthStore::instance("Session", $options);

try
{
        //  STEP 1:  If we do not have an OAuth token yet, go get one
        $getAuthTokenParams = null;
        // get a request token
        echo 'fetch request token..';
        $tokenResultParams = OAuthRequester::requestRequestToken(CONSUMER_KEY, 0, $getAuthTokenParams);
	echo '
request token = '.$tokenResultParams["token"];
        echo '
';
        //  STEP 2:  Get an access token
        try {
            OAuthRequester::requestAccessToken(CONSUMER_KEY, $tokenResultParams["token"], 0, 'POST');
        }
        catch (OAuthException2 $e)
        {
            var_dump($e);
            return;
        }        

        // make the docs request.
        $urlAPI = OAUTH_HOST.'/TemanDev/rest/tMoney/';
        $opt = array(CURLOPT_HTTPHEADER=>array('Content-Type: application/json'));
        $body = ' {"tmoney":{"invoiceNo":"DEL41143493","serviceID":"016","amount":"1000","returnURL":"http://devocsg.telkom.co.id:8001/wsSDP-1.0/sdp/xresponse","merchantCode":"195158400621"}}'; 
        $request = new OAuthRequester($urlAPI,'POST',$tokenResultParams,$body);
        // echo 'execute api.. ';
        $result = $request->doRequest(0,$opt);
        echo $result;
        $a ="HTTP/1.1 302 Found Server: Apache-Coyote/1.1 Location: https://em.telkomdelima.com/jets-delima/WebCollection.action?MerchantCode=null&amp;InvoiceNo=DEL41143493 Content-Language: en-US Content-Length: 0 Date: Fri, 10 Oct 2014 09:00:28 GMT";

        $hasil =explode(' ',$a);

        for($a=0;$a<=30;$a++) { $potong=substr($hasil[$a], 0, 5); if($potong=="https") { $redirect = $hasil[$a]; } } header('Location: '.$redirect);  } catch(OAuthException2 $e) { 	echo "OAuthException:  " . $e->getMessage();
        	var_dump($e);
        }
?>