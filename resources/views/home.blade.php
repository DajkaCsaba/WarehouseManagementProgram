<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title></title>
     </head>
     <style media="screen">
          td{
               width:50%;
               height:20px;
          }
          table{
               border: 1px solid black;
               weight: 100%;
               border-collapse: collapse;
          }
     </style>
     <body>
          <div class="" style="text-align:center;">
               <h1>Szállítólevél</h1>
               <p>Sorszám: {{date('YmdHis')}}</p>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12">
               <table>
                    <tr>
                         <td>
                              <p>{{ Auth::user()->storageName }}</p>
                         </td>
                         <td>

                         </td>
                    </tr>
               </table>
          </div>
     </body>
</html>
