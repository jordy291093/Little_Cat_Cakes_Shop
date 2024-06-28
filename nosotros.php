<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <section class="separador">
        <h2>Nosotros</h2>
    </section>

    <main class="contenedor">
        <div class="nosotros">
            <div class="nosotros__imagen">
                <img loading="lazy" src="/build/img/nosotros.jpg" alt="Nosotros">
            </div>
            <div class="nosotros__texto">
                <p>
                    En nuestra pastelería <span>Little Cat Cacke's Shop</span>&copy;, cada día es una oportunidad para compartir nuestra pasión por lo dulce y lo delicioso.
                </p>
                
                <p>
                    Desde el primer momento en que abrimos nuestras puertas, nos propusimos ser más que una simple pastelería.
                </p>

                <p>
                    Cada pastel que horneamos, cada pay que decoramos, y cada galleta que empaquetamos, lleva consigo nuestro compromiso con la calidad, la creatividad y, sobre todo, el cariño.
                </p>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>