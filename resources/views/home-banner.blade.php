<?php
$items = [
    [
        'image' => "images/bg/bg2.jpg",
        'text-white'=> "Fidelity",
        'text-colored' => "Instant",
        'description' => "Every day we bring hope to millions of children in the world's <br>hardest places as a sign of God's unconditional love.",
        'btn-text' => "Apply Now",
        'btn-url' => "javascript:void(0)"
    ],
    [
        'image' => "images/bg/bg3.jpg",
        'text-white'=> "Fidelity",
        'text-colored' => "Instant",
        'description' => "Every day we bring hope to millions of children in the world's <br>hardest places as a sign of God's unconditional love.",
        'btn-text' => "Apply Now",
        'btn-url' => "javascript:void(0)"
    ],
    [
        'image' => "images/bg/bg5.jpg",
        'text-white'=> "Fidelity",
        'text-colored' => "Instant",
        'description' => "Every day we bring hope to millions of children in the world's <br>hardest places as a sign of God's unconditional love.",
        'btn-text' => "Apply Now",
        'btn-url' => "javascript:void(0)"
    ],
];
?>

<section id="home" class="divider">
  <div class="fullwidth-carousel owl-carousel owl-loaded owl-drag" data-nav="true">
    <?php
     foreach($items as $i)
     {
    ?>
    <div class="carousel-item bg-img-cover" data-bg-img="{{$i['image']}}" style="background-image: url(&quot;{{$i['image']}}&quot;);">
        <div class="display-table">
              <div class="display-table-cell">
                <div class="container pt-200 pb-200">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="bg-white-transparent text-center pt-20 pb-50 outline-border">
                        <h2 class="text-white text-uppercase font-48">{{$i['text-white']}} <span class="text-theme-colored2">{{$i['text-colored']}}</span>
                        </h2>
                        <h5 class="text-white font-weight-400"> {!!$i['description']!!} </h5>
                        <a class="btn btn-colored btn-theme-colored btn-flat smooth-scroll-to-target mt-15" href="{{$i['btn-url']}}">{{$i['btn-text']}}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <?php
     }
    ?>
  </div>
</section>