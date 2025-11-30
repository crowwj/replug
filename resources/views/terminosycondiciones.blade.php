<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="cuerpoTerminos">
    <nav class="barra-ayuda">   
            <a href="{{ route('registroform') }}" style="text-decoration: none; color: white; font-size: 20px;">Inicio</a>  
                <div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;"> Cerrar sesión </a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
   </nav>
    <div class="container">
        <div class="terms-card">
            
            <h1 class="text-center">TÉRMINOS Y CONDICIONES</h1>
            <div class="sub-section">
                <h2>1. Información General</h2>
                <p>Este sitio web es operado por Mercado Pobre. Al acceder y utilizar nuestro ecommerce, aceptas los siguientes términos y condiciones. Si no estás de acuerdo con ellos, te recomendamos no utilizar nuestros servicios.</p>
                
                <div class="important-note">
                    <p><strong>REQUERIMIENTO DE DATOS:</strong> Al aceptar nuestros términos y condiciones, usted acepta brindarnos la siguiente información: nombre, apellidos, número de teléfono, correo electrónico, país de origen, número de casa, número de calle, número de código postal, datos bancarios y ubicación en la que reside.</p>
                </div>
                
                <p>Nuestra responsabilidad reside en mantener sus datos protegidos y ocultos para los demás usuarios, y solo podrán ser accesibles por usted y nuestros servicios de seguridad de terceros.</p>
                <p>Nuestra responsabilidad como empresa le asegura que su experiencia debe ser segura y monitoreada para su uso eficiente y correcto.</p>
            </div>

            <div class="sub-section">
                <h2>2. Protección de Datos</h2>
                <p>La información personal proporcionada será tratada conforme a nuestra Política de Privacidad.</p>
                <p>No compartimos tus datos con terceros sin tu consentimiento, salvo por requerimientos legales o servicios logísticos.</p>
            </div>

           
            <div class="sub-section">
                <h2>3. Productos y Precios</h2>
                <p>Todos los productos electrónicos y componentes están sujetos a disponibilidad.</p>
                <p>Los precios están expresados en moneda local e incluyen impuestos aplicables.</p>
                <p>Nos reservamos el derecho de modificar precios, descripciones y disponibilidad sin previo aviso.</p>
            </div>

           
            <div class="sub-section">
                <h2>4. Proceso de Compra</h2>
                <p>El usuario debe proporcionar información veraz y actualizada al realizar una compra.</p>
                <p>Una vez confirmado el pedido, se enviará una notificación por correo electrónico con los detalles de la transacción.</p>
                <p>Nos reservamos el derecho de cancelar pedidos en caso de sospecha de fraude o error en el sistema.</p>
            </div>

            
            <div class="sub-section">
                <h2>5. Envíos y Entregas</h2>
                <p>Los tiempos de entrega son estimados y pueden variar según la ubicación y disponibilidad del producto.</p>
                <p>El servicio de paquetería es responsable de la integridad del paquete una vez que sale de nuestras instalaciones.</p>
                <p>En caso de pérdida, daño o retraso, el cliente deberá contactar directamente al proveedor logístico.</p>

                <div class="alert alert-warning" role="alert">
                    <h5 class="alert-heading">Responsabilidad del Servicio de Paquetería</h5>
                    <p>El servicio de paquetería deberá ser contactado en lugar de nuestras oficinas si este ocasiona algunos problemas en sus pedidos, esto por las siguientes razones:</p>
                    <ul>
                        <li>El servicio de paquetería es el principal responsable de diferentes inconvenientes como robo de paquetes, pérdida de paquetes, ruptura de paquetes y paquete dañado por el empleado.</li>
                        <li>Si no está seguro del camino que su paquete está tomando, deberá acudir al sistema de monitoreo de ruta del sistema de paquetería. Si este no cuenta con uno se le informará de antemano para que pueda decidir entre otras opciones de entrega.</li>
                    </ul>
                </div>
            </div>

           
            <div class="sub-section">
                <h2>6. Garantías y Devoluciones</h2>
                <p>Los productos cuentan con garantía limitada según el fabricante.</p>
                <p>No se aceptan devoluciones por mal uso, daño físico o alteraciones no autorizadas.</p>

                <div class="important-note">
                    <h5 class="alert-heading">Requisitos de Elegibilidad para Reembolso</h5>
                    <p>Si el paquete no es como usted esperaba y desea conseguir un reembolso y/o devolverlo, deberá cumplir con los siguientes requisitos para ser elegible para un reembolso:</p>
                    <ol>
                        <li>No haber roto o manchado el producto de manera intencional o no intencional.</li>
                        <li>No haber usado el paquete de manera que haya dejado cambios irreversibles en este.</li>
                        <li>No haber dañado el empaquetamiento que incluye el producto (caja promocional, molde de acomodamiento interno, bolsas o paquetitos que puedan ser reutilizadas).</li>
                        <li>No haber perdido ningún artículo del producto.</li>
                    </ol>
                    <p class="mt-3">Si usted cumple con los requisitos, deberá acudir a su paquetería afiliada más cercana y entregar un correo emitido por nosotros junto con el producto que desea devolver (ya empaquetado) para poder ser enviado a nuestras sucursales o centros de almacenamiento para ser examinado, al igual de esperar un plazo determinado para que su reembolso/devolución sea emitido.</p>
                </div>
            </div>

           
            <div class="sub-section">
                <h2>7. Limitación de Responsabilidad</h2>
                <p>No nos hacemos responsables por daños indirectos, pérdida de datos o interrupciones derivadas del uso del sitio o productos adquiridos.</p>
                <p>El uso de componentes electrónicos debe realizarse bajo supervisión técnica adecuada.</p>

                <div class="alert alert-danger" role="alert">
                    <p><strong>Aviso Médico y Uso Incorrecto:</strong></p>
                    <ul>
                        <li>Si usted empieza a padecer de algún síntoma médico, nosotros no nos haremos responsables de ello, y en su lugar deberá acudir al soporte a cliente del emisor del producto.</li>
                        <li>Si usted decide dar un mal uso de nuestros productos no nos hacemos responsables de las consecuencias que estos puedan causar, de preferencia acuda a un médico antes de presentar una queja.</li>
                    </ul>
                </div>
            </div>

           
            <div class="sub-section">
                <h2>8. Modificaciones</h2>
                <p>Nos reservamos el derecho de actualizar estos términos en cualquier momento. Los cambios serán publicados en esta página y entrarán en vigor inmediatamente.</p>
            </div>

            
            <div class="sub-section">
                <h2>9. Contacto</h2>
                <p>Para cualquier duda o aclaración, puedes contactarnos en:</p>
                <ul class="list-unstyled">
                    <li><strong>Correo electrónico:</strong> <a href="mailto:[correo@empresa.com]"></a></li>
                    <li><strong>Teléfono de atención al cliente:</strong> [Teléfono de atención al cliente]</li>
                </ul>
            </div>
            
        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>