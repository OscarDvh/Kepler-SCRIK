<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>EQUIPO DE TRANSPORTE</h3>
          <b>DATOS GENERALES</b>
          <hr>
          <form>
            <div class="form-group">

              <div class="row">
                <div class="col-5">
                  <label for="propietario">Propietario</label>
                  <select class="form-control" id="propietario">
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
                <div class="col">
                  <label for="claveVehicular">Clave Vehicular</label>
                  <input type="text" class="form-control" id="claveVehicular">
                </div>
                <div class="col">
                  <label for="vin">VIN</label>
                  <input type="text" class="form-control" id="vin">
                </div>
                <div class="col">
                  <label for="factura">Factura</label>
                  <input class="form-control" type="text" id="factura"></input>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" id="marca">
                </div>
                <div class="col">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control" id="modelo">
                </div>
                <div class="col">
                  <label for="tipo">Tipo</label>
                  <input type="text" class="form-control" id="tipo">
                </div>
                <div class="col">
                  <label for="transmision">Transmisión</label>
                  <select class="form-control" id="transmision">
                    <option>Seleccione</option>
                    <option>Automática</option>
                    <option>Manual</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="color">Color</label>
                  <input type="text" class="form-control" id="color">
                </div>
                <div class="col">
                  <label for="combustible">Combustible</label>
                  <input type="text" class="form-control" id="combustible">
                </div>
                <div class="col">
                  <label for="numMotor">Número de Motor</label>
                  <input type="text" class="form-control" id="numMotor">
                </div>
                <div class="col">
                  <label for="placas">Placas</label>
                  <input type="text" class="form-control" id="placas">
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="polizaSeguro">Póliza de Seguro</label>
                  <input type="text" class="form-control" id="polizaSeguro">
                </div>
                <div class="col">
                  <label for="vencimientoPoliza">Vencimiento de Póliza</label>
                  <input type="date" id="vencimientoPoliza" class="form-control">
                </div>
                <div class="col">
                  <label for="tarjetaCirculacion">Tarjeta de Circulación</label>
                  <input type="text" class="form-control" id="tarjetaCirculacion">
                </div>
                <div class="col">
                  <label for="vencimientoTarjeta">Vencimiento Tarjeta de Circulación</label>
                  <input type="date" class="form-control" id="vencimientoTarjeta">
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="estadoCirculacion">Estado de Circulación</label>
                  <input type="text" class="form-control" id="estadoCirculacion">
                </div>
                <div class="col">
                  <label for="estatus">Estatus del Vehiculo</label>
                  <select class="form-control" id="estatus">
                    <option>Seleccione</option>
                    <option>Alta</option>
                    <option>Baja</option>
                  </select>
                </div>
                <div class="col">
                  <label for="estatusVerificacion">Estatus de Verificación</label>
                  <select class="form-control" id="estatusVerificacion">
                    <option>Seleccione</option>
                    <option>Realizado</option>
                    <option>Pendiente</option>
                  </select>
                </div>
                <div class="col">
                  <label for="vencimientoVerificacion">Vencimiento de Verificación</label>
                  <input type="date" class="form-control" id="vencimientoVerificacion">
                </div>
              </div>

              <br>
              <b>DOCUMENTACIÓN</b>
              <hr>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Tarjeta de Circulación</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Factura</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Identificacion</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Pagos de tenencia</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Certificado de verificación</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Licencia de Conducir</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Póliza de seguro</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Evidencia de servicio</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Politicas de uso</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                  <tr>
                    <th scope="row">Responsiva</th>
                    <td>archivo.pdf</td>
                    <td>ABCV</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>