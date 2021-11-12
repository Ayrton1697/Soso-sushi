<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link  rel="icon" href="{{asset('img/favicon.png')}}" type="image/png" />
    <meta name="description" content="Sushi. Pedí Sushi Online. Mirá nuestro menú online de sushi.">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/ecommerce-styles.css') }}">
    <script src="https://kit.fontawesome.com/3e89adbc58.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Remember to include jQuery :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="https://kit.fontawesome.com/3e89adbc58.js" crossorigin="anonymous"></script>
   
    <title>Soso Sushi: Pedí online</title>
    @livewireStyles
 

</head>
<body>
    <div class="navigation">

          <header class="section-header-2" id="inicio">
          <a href="{{route('index')}}" class="redirect-home">
            <img src="{{asset('img/2.png')}}" alt="" class="img--logo">
          </a>
          </header>

        <input type="checkbox" id="check" class="navigation__checkbox">
        <label for="check" class="navigation__button ">
         <!-- <i class="fas fa-bars"></i> -->
         <i class="navigation__icon"></i>
        </label>

    <div class="navigation__background">&nbsp;</div>
    <div class="navigation-nav">
        <ul class="navigation__list">
        <li class="navigation__item"><a href="{{route('index')}}/#inicio" class="navigation__link">Inicio</a></li>
                <li class="navigation__item"><a href="{{route('index')}}/#nosotros" class="navigation__link">Nosotros</a></li>
                <li class="navigation__item"><a href="{{route('pedidos')}}" class="navigation__link">Pedidos</a></li>
                <li class="navigation__item"><a href="{{route('promos')}}" class="navigation__link">Promos</a></li>
                <li class="navigation__item"><a href="{{route('pedidos')}}" class="navigation__link">Menu</a></li>
                <li class="navigation__item"><a href="{{route('index')}}/#contact" class="navigation__link">Contacto</a></li>
                <li class="navigation__item navigation__item--right">
                
                      <a href="{{route('carrito')}}" class="navigation__link">
                        <livewire:cart-qty/>
                        <i class="icon-ecommerce-cart-content navigation__cart"></i>
                      </a>
                </li>
        </ul>
    </div>
    </div>
                <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

                <label for="navi-toggle" class="navigation__button navigation__button--carrito">
     
                    <a href="{{route('carrito')}}" class="navigation__link navigation__item--right">
                      <livewire:cart-qty/>
                      <i class="icon-ecommerce-cart-content navigation__cart  navigation__cart--2"></i>
                    </a>

                </label>
          <script>
        
              // Select DOM items
      const navLink = document.querySelectorAll('.navigation__item'); // nav item class
      const checkbox = document.querySelector('.navigation__checkbox'); //checkbox class

      // Add Event Listener to every nav link
      for (let i = 0; i < navLink.length; i++) {
      navLink[i].addEventListener('click', checkboxOff);
      }

      // Uncheck checkbox
      function checkboxOff() {
      checkbox.checked = false;
      }

    </script>
 
      <div class="search-bar" style="text-align:center">
        <form action="{{route('product.search')}}" method="GET" class="search__form">
            <i class="fas fa-search search__icon" style="color:white"></i>
            <input type="text" name="search" class="search-input" placeholder="Buscá tu producto" style="width:70%; padding:1.5rem; margin:4rem; outline:none">
        </form>
      </div>
  @if (empty($products) || count($products) == 0)
      <div class="no-products-warning">No hay productos que coincidan con la búsqueda.</div>
  @else
    @foreach($products->groupBy('tipo') as $tipo => $product)
      <section class="section-pedidos" id="pedido">
          <div class="pedido__item">
              <div class="pedido__item--title">
              {{$tipo}}
              </div>
              <div class="pedido__items">

              @foreach($product as $prod)
                  <a href="#{{$prod->id}}" class="pedido--box"  rel = "modal:open">
                    <div class="column">
                      <span class="item--name">{{$prod->name}}</span>
                      <span class="item--price">$ {{$prod->price}} +</span>
                    </div>
                    <span class="modal-description" style="color:red">{{$prod->description}}</span>
                  </a>
              @endforeach
        
                  
          
              </div>
      
          </div>
      </section>
    @endforeach
  @endif

  <footer class="footer">
    <div class="footer__logo">
    <a href="{{route('index')}}" class="redirect-home">
      <img src="img/2.png" alt="" class="img--logo">
    </a>
    </div>
    <div class="footer__mid">

        <div class="footer__socials">
         <a href="https://www.instagram.com/soso.sushi/" target="blank" class="footer__link"> <i class="footer__icons fab fa-instagram fa-2x"></i></a>

          <a href="bit.ly/31Ryig4" target="blank" class="footer__link">
            <i class="footer__icons fab fa-whatsapp fa-2x"></i>
          </a>
         <a href="https://www.facebook.com/sososushisushi" target="blank" class="footer__link"> <i class="footer__icons fab fa-facebook-square fa-2x"></i></a>

        </div>
      
        <ul class="footer__list">
          <li class="footer__item"><a href="#inicio" class="footer__link">Inicio</a></li>
          <li class="footer__item"><a href="#nosotros" class="footer__link">Nosotros</a></li>
          <li class="footer__item"><a href="#menu" class="footer__link">Menu</a></li>
          <li class="footer__item"><a href="#contact" class="footer__link">Contacto</a></li>
      </ul>
    </div>

  <div class="footer__emfes">
    <a href="https://emfesmarketing.com/" class="footer__emfes--link">Built by &copy; emfes marketing</a> 
  </div>
  </footer>

<!-- Modal HTML embedded directly into document -->
@foreach($products as $product)
  <div id="{{$product->id}}" class="modal">
    <div class="add-modal">
      <span class="modal-title">{{$product->name}}</span>
      <span class="modal-description">{{$product->description}}</span>
          <livewire:add-to-cart :item="$product" :key="$product->id"/>

    </div>

  </div>
@endforeach



<script src="js/qty.js" type="text/javascript"></script>
@livewireScripts
<script>
    livewire.on('agregado', () => 
    {
      // window.location = '#close-modal';
      $.modal.close();
        // modal = document.getElementsByClassName('add-modal');
        // for(let i =0; i< modal.length; i++){
        //   $(this).
        // }
    }); 
    </script>
</body>
</html>