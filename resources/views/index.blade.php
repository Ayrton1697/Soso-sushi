@extends('layouts.layout')

    @section('title','Soso Sushi: Entradas | Sushi | Salad Sushi | Woks')
    
    @section('content')
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide--1">

                   
                 
                  <div class="button--placer">
                    <a href="{{route('pedidos')}}" target="blank" 
                    class="btn btn--white">Hacé tu pedido</a>
                  </div>
                 
                </div>
                <div class="swiper-slide swiper-slide--2" >

             
                <div class="button--placer">
                    <a href="{{route('promos')}}" 
                    class="btn btn--white">Consultá las promos</a>
                  </div>
                
                </div>
                <div class="swiper-slide swiper-slide--3"></div>
         
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                  <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            </div>

    

            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper('.swiper-container', {
                
                  centeredSlides: true,
                  autoplay: {
                    delay: 25000000,
                    disableOnInteraction: false,
                  },
                  pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true,
                  },
                  navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                  },
              
                });
              </script>



    <section class="section-nosotros" id="nosotros">
        <h2 class="heading--secondary">Nosotros</h2>
        <div class="nosotros">
            <div class="nosotros__texto">
            Teniendo como norte el brindar un nuevo concepto culinario en la Ciudad de Buenos Aires, 
            ofreciendo máxima calidad al mejor precio posible.

          Gracias al apoyo de nuestros clientes, experimentamos una explosión de crecimiento en el mercado. 
          Somos diseñadores del buen gusto, y nos esforzamos para que absolutamente cada ingrediente componga una pieza perfecta.
            </div>
            <!-- <div class="nosotros__photo">
                    <img src="./img/img3.jpg" alt="" class="nosotros__photo--picture">
            </div> -->
        </div>
    </section>
    <section class="section-intersection--1">

    </section>

    <section class="section-menu" id="menu">
        <h2 class="heading--secondary heading--secondary--menu">NUESTRO MENÚ</h2>



        <div class="swiper-container">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="menu__item menu__item--1">
                      <div class="menu__text">
                        Entradas
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide " >
                    <div class="menu__item menu__item--2">
                      <div class="menu__text">
                      Sushi
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide ">
                    <div class="menu__item menu__item--3">
                      <div class="menu__text">
                      Salad Sushi
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="menu__item menu__item--4">
                      <div class="menu__text">
                      Woks
                      </div>
                    </div>

                  </div>

              </div>      
        
                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
        </div>
        <script>
          var swiper = new Swiper('.swiper-container', {
          
            centeredSlides: true,
            autoplay: {
              delay: 25000000,
              disableOnInteraction: false,
            },
            pagination: {
              el: '.swiper-pagination',
              type: 'bullets',
              clickable: true,
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
        
          });
        </script>

        <div class="button--placer">
          <a href="{{route('pedidos')}}" target="blank" class="btn btn--menu">VER MENÚ COMPLETO</a>
        </div>
       
    </section>

    <section class="section-intersection--2">

    </section>

    <section class="section-contacto" id="contact">

      <h2 class="heading--secondary">Contacto</h2>

    

        <div class="contacto">
            <div class="contact__details">
                          <ul class="info__list">
                            <li class="info__item">Todos los días - 18:45 a 22:45 hs</li>
                            <li class="info__item">*</li>
                            <li class="info__item">Delivery & Take Away</li>
                            <li class="info__item">47404443</li>  
                            <li class="info__item">*</li>
                            <li class="info__item">General Pacheco Buenos Aires AR, Jujuy 34,</li>
                          </ul>
            
            </div>


         <form action="mail.php" method="POST" class="contacto__form">


          <input type="text" name="nombre" class="contacto__input" placeholder="Nombre">
          <input type="email" name="email" class="contacto__input" placeholder="Email">
          <textarea type="text" name="mensaje" class="contacto__input" placeholder="Mensaje"></textarea>

        <input name="submit" type="submit" value="Enviar" class="btn btn--form">
    
         </form>

      </div>

      <iframe height="450" width="100%"" style="border:0" loading="lazy" allowfullscreen
      src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJi2gkbI6kvJURkCJZUBvaN6c&key=AIzaSyA0ufejg-z7IwnIsEEvbTzSVrxkF1NRpls">
      </iframe>

  </section>

  @endsection

  @section('scripts')
  
  @endsection