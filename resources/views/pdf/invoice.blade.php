<!DOCTYPE html>
<html>
     <head lang="{{ app()->getLocale() }}">
          <meta charset="utf-8-HU">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>{{date('YmdHis')}}</title>
          <style media="screen">
               table,td{
                    border: 1px solid black;
               }

               table{
                    border-collapse: collapse;
                    weight: 100%;
               }
          </style>
     </head>

     <body>
          <div class="" style="text-align:center;">
               <h1>Szállítólevél</h1>
               <p><b>Sorszám:</b> {{date('YmdHis')}}</p>
          </div>


                              <table>
                                   <tr >
                                        <td colspan="2" style="width:362px;height:140px;">
                                             <p style="margin-left:5px;"><b> Raktár neve: </b>{{ Auth::user()->storageName }}</p>
                                             <p style="margin-left:5px;"><b> Raktár címe:</b> {{ Auth::user()->storageAddress }}</p>
                                             <p style="margin-left:5px;"><b> Adószám:</b> {{ Auth::user()->taxNumber }}</p>
                                        </td>
                                        <td colspan="3" style="width:362px;height:140px;">
                                             <p style="margin-left:5px;"><b>Partner neve:</b> {{ $partner->partner_ceg }}</p>
                                             <p style="margin-left:5px;"><b>Partner címe:</b> {{ $partner->partner_cim }}</p>
                                             <p style="margin-left:5px;"><b>Partner adószáma:</b> {{ $partner->partner_adoszam }}</p>



                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <p style="margin-left:5px;"><b>Szálítólevél kelte:</b></p>
                                             <p style="text-align:center;">{{date('Y-m-d')}}</p>

                                        </td>
                                        <td style="margin:5px;">
                                             <p style="margin-left:5px;"><b>Kiszállítás dátuma:</b></p>
                                             <p style="text-align:center;">{{date('Y-m-d')}}</p>
                                        </td>
                                        <td colspan="2"> <p style="margin-left:5px;"><b>Szállítás célja:</b> {{ $partner->partner_szallitas_celja }} </p> </td>
                                        <td><p style="margin-left:5px;"><b>Deviza:</b> Ft</p></td>
                                   </tr>
                              </table>
          <p><b>Szállítási cím:</b> {{ $partner->partner_szallitasi_cim }}</p>

          <table style="text-align:center;font-weight:bold;">
               <tr>
                    <td style="width:210px;">Áru megnevezése</td>
                    <td style="width:100px">Mennyiség</td>
                    <td style="width:100px">Mértékegység</td>
                    <td style="width:100px">Egységár</td>
                    <td style="width:100px">Nettó</td>
                    <td style="width:100px">Bruttó</td>
               </tr>
               <?php
                    $osszesenEgysegAr = 0;
                    $osszesenNettoOsszeg = 0;
                    $osszesenBruttoOsszeg = 0;
               ?>
               @for($i=0, $count=count($kiadas);$i<$count;$i++)
                    <tr>
                         <?php
                              $egysegAr = $kiadas[$i]->netto;
                              $nettoOsszeg = $kiadas[$i]->netto*$db[$i];
                              $bruttoOsszeg = (int)((($kiadas[$i]->netto / 100)*$kiadas[$i]->tax)+$kiadas[$i]->netto)*$db[$i];
                              $osszesenEgysegAr = $osszesenEgysegAr + $egysegAr;
                              $osszesenNettoOsszeg = $osszesenNettoOsszeg + $nettoOsszeg;
                              $osszesenBruttoOsszeg = $osszesenBruttoOsszeg + $bruttoOsszeg;
                          ?>
                         <td style="font-weight:normal;">{{$kiadas[$i]->name}}</td>
                         <td style="font-weight:normal;">{{$db[$i]}}</td>
                         <td style="font-weight:normal;">{{$kiadas[$i]->unit}}</td>
                         <td style="font-weight:normal;">{{$egysegAr}} Ft</td>
                         <td style="font-weight:normal;">{{$nettoOsszeg}} Ft</td>
                         <td style="font-weight:normal;">{{$bruttoOsszeg}} Ft</td>

                    </tr>
               @endfor
               <tr>
                    <td colspan="3" style="text-align:left;">Összesen:</td>
                    <td>{{$osszesenEgysegAr}} Ft</td>
                    <td>{{$osszesenNettoOsszeg}} Ft</td>
                    <td>{{$osszesenBruttoOsszeg}} Ft</td>
               </tr>
          </table>
          <table style="border:none;margin-top:50px;">
               <tr>
                    <td style="width:362px;border:none;text-align:center;">-------------------------------</td>
                    <td style="width:362px;border:none;text-align:center;">-------------------------------</td>
               </tr>
               <tr>
                    <td style="width:362px;border:none;text-align:center;"><b>Kiállító</b></td>
                    <td style="width:362px;border:none;text-align:center;"><b>Átvevő</b></td>
               </tr>
          </table>

     </body>
</html>
