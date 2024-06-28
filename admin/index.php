<?php
    require '../includes/app.php';
    autenticado();
    
    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Bienvenida <span>Reyna</span></h2>
    </section>

    <main class="contenedor">
        <div class="motivacion">
            <div class="motivacion__imagen">
                <img loading="lazy" src="/build/img/logo_principal.png" alt="Motivacion">
            </div>
            <div class="motivacion__texto">
                <h3>Hola <span>Reyna</span></h3>

                <p>
                    ¿Alguna vez has sentido que hay momentos que marcan la diferencia en tu vida? Esos instantes únicos que atesoras y recuerdas siempre con una sonrisa. En <span>Little Cat Cacke's Shop</span>&copy;, creemos que cada decisión que tomas puede ser uno de esos momentos.
                </p>
                
                <p>
                    Imagina cómo cambiaría tu día a día con <span>Little Cat Cacke's Shop</span>&copy;. Cada vez que lo uses, estarás eligiendo calidad, bienestar y felicidad para ti y para quienes te rodean. No es solo es vender, es una inversión en ti mismo, en tu comodidad y en tu alegría.
                </p>

                <p>
                    Recuerdas el primer día cuando iniciaste <span>Little Cat Cacke's Shop</span>&copy;, tu primera venta, tu primer ingreso, tu primer cliente y estabas con mucha felicidad por cumplir, así que sigue con tu éxito, mucho animo y cumple tus sueños con <span>Little Cat Cacke's Shop</span>&copy;.
                </p>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>