<?php
/*
Template Name: home
*/
?>


<?php get_header(); ?>

<section class="services">
  <div class="container">
    <h2 class="title">НАШИ УСЛУГИ</h2>
    <div class="services__inner">
      <div class="services__content">
        <?php the_field('service');?>
       
       
      </div>
      <ol class="services__list">
        <li data-wow-delay="1s" class="services__item wow animate__fadeInRight">
          <p class="services__item-title">Покупка авто</p>
          <p class="services__item-text">Подбор автомобиля и экспертная проверка</p>
        </li>
        <li data-wow-delay="1.2s" class="services__item wow animate__fadeInRight">
          <p class="services__item-title">Доставка морем</p>
          <p class="services__item-text">Расчет оптимальной стоимости доставки авто</p>
        </li>
        <li data-wow-delay="1.4s" class="services__item wow animate__fadeInRight">
          <p class="services__item-title">Растаможка авто</p>
          <p class="services__item-text">Прохождение таможенного оформления (2-3 дня)</p>
        </li>
        <li data-wow-delay="1.6s" class="services__item wow animate__fadeInRight">
          <p class="services__item-title">Ремонт авто</p>
          <p class="services__item-text">Комплексный ремонт автомобиля на СТО</p>
        </li>
        <li data-wow-delay="1.8s" class="services__item wow animate__fadeInRight">
          <p class="services__item-title">Сертификация</p>
          <p class="services__item-text">Услуга предоставляется по желанию</p>
        </li>
        <li data-wow-delay="2s" class="services__item wow animate__fadeInRight">
          <p class="services__item-title">Постановка на учет</p>
          <p class="services__item-text">Оформление автомобиля в Украине</p>
        </li>
      </ol>
    </div>
  </div>
</section>


<section class="benefits">
  <div class="container">
    <div class="benefits__inner">
      <img data-wow-delay="2s" class="benefits__images wow animate__fadeInUp" src="<?php bloginfo('template_url'); ?>/assets/images/car.png" alt="car">
      <div class="benefits__content">
        <h2 class="title benefits__title">ПОЧЕМУ МЫ?</h2>
        <ul class="benefits__list">
          <li class="benefits__item">
            <p class="benefits__item-num">650</p>
            <p class="benefits__item-title">успешно доставленных авто</p>
            <p class="benefits__item-text">
              большой опыт пригона автомобилей из США под ключ, все клиенты остались довольны на 100%
            </p>
          </li>
          <li class="benefits__item">
            <p class="benefits__item-num">5</p>
            <p class="benefits__item-title">лет на рынке Украины</p>
            <p class="benefits__item-text">
              Работаем по всей территории Украины, работаем по договору с клиентами
            </p>
          </li>
          <li class="benefits__item">
            <p class="benefits__item-num">100%</p>
            <p class="benefits__item-title">доверия клиентов</p>
            <p class="benefits__item-text">
              Онлайн отчетность. Вы всегда в курсе статуса подбора вашего авто. Фото и видео отчет
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>


<section class="carousel">
  <div class="container">
    <h2 class="title">
      ПРИГНАННЫЕ НАМИ АВТО
    </h2>
    <div class="carousel__inner">
    <?php
        
        $myposts = get_posts([ 
            'numberposts' => -1,
            'category_name' => 'slider',
            'post_type' => 'post',
        ]);

        if( $myposts ){
            foreach( $myposts as $post ){
                setup_postdata( $post );
                ?>
                <div class="carousel__item">
                    <div class="carousel__item-box">
                    <img class="carousel__item-img" src="<?php the_post_thumbnail_url();?>" alt="">
                    <h4 class="carousel__item-title"><?php the_title();?></h4>
                    <p class="carousel__item-text"><?php the_content();?></p>
                    </div>
                </div>
                <?php 
            }
        }

        wp_reset_postdata(); 
        ?>
      
     
    </div>
  </div>
</section>



<section class="contacts">
  <div class="container">
    <div class="contacts__inner">
      <div class="contacts__info">
        <h2 class="title">
          КОНТАКТЫ
        </h2>
        <ul class="contacts__list">
          <li class="contacts__item">
            <p class="contacts__item-title">Адрес</p>
            <p class="contacts__item-text">
              <?php the_field('adress')?>
            </p>
          </li>
          <li class="contacts__item">
            <p class="contacts__item-title">Время работы</p>
            <p class="contacts__item-text">
               <?php the_field('timework')?>
            </p>
          </li>
          <li class="contacts__item">
            <p class="contacts__item-title">Телефон</p>
            <p class="contacts__item-text">
            <?php the_field('phone')?>
            </p>
          </li>
        </ul>
      </div>
      <form class="contacts__form">
        <h2 class="title contacts__title">Оставить заявку</h2>
        <?php echo do_shortcode('[contact-form-7 id="23" title="Контактная форма"]');?>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>