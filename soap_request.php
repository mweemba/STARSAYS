 <?php $request_Doc=  '
		  <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
<soap:Header/><soap:Body>< xmlns="http://www.asycuda.org"><mrrtInfo>
<bankCode xmlns="">'.$row['bankcode'].'</bankCode>
<BranchCode xmlns="">'.$row['unit_id'].'</BranchCode>
<year xmlns="">'.$row['year'].'</year>
<month xmlns="">'.$row['month'].'</month>
<date xmlns="">'.$newdate1.'</date>
<time xmlns=""> '.$newdate1.' '.$row['time'].'</time>
<trsRef xmlns="">'.$row['trsref'].'</trsRef>
<mrtLin xmlns="">'.$row['mrtlin'].'</mrtLin>
<trsCode xmlns="">'.$row['trscode'].'</trsCode>
<PerNat xmlns="">'.$row['remctycode'].'</PerNat>
<IdeNbr xmlns="">'.$row['idenbr'].'</IdeNbr>
<SecCode xmlns="">'.$row['seccode'].'</SecCode>
<ConCode xmlns="">'.$row['concode'].'</ConCode>
<IdeCode xmlns="">'.$row['Idecode'].'</IdeCode>
<PotCode xmlns="">'.$row['potcode'].'</PotCode>
<RemCtyCode xmlns="">'.$row['remctycode'].'</RemCtyCode>
<RecCtyCode xmlns="">'.$row['recctycode'].'</RecCtyCode>
<FgnCode xmlns="">'.$row['fgnpaycur'].'</FgnCode>
<FgnPayAmt xmlns="">'.$row['fgnpayamt'].'</FgnPayAmt>
<FgnPayCur xmlns="">'.$row['fgnpaycur'].'</FgnPayCur>
<FgnPayRat xmlns="">'.$row['fgnpayrat'].'</FgnPayRat>
<LocPayAmt xmlns="">'.$row['locpayamt'].'</LocPayAmt>
<DocRefCode xmlns=""/><DocRefNbr xmlns=""/>
</mrrtInfo></mrrtStore></soap:Body></soap:Envelope>';

$soapUrl = "http://172.21.101.2:8085/asywsbop/WSMrrt?wsdl";

$data =$request_Doc;

$password='password';
$username='username';

 //Namespace of the WS.
$soap_client = new SoapClient($soapUrl);
//Body of the Soap Header.
$headerbody = array(
                      'UserCredentials'=>array('USERNAME'=>$username,
                                             'PASSWORD'=>$password));

//Create Soap Header.       
$header = new SOAPHeader($soapUrl, 'RequestorCredentials', $headerbody);       
       
//set the Headers of Soap Client.
$soap_client->__setSoapHeaders($header);

$url = "http://172.21.101.2:8085/asywsbop/WSMrrt?wsdl";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);

//curl_setopt($curl, CURLOPT_HTTPHEADER, $header);



curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);


$resp = curl_exec($curl);
curl_close($curl);

	  
var_dump($resp);
?>