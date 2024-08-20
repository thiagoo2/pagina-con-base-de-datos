<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap">
    <style>
        /* CSS inline para simplificar el ejemplo */
        .fade-in {
            opacity: 0;
            transition: opacity 2s ease-in-out;
        }

        .biography-item, .biography-products {
            display: none;
            margin-bottom: 40px;
        }

        .biography-item.active, .biography-products.active {
            display: flex;
            flex-direction: column;
        }

        .biography-image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .biography-info {
            margin: 20px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product p {
            margin: 10px 0;
            text-align: center;
            font-size: 1em;
            color: #333;
        }
    </style>
</head>
<body class="fade-in">
    <header>
          <?php
        session_start();
        if (isset($_SESSION['nombre_usuario'])) {
         echo "<p>Bienvenido, " . $_SESSION['nombre_usuario'] . " | <a href='logout.php'>Cerrar sesión</a></p>";
         } else {
           echo '<a href="login.html">Iniciar sesión</a> | <a href="register.html">Registrarse</a>';
         }
         ?>
        <h1>Sport Shop</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>

        

        <div id="cart">
            <a href="#" onclick="toggleCart()">Carrito (0)</a>
        </div>
    </header>

    <main>
        <section id="filter">
            <label for="sport-filter">Filtrar por deporte:</label>
            <select id="sport-filter" onchange="filterProducts()">
                <option value="all">Todos los productos</option>
                <option value="futbol">Fútbol</option>
                <option value="tenis">Tenis</option>
                <option value="natacion">Natación</option>
                <option value="boxeo">Boxeo</option>
                <option value="baloncesto">Baloncesto</option>
                <option value="softball">Softball</option>
            </select>
        </section>

        <section id="biography">
            <h2>Sobre Nosotros</h2>
            <p>En Sport Shop, nos apasiona el mundo del deporte y estamos comprometidos a ofrecer una amplia gama de productos para satisfacer todas tus necesidades deportivas. Desde accesorios esenciales hasta equipo especializado, tenemos todo lo que necesitas para mantenerte en forma y disfrutar de tus actividades favoritas.</p>
            <p>Nos enorgullece ofrecer productos de alta calidad en varias categorías, incluyendo:</p>
            <div class="biography-items">
                <!-- Fútbol -->
                <div class="biography-item" data-category="futbol">
                    <div class="biography-image-container">
                        <img src="images/futbol.jpg" alt="Fútbol" class="biography-image">
                    </div>
                    <div class="biography-info">
                        <h3>Fútbol</h3>
                        <p><strong>Descripción:</strong> Nuestro catálogo de fútbol incluye balones de todas las categorías, camisetas de los equipos más populares, zapatillas con la última tecnología para mejorar tu rendimiento y equipos de entrenamiento para prepararte al máximo.</p>
                        <p><strong>Productos Destacados:</strong> Balones oficiales, camisetas de clubes, zapatillas de fútbol, equipos de entrenamiento.</p>
                    </div>
                </div>
                <div class="biography-products" data-category="futbol">
                    <h4>Productos de Fútbol</h4>
                    <div class="products-grid">
                        <div class="product">
                            <img src="https://th.bing.com/th/id/OIP.gsP0lCclklXwtovliu8x2gHaHR?rs=1&pid=ImgDetMain" alt="Balón de Fútbol">
                            <p>Balón de Fútbol</p>
                        </div>
                        <div class="product">
                            <img src="https://www.kandiny.cl/images/webp/Europe/EUBH001_1.webp" alt="Camiseta de Fútbol">
                            <p>Camiseta de Fútbol</p>
                        </div>
                        <!-- Agrega más productos aquí -->
                    </div>
                </div>
        
                <!-- Tenis -->
                <div class="biography-item" data-category="tenis">
                    <div class="biography-image-container">
                        <img src="images/tenis.jpg" alt="Tenis" class="biography-image">
                    </div>
                    <div class="biography-info">
                        <h3>Tenis</h3>
                        <p><strong>Descripción:</strong> En nuestra sección de tenis, encontrarás raquetas para jugadores de todos los niveles, pelotas para entrenamientos y partidos, ropa deportiva cómoda y accesorios para mejorar tu juego en la cancha.</p>
                        <p><strong>Productos Destacados:</strong> Raquetas de tenis, pelotas, ropa deportiva, accesorios para entrenamiento.</p>
                    </div>
                </div>
                <div class="biography-products" data-category="tenis">
                    <h4>Productos de Tenis</h4>
                    <div class="products-grid">
                        <div class="product">
                            <img src="https://th.bing.com/th/id/OIP.4wvNrT1EEi3dE6jjrCwNggAAAA?rs=1&pid=ImgDetMain" alt="Raqueta de Tenis">
                            <p>Raqueta de Tenis</p>
                        </div>
                        <div class="product">
                            <img src="https://contents.mediadecathlon.com/p152665/k$0f4b43adaff6a83bae78b7459746fe3c/jumbo-tennis-ball-yellow.jpg?&f=800x800" alt="Pelotas de Tenis">
                            <p>Pelotas de Tenis</p>
                        </div>
                        <!-- Agrega más productos aquí -->
                    </div>
                </div>
        
                <!-- Natación -->
                <div class="biography-item" data-category="natacion">
                    <div class="biography-image-container">
                        <img src="images/natacion.jpg" alt="Natación" class="biography-image">
                    </div>
                    <div class="biography-info">
                        <h3>Natación</h3>
                        <p><strong>Descripción:</strong> Ofrecemos una variedad de trajes de baño para diferentes tipos de natación, gafas de alta calidad para una visión clara bajo el agua, gorros que garantizan una mejor hidrodinámica y accesorios de entrenamiento para mejorar tus habilidades.</p>
                        <p><strong>Productos Destacados:</strong> Trajes de baño, gafas de natación, gorros, accesorios de entrenamiento.</p>
                    </div>
                </div>
                <div class="biography-products" data-category="natacion">
                    <h4>Productos de Natación</h4>
                    <div class="products-grid">
                        <div class="product">
                            <img src="https://contents.mediadecathlon.com/p1789834/k$a366848c8ef5dc27186f38838b90b9f0/sq/Traje+Nataci+n+Mar+Abierto+OWS+Hombre+Neopreno+2+2+mm.jpg" alt="Traje de Baño">
                            <p>Traje de Baño</p>
                        </div>
                        <div class="product">
                            <img src="https://s.libertaddigital.com/2022/06/23/gafas-de-natacion-aqtivaqua-dx.jpg" alt="Gafas de Natación">
                            <p>Gafas de Natación</p>
                        </div>
                        <!-- Agrega más productos aquí -->
                    </div>
                </div>
        
                <!-- Boxeo -->
                <div class="biography-item" data-category="boxeo">
                    <div class="biography-image-container">
                        <img src="images/boxeo.jpg" alt="Boxeo" class="biography-image">
                    </div>
                    <div class="biography-info">
                        <h3>Boxeo</h3>
                        <p><strong>Descripción:</strong> En nuestra sección de boxeo, encontrarás guantes de boxeo de alta calidad, sacos de entrenamiento, protectores y ropa especializada para entrenar y competir con total seguridad y eficacia.</p>
                        <p><strong>Productos Destacados:</strong> Guantes de boxeo, sacos de entrenamiento, protectores, ropa de boxeo.</p>
                    </div>
                </div>
                <div class="biography-products" data-category="boxeo">
                    <h4>Productos de Boxeo</h4>
                    <div class="products-grid">
                        <div class="product">
                            <img src="https://th.bing.com/th/id/R.9b9cacaced09077a3c1096ec760e1992?rik=Bzja5v5yMt9pXQ&pid=ImgRaw&r=0" alt="Guantes de Boxeo">
                            <p>Guantes de Boxeo</p>
                        </div>
                        <div class="product">
                            <img src="https://carulla.vtexassets.com/arquivos/ids/298603/saco-de-boxeo-everlast-sh4006wb-60-lbs-13-pulg-x34-pulg-negro.jpg?v=637104367250570000" alt="Saco de Boxeo">
                            <p>Saco de Boxeo</p>
                        </div>
                        <!-- Agrega más productos aquí -->
                    </div>
                </div>
        
                <!-- Baloncesto -->
                <div class="biography-item" data-category="baloncesto">
                    <div class="biography-image-container">
                        <img src="images/baloncesto.jpg" alt="Baloncesto" class="biography-image">
                    </div>
                    <div class="biography-info">
                        <h3>Baloncesto</h3>
                        <p><strong>Descripción:</strong> En nuestra tienda encontrarás balones de baloncesto de diferentes tamaños y materiales, zapatillas de alto rendimiento, ropa deportiva y accesorios para entrenar y jugar al baloncesto con confianza.</p>
                        <p><strong>Productos Destacados:</strong> Balones de baloncesto, zapatillas, ropa deportiva, accesorios de entrenamiento.</p>
                    </div>
                </div>
                <div class="biography-products" data-category="baloncesto">
                    <h4>Productos de Baloncesto</h4>
                    <div class="products-grid">
                        <div class="product">
                            <img src="https://contents.mediadecathlon.com/p298557/k$74a7f525136224fac43390162df7b775/sq/Bal+n+de+baloncesto+SPALDING+NBA+ALL+STAR+talla+7.jpg" alt="Balón de Baloncesto">
                            <p>Balón de Baloncesto</p>
                        </div>
                        <div class="product">
                            <img src="https://th.bing.com/th/id/OIP.-v922-ELvugjYEGlR-5tygAAAA?rs=1&pid=ImgDetMain" alt="Zapatillas de Baloncesto">
                            <p>Zapatillas de Baloncesto</p>
                        </div>
                        <!-- Agrega más productos aquí -->
                    </div>
                </div>
        
                <!-- Softball -->
                <div class="biography-item" data-category="softball">
                    <div class="biography-image-container">
                        <img src="images/softball.jpg" alt="Softball" class="biography-image">
                    </div>
                    <div class="biography-info">
                        <h3>Softball</h3>
                        <p><strong>Descripción:</strong> Nuestra sección de softball ofrece bates, pelotas, guantes y equipo de protección para que puedas disfrutar del juego con los mejores equipos disponibles. Encuentra todo lo necesario para tu entrenamiento y competición.</p>
                        <p><strong>Productos Destacados:</strong> Bates de softball, pelotas, guantes, equipo de protección.</p>
                    </div>
                </div>
                <div class="biography-products" data-category="softball">
                    <h4>Productos de Softball</h4>
                    <div class="products-grid">
                        <div class="product">
                            <img src="https://images-na.ssl-images-amazon.com/images/I/71JdkYHLY3L._AC_SL1500_.jpg" alt="Bate de Softball">
                            <p>Bate de Softball</p>
                        </div>
                        <div class="product">
                            <img src="https://th.bing.com/th/id/OIP.L8GWjnxXxesKUxMRYH2hswHaHa?rs=1&pid=ImgDetMain" alt="Guante de Softball">
                            <p>Guante de Softball</p>
                        </div>
                        <!-- Agrega más productos aquí -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de Productos -->
        <div id="productos">
            <!-- Los productos se cargarán aquí usando JavaScript -->
        </div>
    </main>

    <!-- Sección del carrito desplegable -->
    <div id="cart-dropdown">
        <h2>Carrito de Compras</h2>
        <div id="cart-items"></div>
        <button onclick="clearCart()">Vaciar Carrito</button>
    </div>



    <footer>
        <p>© 2024 Sport Shop. Todos los derechos reservados.</p>
    </footer>

    <script>
        function filterProducts() {
            const selectedCategory = document.getElementById('sport-filter').value;
            const items = document.querySelectorAll('.biography-item, .biography-products');
            items.forEach(item => {
                if (selectedCategory === 'all' || item.getAttribute('data-category') === selectedCategory) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        function showLogin() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('biography').style.display = 'none'; // Ocultar la biografía
        }

        function showRegister() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        }

        function toggleCart() {
            const cartDropdown = document.getElementById('cart-dropdown');
            cartDropdown.style.display = cartDropdown.style.display === 'block' ? 'none' : 'block';
        }

        function clearCart() {
            document.getElementById('cart-items').innerHTML = '';
        }

        function login() {
            // Aquí iría la lógica para iniciar sesión
            alert('Iniciar sesión');
        }

        function register() {
            // Aquí iría la lógica para registrarse
            alert('Registrarse');
        }

        // Activar desvanecimiento
        document.addEventListener('DOMContentLoaded', () => {
            document.body.classList.remove('fade-in');
        });
    </script>
</div>

</body>
</html>
