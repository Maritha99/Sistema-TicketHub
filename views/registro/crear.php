<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Hola, continuemos con la compra de tu Ticket</p>

    <div class="paquetes__grid ">

        <div class="paquete">
            <h3 class="paquete__nombre">Pagar</h3>

            <!--<p class="paquete__precio">Ingresa tus credenciales</p>-->

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>

    </div>
</main>


<script src="https://www.paypal.com/sdk/js?client-id=AUr4BAUXhZf5fPYlSCa-u9HGRG6qnpgegNEsiwm2_70owZ_uwXYczdxAdo1NHzRIMcN9q8WyFWioEQix&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
                const datos = new FormData();
                datos.append('paquete_id', orderData.purchase_units[0].description);
                datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

                fetch('/finalizar-registro/pagar', {
                    method: 'POST',
                    body: datos
                })
                .then( respuesta => respuesta.json())
                .then(resultado => {
                    if(resultado.resultado) {
                        
                      console.log(resultado)  

                        actions.redirect('http://localhost:3005/boleto');
                    }
                })
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>