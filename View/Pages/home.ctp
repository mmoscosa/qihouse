<?php 
    echo $this->Html->css('superslides');
    echo $this->Html->css('home.slider.mmoscosa');

    echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js');
    echo $this->Html->script('jquery.animate-enhanced.min');
    echo $this->Html->script('min/jquery.superslides.min-ck');
    echo $this->Html->script('min/index.slider-ck');
?>

<div id="slides">
  <ul class="slides-container">
    <li>
      <div id="screen-video"></div>
      <video loop="true" id="video-slide1" preload muted poster="">
          <source src="/files/videos/home.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="container" id="slide1-contatiner">
            <?php echo $this->Html->image('index/logo_slide1.png', array('alt'=>'qihouse slider', 'class'=>'logo-slide1')); ?>
            <h1>¿Eres nuevo en el té?</h1>
            <ul>
                <li>Si ¿Por que debo tomarlo?</li>
                <li>Amo el té ¡Sorprendeme!</li>
                <li>Quiero ser socio</li>
            </ul>
        </div>
    </li>
    <li>
      <?php echo $this->Html->image('index/slide2.png', array('alt'=>'qihouse slider', 'class'=>'big-image')); ?>
      <div class="container" id="slide2-contatiner">
            <?php echo $this->Html->image('index/slide2/tea1.png', array('alt'=>'qihouse slider', 'class'=>'teas', 'id'=>'tea1')); ?>
            <?php echo $this->Html->image('index/slide2/tea2.png', array('alt'=>'qihouse slider', 'class'=>'teas', 'id'=>'tea2')); ?>
            <?php echo $this->Html->image('index/slide2/tea3.png', array('alt'=>'qihouse slider', 'class'=>'teas', 'id'=>'tea3')); ?>
            <div class="hideit">
              <h1>Somos especialistas</h1>
              <p id="slide2-blurb"><span>Qi House</span> se espacializa en productos poco conocidos en lugares fuera de China - <span>hojas sueltas frescas, exquisitas y naturales</span>.</p>
            </div>
      </div>
    </li> 
    <li>
      <?php echo $this->Html->image('index/slide3.png', array('alt'=>'qihouse slider', 'class'=>'big-image')); ?>
      
      <div class="container" id="slide3-contatiner">
        <?php echo $this->Html->image('index/slide3/tigre.png', array('alt'=>'qihouse slider', 'class'=>'teas', 'id'=>'tigre')); ?>
        <?php echo $this->Html->image('index/slide3/tetera.png', array('alt'=>'qihouse slider', 'class'=>'teas', 'id'=>'tetera')); ?>
      
        <div class="hideit">
              <h1>Somos especialistas</h1>
              <p id="slide3-blurb"><span>Qi House</span> se espacializa en productos poco conocidos en lugares fuera de China - <span>hojas sueltas frescas, exquisitas y naturales</span>.</p>
            </div>
      </div>

    </li> 
    <li>
      <?php echo $this->Html->image('index/slide4.png', array('alt'=>'qihouse slider', 'class'=>'big-image')); ?>
      
      <div class="container" id="slide4-contatiner">
        <?php echo $this->Html->image('index/slide4/boxes.png', array('alt'=>'qihouse slider', 'class'=>'teas', 'id'=>'boxes')); ?>
      
          <div class="hideit">
                <h1>Productos únicos</h1>
                <p id="slide4-blurb"><span>Ofrecemos las hojas de té a casas de té, cafeterias, restaurantes, spas</span> y todos los demás establecimientos que se preocupan por las preferencias de su clientela. </p>
          </div>
      
      </div>
    </li>
  </ul>
  <nav class="slides-navigation">
    <a href="#" class="slide-nav next"><i class="fa fa-chevron-circle-right"></i></a>
    <a href="#" class="slide-nav prev"><i class="fa fa-chevron-circle-left"></i></a>
  </nav>
</div>

